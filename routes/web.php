<?php

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\UserSkill;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLanguageController;
use App\Http\Controllers\UserSkillController;
use App\Http\Controllers\UserEducationController;
use App\Http\Controllers\UserCertificationController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceReportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ServiceController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/services/{id}/{user_id}', [ServiceController::class, 'show'])->name('service.show');


Route::post('/searchfilter', [ServiceController::class, 'filter'])->name('service.filter');

// Route for handling the transaction
Route::post('/store-transaction/{id}/{package}', [TransactionController::class, 'storeTransaction'])
    ->name('store.transaction');


Route::get('/subcategory/{subcategory}/{budgetLower}/{budgetUpper}/{time}', [SubcategoryController::class, 'index'])->name('subcategory.show');
Route::get('/my_order', [TransactionController::class, 'index'])->name('get.myorder');
Route::patch('/my_order/edit/{id}/{status}', [TransactionController::class, 'update_my_order'])->name('update.myorder');
Route::get('/my_order/download/{id}', [TransactionController::class, 'download'])->name('download.myorder');


Route::get('/manage_order', [TransactionController::class, 'manage'])->name('get.sellorder');
Route::patch('/manage_order/edit/{id}/{status}', [TransactionController::class, 'update'])->name('update.sellorder');
Route::patch('/manage_order/complete/{id}/{status}', [TransactionController::class, 'complete'])->name('complete.sellorder');

Route::get('/review/{id}/{transaction_id}', [UserReviewController::class, 'index'])->name('review.show');
Route::post('/review/{id}/{transaction_id}', [UserReviewController::class, 'store'])->name('review.store');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.show');
Route::get('/report/{id}', [ServiceReportController::class, 'index'])->name('report.show');
Route::post('/report/{id}', [ServiceReportController::class, 'store'])->name('report.store');

// Route::get('/my_order', function(){
//     return view('my_order');
// })->name('myorder');
Route::get('/testingJob',function(){
    dispatch(new App\Jobs\CalculateServiceRating);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/gigs', function(){
//     return view('gigs');
// });

Route::get('/addgigs', function(){
    return view('addgigs');
});

Route::patch('/profile_picture/{id_user}/edit', [UserController::class, 'update'])->name('profile-picture.update');
Route::get('/description/{id_user}/edit', [UserController::class,'editDescription'])->name('description.edit');
Route::patch('/description/{id_user}/edit', [UserController::class,'updateDescription'])->name('description.update');

Route::get('/gigs', [ServiceController::class, 'create'])->name('service.create');
Route::post('/gigs', [ServiceController::class,'store'])->name('service.store');
Route::get('/gigs/{id_service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
Route::patch('/gigs/{id_service}/edit', [ServiceController::class,'update'])->name('service.update');
Route::delete('/gigs/{id_service}/delete', [ServiceController::class,'destroy'])->name('service.destroy');
Route::delete('/gigs/{id_service}/deleteadmin', [ServiceController::class,'destroyAdmin'])->name('service.admin.destroy');

Route::get('/language', [UserLanguageController::class, 'create'])->name('language.create');
Route::post('/language', [UserLanguageController::class, 'store'])->name('language.store');
Route::get('/language/{id_language}/edit', [UserLanguageController::class, 'edit'])->name('language.edit');
Route::patch('/language/{id_language}/edit', [UserLanguageController::class, 'update'])->name('language.update');
Route::delete('/language/{id_language}/delete', [UserLanguageController::class, 'destroy'])->name('language.destroy');

Route::get('/skill', [UserSkillController::class, 'create'])->name('skill.create');
Route::post('/skill', [UserSkillController::class, 'store'])->name('skill.store');
Route::get('/skill/{id_skill}/edit', [UserSkillController::class, 'edit'])->name('skill.edit');
Route::patch('/skill/{id_skill}/edit', [UserSkillController::class, 'update'])->name('skill.update');
Route::delete('/skill/{id_skill}/delete', [UserSkillController::class, 'destroy'])->name('skill.destroy');

Route::get('/education', [UserEducationController::class, 'create'])->name('education.create');
Route::post('/education', [UserEducationController::class, 'store'])->name('education.store');
Route::get('/education/{id_education}/edit', [UserEducationController::class, 'edit'])->name('education.edit');
Route::patch('/education/{id_education}/edit', [UserEducationController::class, 'update'])->name('education.update');
Route::delete('/education/{id_education}/delete', [UserEducationController::class, 'destroy'])->name('education.destroy');

Route::get('/certification', [UserCertificationController::class, 'create'])->name('certification.create');
Route::post('/certification', [UserCertificationController::class, 'store'])->name('certification.store');
Route::get('/certification/{id_certification}/edit', [UserCertificationController::class, 'edit'])->name('certification.edit');
Route::patch('/certification/{id_certification}/edit', [UserCertificationController::class, 'update'])->name('certification.update');
Route::delete('/certification/{id_certification}/delete', [UserCertificationController::class, 'destroy'])->name('certification.destroy');

Route::get('/profile_page/{id}', [ProfilePageController::class, 'show'])->name('profile.page.show');

// Route::get('/addgigs', function(){
//     return view('addgigs');
// });

// Route::get('/manage_order', function(){
//     return view('manage_order');
// });


Route::get('/report', function(){
    return view('report');
});

Route::get('/wishlist', function(){
    return view('wishlist');
});

// Route::get('/searchfilter', function(){
//     return view('searchfilter');
// });


// Route::get('/subcategory', function(){
//     return view('subcategory');
// });

Route::get('/test-relationships', function () {
    // Create a category
    $category = Category::create(['category_name' => 'Example Category']);

    // Create a subcategory and associate it with the category
    $subcategory = $category->subcategories()->create(['subcategory_name' => 'Example Subcategory']);

    // Retrieve a category with its subcategories
    $categoryWithSubcategories = Category::with('subcategories')->find($category->id);

    // Access subcategories
    $subcategories = $categoryWithSubcategories->subcategories;

    // Output the results (you can modify this part based on your needs)
    dd($category, $subcategory, $categoryWithSubcategories, $subcategories);
});

Route::get('/test-user-skill-relationship', function () {
    // Create a user
    $user = User::create([
        'name' => 'John Doe',
        'email' => 'jodsaadassn.doe@example.com',
        'password' => bcrypt('password123'), // Make sure to hash the password
        'description' => 'A user description',
        'occupation' => 'Software Developer',
        'user_privilege' => 'admin', // Modify based on your user privileges
    ]);

    // Create sample data for each relationship
   $user->userskill()->create(['skill' => 'Programming', 'experience_level' => 'Intermediate']);

    // Retrieve the user with their associated data
    $userWithRelatedData = User::with([
        'userskill',
    ])->find($user->id);

    // Output the results (you can modify this part based on your needs)
    dd($user, $userWithRelatedData);
});

//Route::post('/register_user_language', [UserLanguageController::class, 'store']);

// Route::post('/register_user_skill', [UserSkillController::class, 'store']);

// Route::post('/register_user_education', [UserEducationController::class, 'store']);

// Route::post('/register_user_certification', [UserCertificationController::class, 'store']);

// Route::post('/register_user_notification', [UserNotificationController::class, 'store']);

// Route::post('/register_user_review', [UserReviewController::class, 'store']);

require __DIR__.'/auth.php';
