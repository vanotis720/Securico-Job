<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;

class OfferController extends Controller
{
    public function show($id)
    {
        $offer = Offer::findOrFail($id);
        return view('front.offer.show', compact('offer'));
    }

    public function candidate($id)
    {
        return redirect()->route('home')->with('success', 'Vous avez postulé avec succès à cette offre');
    }
}
