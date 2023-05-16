<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Tab;

class ProfileController extends Controller
{
    public function profile() {
        $user = Auth::user();
        $tabs = Tab::where('user_id', '=', $user->id)->orderBy('id', 'desc')->paginate(8);

        return view('profile', [
            'username' => $user->username,
            'email' => $user->email,
            'tabs' => $tabs
        ]);
    }
}
