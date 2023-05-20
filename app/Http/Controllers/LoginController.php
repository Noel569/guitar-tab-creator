<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function view() {
        return view('login');
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);
        //$validated['password'] = Hash::make($validated['password']);
        if (Auth::attempt($validated)) {
            return redirect()->route('landing');
        }
        return redirect()->route('login')->withErrors(['wrongAuth'=>'Incorrect e-mail address or password.']);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('landing');
    }
}
