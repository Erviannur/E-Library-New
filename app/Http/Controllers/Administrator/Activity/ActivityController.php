<?php

namespace App\Http\Controllers\Administrator\Activity;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Aktivitas',
            'breadcrumbs' => [
                [
                    'title' => 'E-Library',
                    'url' => route('apps.dashboard'),
                ],
                [
                    'title' => 'Aktivitas',
                    'is_active' => true,
                ],
            ],
            'activity' => Activity::orderBy('date','desc')->get(),
        ];

        return view('administrator.activity.index', $data);
    }
}
