<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function home()
    {
        $offers = Offer::limit(5)->orderByDesc('created_at')->get();
        $offers_count = Offer::all()->count();
        $users_count = User::role('Candidate')->count();
        $admin_count = User::role('Admin')->count();
        $recruiter_count = User::role('Recruiter')->count();

        return view('admin.dashboard', compact(
            'offers',
            'offers_count',
            'users_count',
            'admin_count',
            'recruiter_count',
            'offers',
        ));
    }
}
