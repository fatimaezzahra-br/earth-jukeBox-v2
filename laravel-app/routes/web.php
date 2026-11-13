<?php

use App\Http\Controllers\EarthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EarthController::class, 'index'])->name('home');
Route::get('/api/observations', [EarthController::class, 'observations'])->name('observations.index');
Route::get('/api/observations/export', [EarthController::class, 'export'])->name('observations.export');
