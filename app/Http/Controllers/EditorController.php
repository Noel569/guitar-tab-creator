<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Tab;
use App\Models\Tuning;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EditorController extends Controller
{
    public function view() {
        $tunings = Tuning::all();
        return view('empty_editor', ['tunings'=>$tunings]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'performer' => 'required',
            'tuning_id' => 'required|exists:tunings,id',
            'tempo' => 'required',
            'tab' => 'required',
        ]);

        $validated['publicity'] = $request->get('publicity') != 'on';
        $validated['user_id'] = Auth::user()->id;
        Log::debug($validated);
        $tab = Tab::create($validated);

        return redirect()->route('edit', [$tab->id]);   
    }
}
