<?php

namespace App\Http\Controllers\Administrator\Publisher;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublisherController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Penebit',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Penerbit',
                    'is_active' => true,
                ],
            ],
            'publishers' => Publisher::orderBy('name','ASC')->get(),
        ];

        return view('administrator.publisher.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Penerbit',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Penerbit',
                    'url' => route('apps.authors'),
                ],
                [
                    'title' => 'Tambah Penebit',
                    'is_active' => true,
                ],
            ],
            'action' => route('apps.publishers.store'),
        ];

        return view('publisher.form', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:authors',
        ],[
            'name.required' => 'Nama penulis wajib diisi',
        ]);

        $request->merge(['slug' => strtolower(str_replace( ' ', '-', $request->name))]);

        Publisher::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return  redirect()->route('apps.publishers')->with('success', 'Berhasil memabuat data.');
    }

    public function edit(Publisher  $publisher)
    {
        $data = [
            'title' => 'Edit Penerbit',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Penerbit',
                    'url' => route('apps.genre'),
                ],
                [
                    'title' => 'Edit Penerbit',
                    'is_active' => true,
                ],
            ],
            'action' => route('apps.publishers.update', $publisher->hashid),
            'data' => $publisher
        ];
        return view('administrator.publisher.form', $data);
    }

    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'name' => 'required|unique:publishers,name,' . $publisher->id . ',id',
        ],[
            'name.required' => 'Nama penulis wajib diisi',
            'name.unique' => 'Nama penulis sudah ada',
        ]);

        $request->merge(['slug' => strtolower(str_replace( ' ', '-', $request->name))]);

        $publisher->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('apps.publishers')->with('success', 'Penerbit berhasil diperbarui.');
    }

    public function delete(Publisher $publisher)
    {
        try {
            $publisher->delete();
            return response()->json(['message' => 'Penerbit berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus genre. Silakan coba lagi.'], 500);
        }
    }

}
