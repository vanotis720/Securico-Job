<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use App\Models\OfferCandidate;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('created_at', 'DESC')->get();
        return view('admin.offers', compact('offers'));
    }

    public function applications($offer)
    {
        $applications = OfferCandidate::orderBy('created_at', 'ASC')->get();
        return view('admin.applications.applications', compact('applications'));
    }

    public function validation($candidate_id, $action)
    {
        $candidate = OfferCandidate::findOrFail($candidate_id);
        $candidate->state = $action;
        $candidate->save();
        return redirect()->back();
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

    public function create()
    {
        $categories = Category::all();
        return view('admin.recruiter.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'bail|required',
            'description' => 'bail|required',
            'end_at' => 'required',
            'school' => 'required',
            'skills' => 'required',
            'category_id' => 'bail|required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->request->add(['picture' => $imageName]);
            $request->image->move(public_path('assets/img/icon'), $imageName);
        }
        $request->request->add(['user_id' => auth()->user()->id]);

        $offer = Offer::create($request->all());

        if ($offer) {
            return redirect()->route('recruiter.offers')->with('success', 'Enregistrer avec succès et en attente de validation de l\'administrateur');
        } else {
            return redirect()->route('recruiter.offers')->with('error', 'une erreur s\'est produite');
        }
    }

    public function edit($id)
    {
        $categories = Category::all();
        $offer = Offer::findOrFail($id);
        return view('admin.recruiter.edit', compact('categories', 'offer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'bail|required',
            'description' => 'bail|required',
            'end_at' => 'required',
            'school' => 'required',
            'skills' => 'required',
            'category_id' => 'bail|required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->request->add(['picture' => $imageName]);
            $request->image->move(public_path('assets/img/icon'), $imageName);
        }

        $offer = Offer::where('id', $id)
            ->update($request->except('_token'));

        if ($offer) {
            return redirect()->route('admin.offers.show', $id)->with('success', 'Modification enregistrer avec succès');
        } else {
            return redirect()->route('recruiter.offers')->with('error', 'une erreur s\'est produite');
        }
    }
}
