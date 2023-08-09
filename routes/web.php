<?php

use App\Http\Controllers\dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Middleware\AlreadyLoggedIn;


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
Route::get('login', [AuthController::class, 'login'])->name('auth.login')->middleware('alreadyLoggedIn');
Route::get('registration', [AuthController::class, 'registration'])->name('auth.registration')->middleware('alreadyLoggedIn');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');

Route::post('login-user', [AuthController::class, 'login_user'])->name('auth.login-user');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('loggedIn');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('forgot', [ForgotPasswordController::class, 'index'])->name('auth.forgot');
Route::post('forgot-pasword', [ForgotPasswordController::class, 'forgot_password'])->name('auth.forgot-password');
Route::get('reset/{token}', [ForgotPasswordController::class, 'reset'])->name('auth.reset');
Route::post('reset-password', [ForgotPasswordController::class, 'reset_password'])->name('auth.reset-password');
