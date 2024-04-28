<?php

namespace App\Http\Controllers\Administrator\Author;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Penulis',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Penulis',
                    'is_active' => true,
                ],
            ],
            'authors' => Author::orderBy('name','ASC')->get(),
        ];

        return view('administrator.author.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Penulis',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Penulis',
                    'url' => route('apps.authors'),
                ],
                [
                    'title' => 'Tambah Penulis',
                    'is_active' => true,
                ],
            ],
            'action' => route('apps.authors.store'),
        ];

        return view('administrator.author.form', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:authors',
        ],[
            'name.required' => 'Nama penulis wajib diisi',
        ]);

        $request->merge(['slug' => strtolower(str_replace( ' ', '-', $request->name))]);

        Author::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('apps.authors')->with('success', 'Berhasil memabuat data.');
    }

    public function edit(Author  $author)
    {
        $data = [
            'title' => 'Edit Penulis',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Penulis',
                    'url' => route('apps.genre'),
                ],
                [
                    'title' => 'Edit Penulis',
                    'is_active' => true,
                ],
            ],
            'action' => route('apps.authors.update', $author->hashid),
            'data' => $author
        ];
        return view('administrator.genre.form', $data);
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|unique:authors,name,' . $author->id . ',id',
        ],[
            'name.required' => 'Nama penulis wajib diisi',
            'name.unique' => 'Nama penulis sudah ada',
        ]);

        $request->merge(['slug' => strtolower(str_replace( ' ', '-', $request->name))]);

        $author->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('apps.authors')->with('success', 'Author berhasil diperbarui.');
    }

    public function delete(Author $author)
    {
        try {
            $author->delete();
            return response()->json(['message' => 'Author berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus genre. Silakan coba lagi.'], 500);
        }
    }

}
