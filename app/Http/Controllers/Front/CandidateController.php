<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'name' => 'bail|required|max:25',
            'first_name' => 'bail|required|max:25',
            'last_name' => 'nullable|max:25',
            'sex' => 'required',
            'email' => 'bail|required|email',
            'password' => 'nullable|min:6'
        ]);

        if (!empty($request->input('password'))) {
            $request->request->add(['password' => bcrypt($request->password)]);
        } else {
            $request->request->remove('password');
        }

        $user = $user->update($request->except('_token'));

        if ($user) {
            return redirect()->route('user.edit')->with('success', 'informations mises a jours');
        }
        return redirect()->back()->withInput()->withError('Une erreur s\'est produite, veuillez réessayer');
    }
}
