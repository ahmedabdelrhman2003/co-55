<?php

use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\FaqsController;
use App\Http\Controllers\dashboard\AboutController;
use App\Http\Controllers\dashboard\PrivacyController;
use App\Http\Controllers\dashboard\TermsController;
use App\Http\Controllers\dashboard\WhyController;
use App\Http\Controllers\dashboard\AmenitiesController;



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\LocationsController;
use App\Http\Controllers\dashboard\ServicesController;

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
Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::get('create-user', [AuthController::class, 'create'])->name('auth.create');
Route::get('destroy-user/{id}', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::get('admins', [AuthController::class, 'admins'])->name('auth.admins');




Route::post('login-user', [AuthController::class, 'login_user'])->name('auth.login-user');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('loggedIn');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('forgot', [ForgotPasswordController::class, 'index'])->name('auth.forgot');
Route::post('forgot-pasword', [ForgotPasswordController::class, 'forgot_password'])->name('auth.forgot-password');
Route::get('reset/{token}', [ForgotPasswordController::class, 'reset'])->name('auth.reset');
Route::post('reset-password', [ForgotPasswordController::class, 'reset_password'])->name('auth.reset-password');

Route::prefix('dashboard')->middleware('loggedIn')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs.index');
    Route::get('/create-faqs', [FaqsController::class, 'create'])->name('faqs.create');
    Route::post('/store-faqs', [FaqsController::class, 'store'])->name('faqs.store');
    Route::post('/update-faqs/{id}', [FaqsController::class, 'update'])->name('faqs.update');
    Route::get('/edit-faqs/{id}', [FaqsController::class, 'edit'])->name('faqs.edit');
    Route::get('/view-faqs/{id}', [FaqsController::class, 'show'])->name('faqs.view');
    Route::get('/destroy-faqs/{id}', [FaqsController::class, 'destroy'])->name('faqs.destroy');

    Route::get('/abouts', [AboutController::class, 'index'])->name('abouts.index');
    Route::get('/create-abouts', [AboutController::class, 'create'])->name('abouts.create');
    Route::post('/store-abouts', [AboutController::class, 'store'])->name('abouts.store');
    Route::post('/update-abouts/{id}', [AboutController::class, 'update'])->name('abouts.update');
    Route::get('/edit-abouts/{id}', [AboutController::class, 'edit'])->name('abouts.edit');
    Route::get('/view-abouts/{id}', [AboutController::class, 'show'])->name('abouts.view');
    Route::get('/destroy-abouts/{id}', [AboutController::class, 'destroy'])->name('abouts.destroy');

    Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy.index');
    Route::get('/view-privacy/{id}', [PrivacyController::class, 'show'])->name('privacy.view');
    Route::post('/update-privacy/{id}', [PrivacyController::class, 'update'])->name('privacy.update');
    Route::get('/edit-privacy/{id}', [PrivacyController::class, 'edit'])->name('privacy.edit');

    Route::get('/terms', [TermsController::class, 'index'])->name('terms.index');
    Route::get('/view-terms/{id}', [TermsController::class, 'show'])->name('terms.view');
    Route::post('/update-terms/{id}', [TermsController::class, 'update'])->name('terms.update');
    Route::get('/edit-terms/{id}', [TermsController::class, 'edit'])->name('terms.edit');

    Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
    Route::get('/view-services/{id}', [ServicesController::class, 'show'])->name('services.view');
    Route::post('/update-services/{id}', [ServicesController::class, 'update'])->name('services.update');
    Route::get('/edit-services/{id}', [ServicesController::class, 'edit'])->name('services.edit');
    Route::get('/create-services', [ServicesController::class, 'create'])->name('services.create');
    Route::get('/destroy-services/{id}', [ServicesController::class, 'destroy'])->name('services.destroy');
    Route::post('/store-services', [ServicesController::class, 'store'])->name('services.store');

    Route::get('/account', [DashboardController::class, 'account'])->name('account');

    Route::get('/locations', [LocationsController::class, 'index'])->name('locations.index');
    Route::get('/view-locations/{id}', [LocationsController::class, 'show'])->name('locations.view');
    Route::post('/update-locations/{id}', [LocationsController::class, 'update'])->name('locations.update');
    Route::get('/edit-locations/{id}', [LocationsController::class, 'edit'])->name('locations.edit');
    Route::get('/create-locations', [LocationsController::class, 'create'])->name('locations.create');
    Route::get('/destroy-locations/{id}', [LocationsController::class, 'destroy'])->name('locations.destroy');
    Route::post('/store-locations', [LocationsController::class, 'store'])->name('locations.store');


    Route::get('/why', [WhyController::class, 'index'])->name('why.index');
    Route::get('/view-why/{id}', [WhyController::class, 'show'])->name('why.view');
    Route::post('/update-why/{id}', [WhyController::class, 'update'])->name('why.update');
    Route::get('/edit-why/{id}', [WhyController::class, 'edit'])->name('why.edit');
    Route::get('/create-why', [WhyController::class, 'create'])->name('why.create');
    Route::get('/destroy-why/{id}', [WhyController::class, 'destroy'])->name('why.destroy');
    Route::post('/store-why', [WhyController::class, 'store'])->name('why.store');


    Route::get('/amenities', [AmenitiesController::class, 'index'])->name('amenities.index');
    Route::get('/view-amenities/{id}', [AmenitiesController::class, 'show'])->name('amenities.view');
    Route::post('/update-amenities/{id}', [AmenitiesController::class, 'update'])->name('amenities.update');
    Route::get('/edit-amenities/{id}', [AmenitiesController::class, 'edit'])->name('amenities.edit');
    Route::get('/create-amenities', [AmenitiesController::class, 'create'])->name('amenities.create');
    Route::get('/destroy-amenities/{id}', [AmenitiesController::class, 'destroy'])->name('amenities.destroy');
    Route::post('/store-amenities', [AmenitiesController::class, 'store'])->name('amenities.store');

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/view-home/{id}', [HomeController::class, 'show'])->name('home.view');
    Route::post('/update-home/{id}', [HomeController::class, 'update'])->name('home.update');
    Route::get('/edit-home/{id}', [HomeController::class, 'edit'])->name('home.edit');
    Route::get('/create-home', [HomeController::class, 'create'])->name('home.create');
    Route::get('/destroy-home/{id}', [HomeController::class, 'destroy'])->name('home.destroy');
    Route::post('/store-home', [HomeController::class, 'store'])->name('home.store');
})->middleware('loggedIn');
