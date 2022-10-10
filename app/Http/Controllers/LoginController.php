<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('cms.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credential = $request->validate(([
            'email' => 'required|email',
            'password' => 'required'
        ]));

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/c/dashboard');
        }

        return back()->with('loginError', 'Email or password not found');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/c/login');
    }
}
