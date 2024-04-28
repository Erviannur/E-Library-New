<?php

namespace App\Http\Controllers\Administrator\Genre;

use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Genre',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Genre',
                    'is_active' => true,
                ],
            ],
            'genres' => Genre::orderBy('name','ASC')->get(),
        ];

        return view('administrator.genre.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Genre',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Genre',
                    'url' => route('apps.genre'),
                ],
                [
                    'title' => 'Tambah Genre',
                    'is_active' => true,
                ],
            ],
            'action' => route('apps.genre.store'),
        ];

        return view('administrator.genre.form', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres',
        ],[
            'name.required' => 'Nama genre wajib diisi',
        ]);

        $request->merge(['slug' => strtolower(str_replace( ' ', '-', $request->name))]);

        Genre::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('apps.genre')->with('success', 'Genre berhasil dibuat.');
    }

    public function edit(Genre $genre)
    {
        $data = [
            'title' => 'Edit Genre',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Genre',
                    'url' => route('apps.genre'),
                ],
                [
                    'title' => 'Edit Genre',
                    'is_active' => true,
                ],
            ],
            'action' => route('apps.genre.update', $genre->hashid),
            'data' => $genre
        ];
        return view('administrator.genre.form', $data);
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|unique:genres,name,' . $genre->id . ',id',
        ]);

        $request->merge(['slug' => strtolower(str_replace( ' ', '-', $request->name))]);

        $genre->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('apps.genre')->with('success', 'Genre berhasil diperbarui.');
    }

    public function delete(Genre $genre)
    {
        try {
            $genre->delete();
            return response()->json(['message' => 'Genre berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus genre. Silakan coba lagi.'], 500);
        }
    }

}
