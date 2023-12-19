<?php

namespace App\Http\Controllers;

use App\Models\UserCertification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class UserCertificationController extends Controller
{
    public function create()
    {
        return view('certification.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'certificate_name' => 'required|string|max:255',
            'certification_from' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        $data = [
            'certificate_name' => $request->input('certificate_name'),
            'certification_from' => $request->input('certification_from'),
            'year' => $request->input('year'),
        ];

        $user->usercertification()->create($data);        

        $successMessage = "User certification successfully added";

        return redirect()->route('profile.show')->with('success', $successMessage);
    }
     /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request)
    {
        $userCertification = UserCertification::find($request->id_certification);
        return view('certification.edit', compact('userCertification'));
    }

    public function update(Request $request, UserCertification $userCertification)
    {
        $request->validate([
            'certificate_name' => 'required|string|max:255',
            'certification_from' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        $userCertification = UserCertification::find($request->id_certification);

        $userCertification->update([
            'certificate_name' => $request->certificate_name,
            'certification_from' => $request->certification_from,
            'year' => $request->year,
        ]);

        $successMessage = "User certification successfully edited";

        return redirect()->route('profile.show')->with('success', $successMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        UserCertification::find($request->id_certification)->delete();
        $successMessage = "User certification successfully deleted";
        return back()->with('success', $successMessage);
    }
}
