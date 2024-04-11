<?php

namespace App\Http\Controllers\Book;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Comment;
use App\Models\Activity;
use App\Models\Bookmark;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    protected function calculateDaysDifference($books)
    {
        $currentDate = Carbon::now();
        foreach ($books as $book) {
            $postDate = Carbon::parse($book->created_at);
            $daysDifference = $postDate->diffInDays($currentDate);
            $book->daysDifference = $daysDifference;
        }
        return $books;
    }

    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(8);
        $books = $this->calculateDaysDifference($books);

        $data = [
            'breadcrumbs' => [
                [
                    'title' => 'Koleksi Buku',
                    'is_active' => true,
                ],
            ],
            'books' => $books,
        ];

        return view('book.index', $data);
    }


    public function search(Request $request)
    {
        $category = $request->input('category','book');
        $query = $request->input('query');

        $request->session()->put('search_category', $category);
        $request->session()->put('search_query', $query);

        $books = Book::query();

        if ($category === 'author') {
            $books->whereHas('author', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            });
        } elseif ($category === 'genre') {
            $books->whereHas('genre', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            });
        } else {
            $books->where('title', 'like', "%$query%");
        }

        $books = $books->paginate(8);
        $books = $this->calculateDaysDifference($books);

        return view('book.search', compact('books'));
    }


    public function addToBookmark($bookId)
    {
        $userId = auth()->user()->id;

        $existingBookmark = Bookmark::where('user_id', $userId)->where('book_id', $bookId)->exists();
        if ($existingBookmark) {
            return response()->json(['message' => 'Buku sudah ada di penanda.'], 409);
        }

        $bookmark = Bookmark::create([
            'user_id' => $userId,
            'book_id' => $bookId
        ]);

        $activity = Activity::create([
            'user_id' => $userId,
            'date' => Carbon::now(),
            'type_activity' => 'Menambah Buku Ke Penanda',
        ]);

        return response()->json(['message' => 'Berhasil menambahkan ke bookmark']);
    }

    public function detail($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $comments = $book->comments()->with('user')->orderByDesc('created_at')->get();
        $data = [
            'breadcrumbs' => [
                [
                    'title' => 'Koleksi Buku',
                    'url' => route('guest.books'),
                ],
                [
                    'title' => $book->title,
                    'is_active' => true,
                ],
            ],
            'book' => $book,
            'comments' => $comments,
        ];

        return view('book.detail', $data);
    }

    public function store(Request $request,Book $book)
    {

        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = Comment::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
            'comment' => $request->comment
        ]);

        return redirect()->back();
    }

    public function delete(Comment $comment)
    {
        if (auth()->user()->id === $comment->user_id) {
            $comment->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
