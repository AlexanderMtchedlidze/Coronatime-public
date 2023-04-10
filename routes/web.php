<?php

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

Route::view('reset-password', 'passwords.create')->name('reset_password');
Route::view('register', 'register.create')->middleware('guest')->name('register');
Route::view('login', 'session.create')->middleware('guest')->name('login');
