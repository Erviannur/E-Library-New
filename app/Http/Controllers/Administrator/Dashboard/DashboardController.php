<?php

namespace App\Http\Controllers\Administrator\Dashboard;

use DB;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Activity;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $currentYear = Carbon::now()->year;

        $visitorCounts = [];

        for ($month = 1; $month <= 12; $month++) {
            $visitorCount = VisitorLog::whereYear('visit_date', $currentYear)
                                       ->whereMonth('visit_date', $month)
                                       ->sum('visitor_count');

            $visitorCounts[] = $visitorCount;
        }

        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
        ];

        $data = [
            'title' => 'Beranda',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'is_active' => true
                ],
            ],
            'user' => User::all(),
            'book' => Book::all(),
            'activity' => Activity::orderBy('date','desc')->get()->take(4),
            'months' => $months,
            'visitorCounts' => $visitorCounts,
        ];

        return view('administrator.dashboard.index', $data);

    }
}
