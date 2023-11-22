<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GallerysController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/gallery', [GallerysController::class, 'index']); // Endpoint API untuk menampilkan galeri gambar
Route::get('/api/gallery', [GallerysController::class, 'index']);
Route::post('api/upload', [GallerysController::class, 'uploadImage']);
