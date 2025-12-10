<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeedController;

Route::get('/seeds', [SeedController::class, 'index']);
Route::get('/seeds/{id}', [SeedController::class, 'show']);
Route::post('/seeds', [SeedController::class, 'store']);
Route::put('/seeds/{id}', [SeedController::class, 'update']);
Route::patch('/seeds/{id}', [SeedController::class, 'update']);
Route::delete('/seeds/{id}', [SeedController::class, 'destroy']);
