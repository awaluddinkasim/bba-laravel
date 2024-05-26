<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('pages.auth');
    }

    public function authenticate(): RedirectResponse
    {
        $creds = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($creds, request()->remember ? true : false)) {
            request()->session()->regenerate();

            return redirect()->intended();
        }

        return redirect()->back()->withInput()->with('error', 'Email atau Password salah');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
