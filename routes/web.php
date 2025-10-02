<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerformanceComercialController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/performance-comercial', [PerformanceComercialController::class, 'index'])->name('performance.index');
