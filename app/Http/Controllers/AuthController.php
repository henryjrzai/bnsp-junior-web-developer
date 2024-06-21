<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/admin');
        }

        return redirect('/')->with('error', 'Email atau password salah');
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
