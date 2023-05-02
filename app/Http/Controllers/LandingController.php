<?php

namespace App\Http\Controllers;

use App\Models\Tab;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class LandingController extends Controller
{
    public function landing()
    {
        $tabs = Tab::orderBy('id', 'desc')->take(10)->get();

        return view("index", [
            "tabs" => $tabs
        ]);
    }
}
