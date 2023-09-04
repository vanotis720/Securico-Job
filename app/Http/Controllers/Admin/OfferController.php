<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\OfferCandidate;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;


class OfferController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->category ?? null;
        if ($category) {
            $offers = Offer::join('categories',  'categories.id', 'category_id')
                ->where('categories.title', $category)
                ->orderBy('offers.created_at', 'DESC')
                ->get();
        } else {
            $offers = Offer::orderBy('created_at', 'DESC')->get();
        }
        $categories = Category::all();
        return view('admin.offers', compact('offers', 'categories', 'category'));
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

    public function savePDF()
    {
        $data = Offer::orderBy('created_at', 'DESC')->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.print.offers', compact('data'));
        $pdf->setPaper('a4', 'landscape');

        $path = public_path() . '-offers' . date('Y-m-d') . '.pdf';
        if (!file_exists($path)) {
            $pdf->save($path);
        }

        $headers = ['Content-Type: application/pdf'];

        return response()->download($path);
    }
}
