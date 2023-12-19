<?php

namespace App\Http\Controllers;

use App\Models\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class UserSkillController extends Controller
{
    //
    public function create()
    {
        return view('skill.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'skill' => 'required|string|max:255',
            'experience_level' => 'required|string|max:255',
        ]);

        $data = [
            'skill' => $request->input('skill'),
            'experience_level' => $request->input('experience_level'),
        ];

        $user->userskill()->create($data);        

        $successMessage = "User skill successfully added";

        return redirect()->route('profile.show')->with('success', $successMessage);
    }

    public function edit(Request $request)
    {
        $userSkill = UserSkill::find($request->id_skill);
        return view('skill.edit', compact('userSkill'));
    }

    public function update(Request $request, UserSkill $userSkill)
    {
        $request->validate([
            'skill' => 'required|string|max:255',
            'experience_level' => 'required|string|max:255',
        ]);

        $userSkill = UserSkill::find($request->id_skill);

        $userSkill->update([
            'skill' => $request->skill,
            'experience_level' => $request->experience_level,
        ]);

        $successMessage = "User skill successfully edited";

        return redirect()->route('profile.show')->with('success', $successMessage);
    }

    public function destroy(Request $request)
    {
        UserSkill::find($request->id_skill)->delete();
        $successMessage = "User skill successfully deleted";
        return back()->with('success', $successMessage);
    }
}
