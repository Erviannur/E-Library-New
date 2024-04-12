<?php

namespace App\Http\Controllers\Home;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $comments = Comment::orderByDesc('created_at')->get();
        $data = [
            'title' => 'E-Library',
            'comments' => $comments,
        ];

        return view('welcome', $data);
    }
}
