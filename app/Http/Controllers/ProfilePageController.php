<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilePageController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $languages = User::find($id)->userlanguage()->get();
        $skills = User::find($id)->userskill()->get();
        $educations = User::find($id)->usereducation()->get();
        $certifications = User::find($id)->usercertification()->get();
        $services = User::find($id)->service()->get();
        return view('profile_page', compact('user', 'languages', 'skills', 'educations', 'certifications', 'services'));
    }
}
