<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function index($subcategory, $budgetLower, $budgetUpper, $time)
    {
        // Find the Subcategory by name or another identifier
        $subcategoryModel = Subcategory::where('subcategory_name', $subcategory)->first();
        //dd($subcategoryModel);
        // Check if the subcategory exists
        if (!$subcategoryModel) {
            abort(404); // Or handle the case when the subcategory is not found
        }

        // Get all services related to the subcategory
        $services = Service::where('subcategory_id', $subcategoryModel->id)
            ->leftJoin('user_review', 'services.id', '=', 'user_review.service_id')
            ->leftJoin('users', 'services.user_id', '=', 'users.id') // User who created the service
            ->select(
                'services.*',
                'users.name as username',
                'users.image as user_image',
                DB::raw('COUNT(user_review.id) as total_reviews')
            )
            ->groupBy('services.id')
            ->get();

        //dd($services);
        // Pass the services to the view
        return view('subcategory', compact('subcategoryModel', 'services', 'budgetLower', 'budgetUpper', 'time'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|string|max:255',
        ]);

        Subcategory::create($request->all());
        return redirect('/');
    }
     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'subcategory_name' => 'required|string|max:255',
        ]);

        $subcategory->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
    }
}
