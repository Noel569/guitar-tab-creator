<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function profile() {
        $username = "User01";
        $email = "proguitarist13@gmail.com";

        $tabs = [
            [
                "title" => "Pieces", 
                "performer" => "Sum41",
                "user" => "User01",
                "tuning" => "Standard",
                "likes" => 34,
                "comments" => 5,
            ],
            [
                "title" => "Sweet Child O' Mine", 
                "performer" => "Guns N' Roses",
                "user" => "User01",
                "tuning" => "Standard",
                "likes" => 17,
                "comments" => 9,
            ]
        ];

        return view("profile", [
            "username" => $username,
            "email" => $email,
            "tabs" => $tabs
        ]);
    }
}
