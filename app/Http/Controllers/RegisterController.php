<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function view() {
        return view("register");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'email' => 'required|unique:users|email:rfc,dns',
            'username' => 'required|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()]
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        Auth::loginUsingId($user->id);
        return redirect()->route('landing');
    }
}
