<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(LoginRegisterController::class)->group(function() {
 Route::get('/register', 'register')->name('register');
 Route::post('/store', 'store')->name('store');
 Route::get('/login', 'login')->name('login');
 Route::post('/authenticate', 'authenticate')->name('authenticate');
 Route::get('/dashboard', 'dashboard')->name('dashboard');
 Route::post('/logout', 'logout')->name('logout');
});
