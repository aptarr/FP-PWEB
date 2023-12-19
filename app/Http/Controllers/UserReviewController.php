<?php

namespace App\Http\Controllers;

use App\Models\UserReview;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReviewController extends Controller
{
    public function index($id, $transaction_id)
    {
        return view('review', compact('id', 'transaction_id'));
    }


    public function store($id, $transaction_id, Request $request)
    {
        $user = Auth::user();

        $user->userreview()->create([
            'star_rating' => $request->rating_star,
            'review_description' => $request->review_description,
            'user_id' => $user->id,
            'service_id' => $id,
        ]);

        $transaction = Transaction::find($transaction_id);

        if ($transaction) {
            // Update the isReview field to 1
            $transaction->update(['isReview' => 1]);
        }
        
        $successMessage = "Review successfully send";
        return redirect()->route('get.myorder')->with('success', $successMessage);
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserReview $userReview)
    {
        $request->validate([
            'star_rating' => 'required|integer|max:5',
            'review_description' => 'required|string|max:255',
        ]);

        $userReview->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserReview $userReview)
    {
        $userReview->delete();
    }
}
