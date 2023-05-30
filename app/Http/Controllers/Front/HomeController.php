<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;

class HomeController extends Controller
{
    public function home()
    {
        $offers = Offer::limit(5)->orderBy('created_at', 'DESC')->get();
        return view('front.home', compact('offers'));
    }

    public function submitCv()
    {
        return view('front.choice');
    }
}
