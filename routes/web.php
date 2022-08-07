<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChangePassword;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $brands = DB::table('brands')->get();
//     $sliders = DB::table('sliders')->get();
//     $about = DB::table('home_abouts')->first();

//     return view('home', compact('brands','sliders','about'));

// });



// LogOut Route
Route::get('user/logout',[BrandController::class,'Logout'])->name('user.logout');

//CategoryRoute
Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::post('/category/add',[CategoryController::class,'store'])->name('addcategory');

Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('editcategory');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('updatecategory');
Route::get('/category/softdelete/{id}',[CategoryController::class,'softdeletes'])->name('softdelete');

Route::get('/category/restore/{id}',[CategoryController::class,'restore'])->name('restore');
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('delete');

// Brand Route
Route::get('brand',[BrandController::class,'index'])->name('brand');
Route::post('brand',[BrandController::class,'store'])->name('storebrand');
Route::get('brand/edit/{id}',[BrandController::class,'brandEdit'])->name('brandEdit');
Route::post('brand/update/{id}',[BrandController::class,'brandUpdate'])->name('brandUpdate');
Route::get('brand/delete/{id}',[BrandController::class,'brandDelete'])->name('brandDelete');

// Multiple Image Route
Route::get('multipic',[BrandController::class,'multipic'])->name('multipic');
Route::post('multipic/store',[BrandController::class,'storeImg'])->name('storeImg');

// Home Route
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/home/slider',[HomeController::class,'homeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class,'addSlider'])->name('addSlider');
Route::post('/store/slider',[HomeController::class,'storeSlider'])->name('storeSlider');
Route::get('slider/edit/{id}',[HomeController::class,'sliderEdit'])->name('sliderEdit');
Route::post('slider/update/{id}',[HomeController::class,'sliderUpdate'])->name('sliderUpdate');
Route::get('slider/delete/{id}',[HomeController::class,'sliderDelete'])->name('sliderDelete');

// Home About Route
Route::get('home/about',[AboutController::class,'homeAbout'])->name('home.about');
Route::get('add/about',[AboutController::class,'addAbout'])->name('addAbout');
Route::post('store/about',[AboutController::class,'storeAbout'])->name('storeAbout');
Route::get('about/edit/{id}',[AboutController::class,'editAbout'])->name('editAbout');
Route::post('about/update/{id}',[AboutController::class,'updateAbout'])->name('updateAbout');
Route::get('about/delete/{id}',[AboutController::class,'deleteAbout'])->name('deleteAbout');

// Portfoli Route
Route::get('portfolio',[AboutController::class,'Portfolio'])->name('portfolio');

//Admin Contact Page Route
// # Profile
Route::get('admin/contact',[ContactController::class,'adminContact'])->name('adminContact');
Route::get('add/contact',[ContactController::class,'addContact'])->name('addContact');
Route::post('store/contact',[ContactController::class,'storeContact'])->name('storeContact');
Route::get('contact/edit/{id}',[ContactController::class,'editContact'])->name('editContact');
Route::post('contact/update/{id}',[ContactController::class,'updateContact'])->name('updateContact');
Route::get('contact/delete/{id}',[ContactController::class,'deleteContact'])->name('deleteContact');

// # Message
Route::get('admin/message',[ContactController::class,'adminMessage'])->name('adminMessage');
Route::get('message/delete/{id}',[ContactController::class,'deleteMessage'])->name('deleteMessage');


// Home Contact Page Route
Route::get('contact',[ContactController::class,'Contact'])->name('Contact');
Route::post('contact/form',[ContactController::class,'ContactForm'])->name('ContactForm');

// Change Password Route
Route::get('user/password',[ChangePassword::class,'index'])->name('change.password');

// User Profile
Route::get('user/profile',[ChangePassword::class,'Profile']);
Route::post('user/profile',[ChangePassword::class,'Upadate_Profile'])->name('profile.update');


Route::get('/dashboard', function () {
    $users = User::all();
    return view('admin.index',compact('users'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
