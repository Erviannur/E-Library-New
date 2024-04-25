<?php

namespace App\Http\Controllers\Administrator\Book;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Country;
use App\Models\Activity;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use File;

class BookController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Data Buku',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Buku',
                    'is_active' => true,
                ],
            ],
            'books' => Book::orderBy('title','ASC')->get(),
        ];

        return view('administrator.book.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Buku',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Buku',
                    'url' => route('apps.authors'),
                ],
                [
                    'title' => 'Tambah Buku',
                    'is_active' => true,
                ],
            ],
            'authors' => Author::orderBy('name','ASC')->get(),
            'publishers' => Publisher::orderBy('name','ASC')->get(),
            'genres' => Genre::orderBy('name','ASC')->get(),
            'countries' => Country::orderBy('name','ASC')->get(),
            'action' => route('apps.books.store'),
        ];

        return view('administrator.book.form', $data);
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'title' => 'required|string',
                'author_id' => 'required',
                'publisher_id' => 'required',
                'country_id' => 'required',
                'isbn' => 'nullable|string',
                'genre_id' => 'required',
                'synopsis' => 'required|string',
                'file' => 'required|mimes:pdf',
                'publication_year' => 'required',
                'page' => 'required',
            ], [
                'image.required' => 'Gambar wajib diunggah',
                'image.image' => 'File harus berupa gambar',
                'title.required' => 'Judul wajib diisi',
                'author_id.required' => 'Penulis wajib dipilih',
                'country_id.required' => 'Negara wajib dipilih',
                'publisher_id.required' => 'Penerbit wajib dipilih',
                'publication_year.required' => 'Tahun terbit wajib diisi',
                'isbn.string' => 'ISBN harus berupa string',
                'genre_id.required' => 'Genre wajib dipilih',
                'page.required' => 'Halaman wajib dipilih',
                'synopsis.required' => 'Sinopsis wajib diisi',
                'file.required' => 'File wajib diunggah',
                'file.mimes' => 'Format file tidak valid. Hanya file dengan format: pdf yang diizinkan',
            ]);

            if($request->hasFile('image')){
                $image = $request->file('image');
                $imagename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('storage/images/books'), $imagename);
            } else{
                $imagename = 'default.png';
            }

            if($request->hasFile('file')){
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/file/books'), $filename);
            }

            $request->merge([
                'slug' => strtolower(str_replace( ' ', '-', $request->title)),
            ]);

            Book::create([
                'title' => $request->title,
                'isbn' => $request->isbn ?? '-',
                'slug' => $request->slug,
                'page' => $request->page,
                'image' => $imagename,
                'author_id' => $request->author_id,
                'publisher_id' => $request->publisher_id,
                'genre_id' => $request->genre_id,
                'country_id' => $request->country_id,
                'synopsis' => $request->synopsis,
                'file' => $filename,
                'publication_year' => $request->publication_year,
            ]);

            $userId = auth()->user()->id;
            $activity = Activity::insert([
                'user_id' => $userId,
                'date' => Carbon::now(),
                'type_activity' => 'Menambah Buku',
            ]);

            return redirect()->route('apps.books')->with('success', 'Berhasil membuat data.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal membuat data. Error:' . $e->getMessage());
        }
    }

    public function edit(Book $book)
    {
        $data = [
            'title' => 'Edit Buku',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Data Buku',
                    'url' => route('apps.books'),
                ],
                [
                    'title' => 'Edit Buku',
                    'is_active' => true,
                ],
            ],
            'authors' => Author::orderBy('name','ASC')->get(),
            'publishers' => Publisher::orderBy('name','ASC')->get(),
            'genres' => Genre::orderBy('name','ASC')->get(),
            'countries' => Country::orderBy('name','ASC')->get(),
            'action' => route('apps.books.update', $book->hashid),
            'book' => $book
        ];
        return view('administrator.book.form', $data);
    }

    public function update(Request $request, Book $book)
    {
        try {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'title' => 'required|string',
                'author_id' => 'required',
                'publisher_id' => 'required',
                'country_id' => 'required',
                'isbn' => 'nullable|string',
                'genre_id' => 'required',
                'synopsis' => 'required|string',
                'file' => 'nullable|mimes:pdf',
                'publication_year' => 'required',
                'page' => 'required',
            ], [
                'image.required' => 'Gambar wajib diunggah',
                'image.image' => 'File harus berupa gambar',
                'title.required' => 'Judul wajib diisi',
                'author_id.required' => 'Penulis wajib dipilih',
                'country_id.required' => 'Negara wajib dipilih',
                'publisher_id.required' => 'Penerbit wajib dipilih',
                'publication_year.required' => 'Tahun terbit wajib diisi',
                'isbn.string' => 'ISBN harus berupa string',
                'genre_id.required' => 'Genre wajib dipilih',
                'page.required' => 'Halaman wajib dipilih',
                'synopsis.required' => 'Sinopsis wajib diisi',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('storage/images/books'), $imageName);
                if ($book->image !== 'default.png') {
                    File::delete(public_path('storage/images/books/'. $book->image));
                }
                $imagename = $imageName;
            } else {
                $imagename = $book->image;
            }

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/file/books'), $filename);
                if ($book->file) {
                    File::delete(public_path('storage/file/books/'. $book->file));
                }
                $filename = $filename;
            } else {
                $filename = $book->file;
            }

            $request->merge([
                'slug' => strtolower(str_replace( ' ', '-', $request->title)),
            ]);

            $book->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'isbn' => $request->isbn ?? '-',
                'page' => $request->page,
                'image' => $imagename,
                'author_id' => $request->author_id,
                'publisher_id' => $request->publisher_id,
                'genre_id' => $request->genre_id,
                'country_id' => $request->country_id,
                'synopsis' => $request->synopsis,
                'file' => $filename,
                'publication_year' => $request->publication_year,
            ]);

            $userId = auth()->user()->id;
            $activity = Activity::insert([
                'user_id' => $userId,
                'date' => Carbon::now(),
                'type_activity' => 'Mengedit Buku',
            ]);

            return redirect()->route('apps.books')->with('success', 'Buku berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui buku. Error:' . $e->getMessage());
        }
    }

    public function delete(Book $book)
    {
        try {
            if ($book->image !== 'default.png') {
                File::delete(public_path('storage/images/books/'. $book->image));
            }
            if ($book->file) {
                File::delete(public_path('storage/file/books/'. $book->file));
            }

            $book->delete();
            return response()->json(['message' => 'Pengguna berhasil dihapus'], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Gagal menghapus pengguna. Silakan coba lagi.'], 500);
        }
    }
}