<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\GallerysController;

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

//  Route::resource('gallery', GalleryController::class);
//  Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
//  Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
//  Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
//  Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
//  Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
//  Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

// pert12
Route::get('/gallery', [GallerysController::class, 'index']);
Route::get('/upload', [GallerysController::class, 'showUploadForm']);
Route::post('/upload', [GallerysController::class, 'uploadImage']);});
