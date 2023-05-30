<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function create()
    {
        $user = User::findOrFail(auth()->user()->id);
        if ($user->hasRole('Candidate')) {
            return view('front.user.complete', compact('user'));
        }
    }

    public function store(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $request->validate([
            'school' => 'bail|required',
            'skills' => 'required',
        ]);

        $request->request->add(['user_id' => auth()->user()->id]);

        $candidate = Candidate::create($request->all());

        if ($candidate) {
            return redirect()->route('home')->with('success', 'Informations mises à jour');
        }
        return redirect()->back()->withInput()->withError('Une erreur s\'est produite, veuillez réessayer');
    }
}
