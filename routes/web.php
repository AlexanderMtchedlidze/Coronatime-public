<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\LangMiddleware;
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

Route::post('/lang/{lang}', LangController::class)->name('set_lang');

Route::middleware(LangMiddleware::class)->group(function () {
	Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
	Route::view('/email/verify', 'auth.email.verify-email')->name('verification.notice');
	Route::view('/email/feedback', 'auth.email.feedback-email')->name('verification.feedback');

	Route::get('/dashboard/worldwide', [DashboardController::class, 'worldwide'])->name('dashboard.worldwide');
	Route::get('/dashboard/by-country', [DashboardController::class, 'byCountry'])->middleware('verified')->name('dashboard.by_country');

	// register
	Route::view('register', 'register.create')->middleware('guest')->name('register.create');
	Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

	Route::view('login', 'session.create')->middleware('guest')->name('login');
	Route::post('login', [SessionController::class, 'store'])->middleware('guest')->name('login.post');
	Route::view('reset-password', 'passwords.reset')->name('reset_password');
	Route::view('set-password', 'passwords.set')->name('set_password');
});
