<?php

namespace App\Http\Controllers\Bookmark;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $bookmark = Bookmark::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'breadcrumbs' => [
                [
                    'title' => 'E-Library',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Penanda',
                    'is_active' => true,
                ],
            ],
            'bookmark' => $bookmark,
        ];
        return view('bookmark.index', $data);
    }

    public function deleteAll(Request $request)
    {
        $user = $request->user();
        $user->bookmarks()->delete();

        return response()->json(['message' => 'Semua penanda berhasil dihapus']);
    }

    public function delete(Bookmark $bookmark)
    {
        if ($bookmark->user_id === auth()->id()) {
            $bookmark->delete();
            return response()->json(['message' => 'Penanda berhasil dihapus']);
        } else {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    }
}
