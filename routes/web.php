<?php

use App\Http\Controllers\LangController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\LangMiddleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
	$request->fulfill();

	return redirect('/');
})->middleware(['signed'])->name('verification.verify');

Route::get('/email/verify', function () {
	return view('auth.verify-email');
})->name('verification.notice');

Route::middleware(LangMiddleware::class)->group(function () {
	Route::view('/', 'worldwide_statistics.worldwide')->name('statistics.index');

	// register
	Route::view('register', 'register.create')->middleware('guest')->name('register.create');
	Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

	Route::view('login', 'session.create')->middleware('guest')->name('login');
	Route::view('reset-password', 'passwords.create')->name('reset_password');
	Route::view('set-password', 'passwords.store')->name('set_password');
});
