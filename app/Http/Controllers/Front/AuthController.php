<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        return view('front.auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|max:250',
            'password' => 'required'
        ]);

        $remember = $request->has('_remember_me') ? true : false;

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';

        if (Auth::attempt([$fieldType => $request->email, 'password' => $request->password], $remember)) {
            $user = Auth::user();

            if ($user->hasRole('Admin')) {
                return redirect()->route('admin.home');
            } elseif ($user->hasRole('Recruiter')) {
                return redirect()->route('recruiter.home');
            } else {
                if ($user->first_login) {
                    return redirect()->route('candidate.create');
                }
                return redirect()->route('home');
            }
        }
        return redirect()->back()->withInput($request->only('email'))->withError('Identifiants incorrects');
    }

    public function register(Request $request)
    {
        return view('front.auth.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|max:25',
            'first_name' => 'bail|required|max:25',
            'last_name' => 'nullable|max:25',
            'sex' => 'required',
            'type' => 'required',
            'email' => 'bail|required|unique:users,email|email|max:250',
            'password' => 'required|confirmed|min:6'
        ]);

        $request->request->add(['password' => bcrypt($request->password)]);

        $user = User::create($request->all());

        if ($user) {

            $user->assignRole($request->type);

            Auth::login($user);

            if ($request->type == 'Candidate') {
                return redirect()->route('candidate.create');
            }
            return redirect()->route('recruiter.create');
        }
        return redirect()->back()->withInput()->withError('Une erreur s\'est produite, veuillez réessayer');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
