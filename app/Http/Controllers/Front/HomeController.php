<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;

class HomeController extends Controller
{
    public function home()
    {
        $offers = Offer::where('is_valid', true)->limit(5)->orderBy('created_at', 'DESC')->get();
        $categories = Category::with('offers')->get();
        return view('front.home', compact('offers', 'categories'));
    }

    public function submitCv()
    {
        return view('front.choice');
    }
}
