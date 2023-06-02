<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $offers = Offer::where('category_id', $id)->get();

        return view('front.categories.offers', compact('offers', 'category'));
    }
}
