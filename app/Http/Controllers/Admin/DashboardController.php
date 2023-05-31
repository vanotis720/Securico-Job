<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;

class DashboardController extends Controller
{
    public function home()
    {
        $offers = Offer::limit(5)->orderBy('created_at', 'DESC')->get();
        return view('admin.dashboard', compact('offers'));
    }
}
