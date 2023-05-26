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
        $_target_path = $request->filled('_target_path') ? $request->get('_target_path') : null;
        return view('front.auth.login', compact('_target_path'));
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

            if ($request->has('_target_path')) {
                return redirect($request->_target_path);
            }
            return redirect()->route('home');
        }
        return redirect()->back()->withInput($request->only('email'))->withError('Identifiants incorrects');
    }

    public function register(Request $request)
    {
        $_target_path = $request->filled('_target_path') ? $request->get('_target_path') : null;
        return view('front.auth.register', compact('_target_path'));
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|max:50',
            'email' => 'bail|required|unique:users,email|email|max:250',
            'password' => 'required|confirmed|min:6'
        ]);

        $request->request->add(['password' => bcrypt($request->password)]);

        $user = User::create($request->except('_token', 'password_confirmation'));

        if ($user) {

            Auth::login($user);

            if ($request->has('_target_path')) {
                return redirect($request->_target_path);
            }
            return redirect('/');
        }
        return redirect()->back()->withInput()->withError('Une erreur s\'est produite, veuillez réessayer');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
