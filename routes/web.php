<?php

use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\FaqsController;
use App\Http\Controllers\dashboard\AboutController;
use App\Http\Controllers\dashboard\PrivacyController;
use App\Http\Controllers\dashboard\TermsController;
use App\Http\Controllers\dashboard\WhyController;
use App\Http\Controllers\dashboard\JobController;
use App\Http\Controllers\dashboard\AmenitiesController;

use App\Http\Controllers\dashboard\TestimonialsController;

use App\Http\Controllers\PageController;




use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\dashboard\ActivationController;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\InquiryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');

Route::middleware('loggedIn')->group(function () {
    Route::get('create-user', [AuthController::class, 'create'])->name('auth.create')->can('add-admins');
    Route::get('destroy-user/{id}', [AuthController::class, 'destroy'])->name('auth.destroy')->middleware('can:destroy-user');
    Route::get('admins', [AuthController::class, 'admins'])->name('auth.admins')->can('admins');
    Route::get('edit-user/{id}', [AuthController::class, 'edit'])->name('auth.edit')->can('edit-admins');
    Route::post('update-user/{id}', [AuthController::class, 'update'])->name('auth.update');
    Route::get('create-role', [RoleController::class, 'create'])->name('role.create')->middleware('can:add-roles');
    Route::get('destroy-role/{id}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware('can:destroy-roles');
    Route::get('edit-role/{id}', [RoleController::class, 'edit'])->name('role.edit')->middleware('can:edit-roles');
    Route::post('update-role/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::post('/store-role', [RoleController::class, 'store'])->name('role.store');
    Route::get('role', [RoleController::class, 'index'])->name('role.index')->can('roles');
    Route::get('/view-role/{id}', [RoleController::class, 'show'])->name('role.view')->middleware('can:view-roles');
});




Route::post('login-user', [AuthController::class, 'login_user'])->name('auth.login-user');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('loggedIn');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('loggedIn');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('loggedIn');

Route::get('forgot', [ForgotPasswordController::class, 'index'])->name('auth.forgot');
Route::post('forgot-pasword', [ForgotPasswordController::class, 'forgot_password'])->name('auth.forgot-password');
Route::get('reset/{token}', [ForgotPasswordController::class, 'reset'])->name('auth.reset');
Route::post('reset-password', [ForgotPasswordController::class, 'reset_password'])->name('auth.reset-password');

Route::prefix('dashboard')->middleware('loggedIn')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/filter', [DashboardController::class, 'filter'])->name('dashboard.filter');


    Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs.index')->middleware('can:faqs');
    Route::get('/faqs/filter', [FaqsController::class, 'filter'])->name('faqs.filter')->middleware('can:faqs');

    Route::get('/create-faqs', [FaqsController::class, 'create'])->name('faqs.create')->middleware('can:add-faqs');
    Route::post('/store-faqs', [FaqsController::class, 'store'])->name('faqs.store');
    Route::post('/update-faqs/{id}', [FaqsController::class, 'update'])->name('faqs.update');
    Route::get('/edit-faqs/{id}', [FaqsController::class, 'edit'])->name('faqs.edit')->middleware('can:edit-faqs');
    Route::get('/view-faqs/{id}', [FaqsController::class, 'show'])->name('faqs.view')->middleware('can:view-faqs');
    Route::get('/destroy-faqs/{id}', [FaqsController::class, 'destroy'])->name('faqs.destroy')->middleware('can:destroy-faqs');

    Route::get('/abouts', [AboutController::class, 'index'])->name('abouts.index')->middleware('can:abouts');
    Route::get('/abouts/filter', [AboutController::class, 'filter'])->name('abouts.filter')->middleware('can:abouts');
    Route::get('/create-abouts', [AboutController::class, 'create'])->name('abouts.create')->middleware('can:add-abouts');
    Route::post('/store-abouts', [AboutController::class, 'store'])->name('abouts.store');
    Route::post('/update-abouts/{id}', [AboutController::class, 'update'])->name('abouts.update');
    Route::get('/edit-abouts/{id}', [AboutController::class, 'edit'])->name('abouts.edit')->middleware('can:edit-abouts');
    Route::get('/view-abouts/{id}', [AboutController::class, 'show'])->name('abouts.view')->middleware('can:view-abouts');
    Route::get('/destroy-abouts/{id}', [AboutController::class, 'destroy'])->name('abouts.destroy')->middleware('can:destroy-abouts');

    Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy.index')->middleware('can:privacy');
    Route::get('/view-privacy/{id}', [PrivacyController::class, 'show'])->name('privacy.view')->middleware('can:view-privacy');
    Route::post('/update-privacy/{id}', [PrivacyController::class, 'update'])->name('privacy.update');
    Route::get('/edit-privacy/{id}', [PrivacyController::class, 'edit'])->name('privacy.edit')->middleware('can:edit-privacy');

    Route::get('/terms', [TermsController::class, 'index'])->name('terms.index')->middleware('can:terms');
    Route::get('/view-terms/{id}', [TermsController::class, 'show'])->name('terms.view')->middleware('can:view-terms');
    Route::post('/update-terms/{id}', [TermsController::class, 'update'])->name('terms.update');
    Route::get('/edit-terms/{id}', [TermsController::class, 'edit'])->name('terms.edit')->middleware('can:edit-terms');

    Route::get('/services', [ServicesController::class, 'index'])->name('services.index')->middleware('can:services');
    Route::get('/services/filter', [ServicesController::class, 'filter'])->name('services.filter')->middleware('can:services');
    Route::get('/view-services/{id}', [ServicesController::class, 'show'])->name('services.view')->middleware('can:view-services');
    Route::post('/update-services/{id}', [ServicesController::class, 'update'])->name('services.update');
    Route::get('/edit-services/{id}', [ServicesController::class, 'edit'])->name('services.edit')->middleware('can:edit-services');
    Route::get('/create-services', [ServicesController::class, 'create'])->name('services.create')->middleware('can:add-services');
    Route::get('/destroy-services/{id}', [ServicesController::class, 'destroy'])->name('services.destroy')->middleware('can:destroy-services');
    Route::post('/store-services', [ServicesController::class, 'store'])->name('services.store');

    Route::get('/account', [DashboardController::class, 'account'])->name('account');

    Route::get('/activation/{model}/{id}', [ActivationController::class, 'model'])->name('activation.model');
    Route::get('/activations/{table}/{id}', [ActivationController::class, 'table'])->name('activation.table');

    Route::get('/locations', [LocationsController::class, 'index'])->name('locations.index')->middleware('can:locations');
    Route::get('/locations/filter', [LocationsController::class, 'filter'])->name('locations.filter')->middleware('can:locations');
    Route::get('/view-locations/{id}', [LocationsController::class, 'show'])->name('locations.view')->middleware('can:view-locations');
    Route::post('/update-locations/{id}', [LocationsController::class, 'update'])->name('locations.update');
    Route::get('/edit-locations/{id}', [LocationsController::class, 'edit'])->name('locations.edit')->middleware('can:edit-locations');
    Route::get('/create-locations', [LocationsController::class, 'create'])->name('locations.create')->middleware('can:add-locations');
    Route::get('/destroy-locations/{id}', [LocationsController::class, 'destroy'])->name('locations.destroy')->middleware('can:destroy-locations');
    Route::post('/store-locations', [LocationsController::class, 'store'])->name('locations.store');


    Route::get('/why', [WhyController::class, 'index'])->name('why.index')->middleware('can:why');
    Route::get('/why/filter', [WhyController::class, 'filter'])->name('why.filter')->middleware('can:why');
    Route::get('/view-why/{id}', [WhyController::class, 'show'])->name('why.view')->middleware('can:view-why');
    Route::post('/update-why/{id}', [WhyController::class, 'update'])->name('why.update');
    Route::get('/edit-why/{id}', [WhyController::class, 'edit'])->name('why.edit')->middleware('can:edit-why');
    Route::get('/create-why', [WhyController::class, 'create'])->name('why.create')->middleware('can:add-why');
    Route::get('/destroy-why/{id}', [WhyController::class, 'destroy'])->name('why.destroy')->middleware('can:destroy-why');
    Route::post('/store-why', [WhyController::class, 'store'])->name('why.store');

    Route::get('/testimonials/filter', [TestimonialsController::class, 'filter'])->name('testimonials.filter')->middleware('can:testimonials');
    Route::get('/testimonials', [TestimonialsController::class, 'index'])->name('testimonials.index')->middleware('can:testimonials');
    Route::get('/view-testimonials/{id}', [TestimonialsController::class, 'show'])->name('testimonials.view')->middleware('can:view-testimonials');
    Route::post('/update-testimonials/{id}', [TestimonialsController::class, 'update'])->name('testimonials.update');
    Route::get('/edit-testimonials/{id}', [TestimonialsController::class, 'edit'])->name('testimonials.edit')->middleware('can:edit-testimonials');
    Route::get('/create-testimonials', [TestimonialsController::class, 'create'])->name('testimonials.create')->middleware('can:add-testimonials');
    Route::get('/destroy-testimonials/{id}', [TestimonialsController::class, 'destroy'])->name('testimonials.destroy')->middleware('can:destroy-testimonials');
    Route::post('/store-testimonials', [TestimonialsController::class, 'store'])->name('testimonials.store');

    Route::get('/amenities/filter', [AmenitiesController::class, 'filter'])->name('amenities.filter')->middleware('can:amenities');
    Route::get('/amenities', [AmenitiesController::class, 'index'])->name('amenities.index')->middleware('can:amenities');
    Route::get('/view-amenities/{id}', [AmenitiesController::class, 'show'])->name('amenities.view')->middleware('can:view-amenities');
    Route::post('/update-amenities/{id}', [AmenitiesController::class, 'update'])->name('amenities.update');
    Route::get('/edit-amenities/{id}', [AmenitiesController::class, 'edit'])->name('amenities.edit')->middleware('can:edit-amenities');
    Route::get('/create-amenities', [AmenitiesController::class, 'create'])->name('amenities.create')->middleware('can:add-amenities');
    Route::get('/destroy-amenities/{id}', [AmenitiesController::class, 'destroy'])->name('amenities.destroy')->middleware('can:destroy-amenities');
    Route::post('/store-amenities', [AmenitiesController::class, 'store'])->name('amenities.store');


    Route::get('/home', [HomeController::class, 'index'])->name('home.index')->middleware('can:home');
    Route::get('/home/filter', [HomeController::class, 'filter'])->name('home.filter')->middleware('can:home');
    Route::get('/view-home/{id}', [HomeController::class, 'show'])->name('home.view')->middleware('can:view-home');
    Route::post('/update-home/{id}', [HomeController::class, 'update'])->name('home.update');
    Route::get('/edit-home/{id}', [HomeController::class, 'edit'])->name('home.edit')->middleware('can:edit-home');
    Route::get('/create-home', [HomeController::class, 'create'])->name('home.create')->middleware('can:add-home');
    Route::get('/destroy-home/{id}', [HomeController::class, 'destroy'])->name('home.destroy')->middleware('can:destroy-home');
    Route::post('/store-home', [HomeController::class, 'store'])->name('home.store');

    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index')->middleware('can:jobs');
    Route::get('/create-job', [JobController::class, 'create'])->name('title.create')->middleware('can:add-title');
    Route::post('/store-job', [JobController::class, 'store_title'])->name('title.store')->middleware('can:add-title');
    Route::get('/destroy-title/{id}', [JobController::class, 'destroy_title'])->name('title.destroy')->middleware('can:destroy-title');
    Route::get('/destroy-job/{id}', [JobController::class, 'destroy'])->name('job.destroy')->middleware('can:destroy-job');

    Route::get('/jobs/filter', [JobController::class, 'filter'])->name('jobs.filter')->middleware('can:jobs');
    Route::get('/jobs/reply/{id}', [JobController::class, 'reply'])->name('jobs.reply')->middleware('can:view-jobs');
    Route::get('/jobs/download/{id}', [JobController::class, 'download'])->name('jobs.download')->middleware('can:view-jobs');

    Route::post('/send/{id}', [JobController::class, 'send'])->name('jobs.send');

    Route::get('/inquiry', [InquiryController::class, 'index'])->name('inquiry.index')->middleware('can:inquiry');
    Route::get('/inquiry/filter', [InquiryController::class, 'filter'])->name('inquiry.filter')->middleware('can:inquiry');
    Route::get('/inquiry/reply/{id}', [InquiryController::class, 'reply'])->name('inquiry.reply')->middleware('can:view-inquiry');
    Route::post('/send/inquiry/{id}', [InquiryController::class, 'send'])->name('inquiry.send');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index')->middleware('can:contact');
    Route::get('/contact/filter', [ContactController::class, 'filter'])->name('contact.filter')->middleware('can:contact');
    Route::get('/contact/reply/{id}', [ContactController::class, 'reply'])->name('contact.reply')->middleware('can:view-contact');
    Route::post('/send/contact/{id}', [ContactController::class, 'send'])->name('contact.send');
})->middleware('loggedIn');

Route::get('/terms', [TermsController::class, 'page'])->name('terms');
Route::get('/faqs', [FaqsController::class, 'get'])->name('faqs');
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/service', [PageController::class, 'services'])->name('services');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/location/{id?}', [PageController::class, 'location'])->name('location');
Route::get('/about', [PageController::class, 'about'])->name('abouts');
Route::post('/inquiry/store', [InquiryController::class, 'store'])->name('inquiry.store');
Route::get('/inquiry', [PageController::class, 'inquiry'])->name('inquiry');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/job/store', [JobController::class, 'store'])->name('job.store');
Route::get('/job', [PageController::class, 'job'])->name('job');
Route::get('/career', [PageController::class, 'career'])->name('career');
