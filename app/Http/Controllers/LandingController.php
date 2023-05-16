<?php

namespace App\Http\Controllers;

use App\Models\Tab;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function view(Request $request)
    {
        $tabs = Tab::where('publicity', '=', '1')->orderBy('id', 'desc')->paginate(8);

        if ($request->ajax()) {
            $q = $request->get('q') ?? '';
            $tabs = Tab::where([['publicity', '=', '1'], ['title', 'like', "%{$q}%"]])->orderBy('id', 'desc')->paginate(8);
            return view('components.tab_card', [
                'tabs' => $tabs
            ]);
        }

        return view('index', [
            'tabs' => $tabs
        ]);
    }
}
