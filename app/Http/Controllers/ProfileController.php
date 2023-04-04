<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function profile() {
        $user = User::find(1);

        return view("profile", [
            "username" => $user->username,
            "email" => $user->email,
            "tabs" => $user->tabs
        ]);
    }
}
