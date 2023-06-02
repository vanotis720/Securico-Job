<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecruiterController extends Controller
{
    public function home()
    {
        $offers = Offer::where('user_id', Auth::user()->id)->limit(5)->orderByDesc('created_at')->get();

        return view('admin.recruiter.dashboard', compact(
            'offers',
        ));
    }

    public function offers()
    {
        $offers = Offer::where('user_id', Auth::user()->id)->get();
        return view('admin.recruiter.offers', compact('offers'));
    }
}
