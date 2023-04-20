<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\PasswordController;
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

	Route::get('/dashboard/worldwide', [DashboardController::class, 'worldwide'])->middleware('auth')->name('dashboard.worldwide');
	Route::get('/dashboard/by-country', [DashboardController::class, 'byCountry'])->middleware(['verified', 'auth'])->name('dashboard.by_country');

	Route::view('/register', 'register.create')->middleware('guest')->name('register.create');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

	Route::middleware('guest')->group(function () {
		Route::view('/forgot-password', 'passwords.forgot')->name('password.request');
		Route::view('/password/feedback', 'auth.password.feedback-email')->name('password.feedback');
		Route::controller(PasswordController::class)->group(function () {
			Route::post('/forgot-password', 'sendResetLink')->name('password.email');
			Route::get('/reset-password/{token}', 'resetPassword')->name('password.reset');
			Route::post('/reset-password', 'updatePassword')->name('password.update');
		});

		Route::view('/login', 'session.create')->name('login');
		Route::post('/login', [SessionController::class, 'login'])->name('login.post');
	});
	Route::post('/logout', [SessionController::class, 'logout'])->middleware('auth')->name('logout');
});
