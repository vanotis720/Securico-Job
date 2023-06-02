<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recruiter;

class RecruiterController extends Controller
{
    public function create()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('front.recruiter.complete', compact('user'));
    }

    public function store(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $request->validate([
            'enterprise' => 'bail|required',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('logo')) {
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('assets/img/icon'), $imageName);
        }

        $recruiter = Recruiter::create([
            'enterprise' => $request->enterprise,
            'user_id' => auth()->user()->id,
            'logo' => $imageName,
        ]);

        if ($recruiter) {
            return redirect()->route('admin.home')->with('success', 'Informations mises à jour');
        }
        return redirect()->back()->withInput()->withError('Une erreur s\'est produite, veuillez réessayer');
    }
}
