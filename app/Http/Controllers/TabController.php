<?php

namespace App\Http\Controllers;

use App\Models\Tab;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Tuning;
use App\Models\Like;
use App\Models\Comment;

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

        $validated['publicity'] = $request->get('publicity') != 'on';

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

    public function like($tab_id) {
        $tab = Tab::find($tab_id);

        if (!empty($tab)) {
            $like = Like::withTrashed()->where([
                "tab_id" => $tab->id,
                "user_id" => Auth::user()->id
            ])->first();

            if (!empty($like)) {
                if ($like->trashed()) {
                    $like->restore();
                    return response("", 200);
                } else {
                    $like->delete();
                    return response("", 201);
                }
            } else {
                Like::create([
                    "tab_id" => $tab->id,
                    "user_id" => Auth::user()->id
                ]);
                return response("", 200);
            }
        }

        return response("", 500);
    }

    public function comment(Request $request, $tab_id) {
        $tab = Tab::find($tab_id);
        $comment = $request->get("comment");

        if (empty($tab)) {
            return redirect()->route('landing');
        }

        $request->validate([
            'comment' => 'required|min:1|max:400',
        ]);

        Comment::create([
            "tab_id" => $tab->id,
            "user_id" => Auth::user()->id,
            "comment" => $comment
        ]);
        return redirect()->route('tab', [$tab->id]);
    }
}
