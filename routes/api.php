<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Kategoricontroller;
use App\Http\Controllers\Genrecontroller;
use App\Http\Controllers\Aktorcontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::middleware((['auth:sanctum']))->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::resource('kategori', Kategoricontroller::class);
    Route::resource('genre', Genrecontroller::class);
    Route::resource('aktor', Aktorcontroller::class);
// });

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);