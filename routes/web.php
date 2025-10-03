<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerformanceComercialController;

Route::get('/', [PerformanceComercialController::class, 'index'])->name('performance.index');
