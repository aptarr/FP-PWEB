<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\UserLanguage;
use App\Models\User;
use App\Models\UserReview;
use App\Models\FasilitasKamar;
use App\Models\FasilitasKamarMandi;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function filterService($subcategory_id)
    {
        
        // Your filtering logic here...
        // Example: Filter services based on the subcategory_id
        // $subcategoryId = $request->input('subcategory_id');
        $debugInfo = [
            'subcategoryId' => $subcategory_id,
            // ... Add other debug information as needed ...
        ];

        $services = Service::with(['user', 'subcategory']) // Assuming 'user' and 'subcategory' are the relationship methods in the Service model
            ->where('subcategory_id', $subcategory_id)
            ->get();


        
        //return response()->json($debugInfo);
        return response()->json($services);
    }

    public function index()
    {
        // $randomSubcategory = Subcategory::inRandomOrder()->first();
        $subcategories = Subcategory::all();

        // $reccomendServices = Service::join('users', 'services.user_id', '=', 'users.id')
        // ->leftJoin('user_review', 'services.id', '=', 'user_review.service_id')
        // ->where('services.subcategory_id', $randomSubcategory->id) // Filter by the randomized subcategory ID
        // ->select(
        //     'services.*',
        //     'users.name as username',
        //     DB::raw('COUNT(user_review.id) as total_reviews')
        // )
        // ->groupBy('services.id', 'users.name')
        // ->take(5)
        // ->get();


        $services = Service::join('users', 'services.user_id', '=', 'users.id')
        ->leftJoin('user_review', 'services.id', '=', 'user_review.service_id')
        ->select(
            'services.*',
            'users.name as username',
            DB::raw('AVG(user_review.star_rating) as avg_star_rating'),
            DB::raw('COUNT(user_review.id) as total_reviews')
        )
        ->groupBy('services.id', 'users.name')
        ->take(100)
        ->get();

        //dd($services);


        return view('dashboard', compact('services', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_user = Auth::user()->id;
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('service.addgigs', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        // dd($request);
        $user = Auth::user();
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'kamar_tersedia' => 'required|integer|min:1',
            'harga_per_bulan' => 'required|integer|min:1',
            'fasilitas_kost' => 'required|array|min:1',
            'fasilitas_kamar_mandi' => 'required|array|min:1',
            'image' => 'max:2048|mimes:jpeg,png,jpg'
        ]);

        if($request->has('image')) {
            $path = $request->file('image')->store('public/images');
        } else {
            $path = NULL;
        }


        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'kamar_tersedia' => $request->input('kamar_tersedia'),
            'harga_per_bulan' => $request->input('harga_per_bulan'),
            'image' => $path,
            'subcategory_id' => $request->input('subcategory_id'),
            'average_star' => 0,
        ];

        $service = $user->service()->create($data);

        // Insert FasilitasKost records
        foreach ($request->input('fasilitas_kost') as $fasilitasOption) {
            FasilitasKamar::create([
                'service_id' => $service->id,
                'fasilitas' => $fasilitasOption,
            ]);
        }

        foreach ($request->input('fasilitas_kamar_mandi') as $fasilitasOption) {
            FasilitasKamarMandi::create([
                'service_id' => $service->id,
                'fasilitas' => $fasilitasOption,
            ]);
        }

        $successMessage = "Kost successfully added";

        return redirect()->route('profile.show')->with('success', $successMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $user_id)
    {
        $user = User::find($user_id);

        $fasilitasKamar = FasilitasKamar::where('service_id', $id)->pluck('fasilitas')->toArray();
        $fasilitasKamarMandi = FasilitasKamarMandi::where('service_id', $id)->pluck('fasilitas')->toArray();

        $reviews = UserReview::join('users', 'user_review.user_id', '=', 'users.id')
            ->where('user_review.service_id', $id)
            ->select('user_review.*', 'users.name as user_name')
            ->get();

           // dd($reviews);

        $registrationYear = $user->created_at->format('Y');

        $service = Service::join('users', 'services.user_id', '=', 'users.id')
        ->leftJoin('user_review', 'services.id', '=', 'user_review.service_id')
        ->select(
            'services.*',
            'users.name as username',
            'users.image as user_image',
            DB::raw('AVG(user_review.star_rating) as avg_star_rating'),
            DB::raw('COUNT(user_review.id) as total_reviews')
        )
        ->where('services.id', $id)
        ->groupBy('services.id', 'users.name')
        ->first(); // Use first() to get a single result


        

        return view('gigs', compact('service', 'fasilitasKamar', 'fasilitasKamarMandi', 'registrationYear', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function filter(Request $request)
    {
        $searchBar = $request->input('search_bar');

        //tambah berdasrakn lokasi (subcategory)
        $services = Service::where('title', 'like', '%' . $searchBar . '%')
            ->leftJoin('users', 'services.user_id', '=', 'users.id')
            ->leftJoin('user_review', 'services.user_id', '=', 'user_review.user_id')
            ->select(
                'services.*',
                'users.name as username',
                'users.image as user_image',
                DB::raw('AVG(user_review.star_rating) as avg_star_rating'),
                DB::raw('COUNT(user_review.id) as total_reviews')
            )
            ->groupBy('services.id', 'users.name')
            ->get();

        return view('searchfilter', compact('services', 'searchBar'));
    }

    public function edit(Request $request)
    {
        $service = Service::find($request->id_service);
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('service.editgigs', compact('service', 'categories', 'subcategories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        // dd($request);
        $user = Auth::user();
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'kamar_tersedia' => 'required|integer|min:1',
            'harga_per_bulan' => 'required|integer|min:1',
            'fasilitas_kost' => 'required|array|min:1',
            'fasilitas_kamar_mandi' => 'required|array|min:1',
            'image' => 'max:2048|mimes:jpeg,png,jpg'
        ]);

        $service = Service::find($request->id_service);

        // Find and delete all FasilitasKost records
        FasilitasKamar::where('service_id', $service->id)->delete();

        // Find and delete all FasilitasKamarMandi records
        FasilitasKamarMandi::where('service_id', $service->id)->delete();

        if($service->image) {
            Storage::delete($service->image);
        }

        $path = $request->file('image')->store('public/images');

        $service = Service::find($request->id_service);
        $service->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'kamar_tersedia' => $request->input('kamar_tersedia'),
            'harga_per_bulan' => $request->input('harga_per_bulan'),
            'image' => $path,
            'subcategory_id' => $request->input('subcategory_id'),
        ]);

        foreach ($request->input('fasilitas_kost') as $fasilitasOption) {
            FasilitasKamar::create([
                'service_id' => $service->id,
                'fasilitas' => $fasilitasOption,
            ]);
        }

        foreach ($request->input('fasilitas_kamar_mandi') as $fasilitasOption) {
            FasilitasKamarMandi::create([
                'service_id' => $service->id,
                'fasilitas' => $fasilitasOption,
            ]);
        }

        $successMessage = "Kost successfully edited";

        return redirect()->route('profile.show')->with('success', $successMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $service = Service::find($request->id_service);

        if($service->image) {
            Storage::delete($service->image);
        }
        $service->delete();

        $successMessage = "kost successfully deleted";

        return back()->with('success', $successMessage);
    }

    public function destroyAdmin(Request $request)
    {
        $service = Service::find($request->id_service);

        if($service->image) {
            Storage::delete($service->image);
        }
        $service->delete();

        $successMessage = "Service deleted succesfully";

        return redirect()->route('dashboard')->with('success', $successMessage);
    }


}
