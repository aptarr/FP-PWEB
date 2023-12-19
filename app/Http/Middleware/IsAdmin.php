<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and is an admin
        if ($request->user() && $request->user()->isAdmin) {
            return $next($request);
        }

        // Redirect or handle unauthorized access as needed
        abort(403, 'Unauthorized action.');

        // Alternatively, you can redirect to a login page
        // return redirect('/login')->with('error', 'Unauthorized access.');

        // Or any other logic you prefer

    }
}

