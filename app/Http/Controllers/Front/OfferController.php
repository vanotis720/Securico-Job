<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OfferCandidate;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::where('is_valid', true)->orderBy('created_at', 'DESC')->get();
        return view('front.offer.index', compact('offers'));
    }

    public function show($id)
    {
        $offer = Offer::findOrFail($id);
        return view('front.offer.show', compact('offer'));
    }

    public function candidate($offer)
    {
        $candidate = OfferCandidate::create([
            'offer_id' => $offer,
            'user_id' => auth()->user()->id
        ]);

        if ($candidate) {
            return redirect()->route('home')->with('success', 'Vous avez postulé avec succès à cette offre');
        }
        return redirect()->back()->withError('Une erreur s\'est produite, veuillez réessayer');
    }
}
