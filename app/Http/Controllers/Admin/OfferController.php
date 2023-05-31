<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        return view('admin.offers', compact('offers'));
    }

    public function show($id)
    {
        $offer = Offer::findOrFail($id);
        return view('admin.offer', compact('offer'));
    }

    public function check($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->is_valid = true;
        $offer->save();

        return redirect()->route('admin.offers.show', $id)->with('success', 'L\'offre a été validée');
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect()->route('admin.offers')->with('success', 'L\'offre a été supprimé');
    }
}
