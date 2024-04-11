<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Profil',
            'breadcrumbs' => [
                [
                    'title' => 'Profil',
                    'is_active' => true,
                ],
            ],
        ];
        return view('profile.index', $data);
    }
}
