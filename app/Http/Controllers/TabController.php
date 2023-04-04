<?php

namespace App\Http\Controllers;

use App\Models\Tab;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class TabController extends Controller
{
    public function tab($tab_id) {
        $tab = Tab::find($tab_id);
        return view("tab", ["tab"=>$tab]);
    }
}
