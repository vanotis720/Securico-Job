<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OfferCandidate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function applications()
    {
        $applications = OfferCandidate::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        return view('front.user.applications', compact('applications'));
    }

    public function edit()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('front.user.edit', compact('user'));
    }

    public function update(Request $request)
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
            return redirect()->route('user.edit')->with('success', 'Informations mises à jour');
        }
        return redirect()->back()->withInput()->withError('Une erreur s\'est produite, veuillez réessayer');
    }
}
