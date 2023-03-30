<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class LandingController extends Controller
{
    public function landing()
    {
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
            ],
            [
                "title" => "Animal I Have Become", 
                "performer" => "Three Days Grace",
                "user" => "User02",
                "tuning" => "Drop D",
                "likes" => 12,
                "comments" => 3,
            ],
            [
                "title" => "Dirty Little Secrets", 
                "performer" => "The All-American Rejects",
                "user" => "Slash_Official",
                "tuning" => "Standard",
                "likes" => 5,
                "comments" => 0,
            ],
        ];

        return view("index", [
            "tabs" => $tabs
        ]);
    }
}
