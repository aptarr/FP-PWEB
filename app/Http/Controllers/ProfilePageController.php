<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;

class ProfilePageController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        $services = User::find($id)->service()->get();

        $services = Service::join('users', 'services.user_id', '=', 'users.id')
        ->leftJoin('user_review', 'services.id', '=', 'user_review.service_id')
        ->where('services.user_id', $id) // Filter services by user ID
        ->select(
            'services.*',
            'users.name as username',
            DB::raw('COUNT(user_review.id) as total_reviews')
        )
        ->groupBy('services.id', 'users.name') // Include 'total_reviews' in the grouping
        ->get();

        return view('profile_page', compact('user', 'services'));
    }
}
