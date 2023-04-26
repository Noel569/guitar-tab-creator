<?php

namespace App\Http\Controllers;

use App\Models\Tab;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Tuning;

class TabController extends Controller
{
    public function tab($tab_id) {
        $tab = Tab::find($tab_id);
        if (empty($tab)) {
            return redirect()->route('landing');
        }
        return view("tab", ["tab"=>$tab]);
    }

    public function editor($tab_id) {
        $tab = Tab::find($tab_id);
        if (empty($tab)) {
            return redirect()->route('landing');
        }
        if ($tab->user_id != Auth::user()->id) {
            return redirect()->route('landing');
        }
        $tunings = Tuning::all();
        return view("editor", ["tab"=>$tab, "tunings"=>$tunings]);
    }

    public function update(Request $request, $tab_id) {
        $tab = Tab::find($tab_id);

        if (empty($tab)) {
            return redirect()->route('landing');
        }
        if ($tab->user_id != Auth::user()->id) {
            return redirect()->route('landing');
        }
        
        $validated = $request->validate([
            'title' => 'required',
            'performer' => 'required',
            'tuning_id' => 'required|exists:tunings,id',
            'tempo' => 'required',
            'tab' => 'required',
        ]);

        $tab->fill($validated);
        $tab->save();

        return redirect()->route('edit', [$tab_id]);
    }

    public function delete($tab_id) {
        $tab = Tab::find($tab_id);

        if (empty($tab)) {
            return redirect()->route('landing');
        }
        if ($tab->user_id != Auth::user()->id) {
            return redirect()->route('landing');
        }

        $tab->delete();

        return redirect()->route('profile');
    }
}
