<?php

namespace App\Http\Controllers;

use App\Models\UserLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class UserLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $userLanguages = UserLanguage::all();

    //     return view('user_languages.index', compact('userLanguages'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'language' => 'required|string|max:255',
            'language_level' => 'required|string|max:255',
        ]);

        $data = [
            'language' => $request->input('language'),
            'language_level' => $request->input('language_level'),
        ];

        $user->userlanguage()->create($data);        

        $successMessage = "User language successfully added";

        return redirect()->route('profile.show')->with('success', $successMessage);
    }

    /**
     * Display the specified resource.
     */
    // public function show(UserLanguage $userLanguage)
    // {
    //     return view('user_languages.show', compact('userLanguage'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $userLanguage = UserLanguage::find($request->id_language);
        return view('language.edit', compact('userLanguage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserLanguage $userLanguage)
    {
        $request->validate([
            'language' => 'required|string|max:255',
            'language_level' => 'required|string|max:255',
        ]);
        $userLanguage = UserLanguage::find($request->id_language);

        $userLanguage->update([
            'language' => $request->language,
            'language_level' => $request->language_level,
        ]);

        $successMessage = "User language successfully edited";

        return redirect()->route('profile.show')->with('success', $successMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        UserLanguage::find($request->id_language)->delete();
        $successMessage = "User language successfully deleted";
        return back()->with('success', $successMessage);
    }
}
