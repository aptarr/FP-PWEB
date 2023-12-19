<?php

namespace App\Http\Controllers;

use App\Models\UserEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class UserEducationController extends Controller
{
    public function create()
    {
        return view('education.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'country_of_college' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        $data = [
            'country_of_college' => $request->input('country_of_college'),
            'title' => $request->input('title'),
            'major' => $request->input('major'),
            'year' => $request->input('year'),
        ];

        $user->usereducation()->create($data);        

        $successMessage = "User education successfully added";

        return redirect()->route('profile.show')->with('success', $successMessage);
    }
     /**
     * Update the specified resource in storage.
     */

    public function edit(Request $request)
    {
        $userEducation = UserEducation::find($request->id_education);
        return view('education.edit', compact('userEducation'));
    }

    public function update(Request $request, UserEducation $userEducation)
    {
        $request->validate([
            'country_of_college' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        $userEducation = UserEducation::find($request->id_education);

        $userEducation->update([
            'country_of_college' => $request->country_of_college,
            'title' => $request->title,
            'major' => $request->major,
            'year' => $request->year,
        ]);

        $successMessage = "User education successfully edited";

        return redirect()->route('profile.show')->with('success', $successMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        UserEducation::find($request->id_education)->delete();
        $successMessage = "User education successfully deleted";
        return back()->with('success', $successMessage);
    }
}
