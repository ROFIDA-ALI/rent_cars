<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\UserController;

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
//  web
Route::get('listings', [CarController::class, 'listings'])->name('listings') ;
Route::get('index', [HomeController::class, 'weblistings'])->name('index') ;
Route::get('single/{id}', [CarController::class, 'single'])->name('single');
Route::get('testimonials', [TestimonialsController::class, 'testimonials'])->name('testimonials') ;
Route::get('addContact', [ContactController::class, 'create'])->name('addContact');

Route::get('blog', function () {
    return view('web.blog');
})->name('blog') ; 

Route::get('about', function () {
return view('web.about');
})->name('about') ;


Route::get('register', [UserController::class, 'register'])->name('register');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Auth::routes(['verify'=>true]);
// Route::middleware(['ensureUserIsActive'])->group(function () {

// Cars
Route::get('cars', [CarController::class, 'index'])->name('cars')->middleware('verified');
Route::get('addCar', [CarController::class, 'create'])->name('addCar')->middleware('verified');
Route::post('carsStore', [CarController::class, 'store'])->name('carsStore')->middleware('verified');
Route::get('editcar/{id}', [CarController::class, 'edit']);
 Route::put("updateCar/{id}", 
 [CarController::class,'update'])->name('updateCar')->middleware('verified');
 Route::get('deleteCar/{id}', [CarController::class, 'delete'])->middleware('verified'); //forsedelete
// Category

Route::get('addCategory', [CategoryController::class, 'create'])->name('addCategory')->middleware('verified');
Route::post('categoryStore', [CategoryController::class, 'store'])->name('categoryStore')->middleware('verified');
Route::get('categories', [CategoryController::class, 'index'])->name('categories')->middleware('verified');
Route::get('editcategory/{id}', [CategoryController::class, 'edit'])->middleware('verified');
 Route::put("updateCategory/{id}", 
 [CategoryController::class,'update'])->name('updateCategory')->middleware('verified');
 Route::get('deleteCategory/{id}', [CategoryController::class, 'delete'])->middleware('verified'); //forsedelete
 
 //Testimonials
 Route::get('addTestimonials', [TestimonialsController::class, 'create'])->name('addTestimonials')->middleware('verified');
 Route::post('testimonialStore', [TestimonialsController::class, 'store'])->name('testimonialStore')->middleware('verified');
 Route::get('testimonialtable', [TestimonialsController::class, 'index'])->name('testimonialtable')->middleware('verified');  //table admin
 Route::get('editTestimonial/{id}', [TestimonialsController::class, 'edit'])->middleware('verified');
 Route::put('updateTestimonial/{id}', [TestimonialsController::class, 'update'])->name('updateTestimonial')->middleware('verified');
 Route::get('deleteTestimonial/{id}', [TestimonialsController::class, 'delete'])->middleware('verified'); 




// contact

Route::post('contactStore', [ContactController::class,'contact_mail'])->name('contactStore')->middleware('verified');
Route::get('ContactMessages', [ContactController::class, 'index'])->name('ContactMessages')->middleware('verified');  //table admin
Route::get('showMessage/{id}', [ContactController::class, 'show'])->name('showMessage')->middleware('verified');
Route::get('deleteMessage/{id}', [ContactController::class, 'delete'])->middleware('verified'); 

//user
Route::get('users', [UserController::class, 'index'])->name('users')->middleware('verified');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('addUser', [UserController::class, 'create'])->name('addUser')->middleware('verified');
Route::post('userStore', [UserController::class, 'store'])->name('userStore')->middleware('verified');
Route::get('edituser/{id}', [UserController::class, 'edit'])->middleware('verified');
 Route::put('updateUser/{id}', [UserController::class, 'update'])->name('updateUser')->middleware('verified');
 Route::get('deleteUser/{id}', [UserController::class, 'delete'])->middleware('verified'); 
 
// });