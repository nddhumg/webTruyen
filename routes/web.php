<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 

// ==================== HOME ====================
Route::get('/', [HomeController::class, 'index'])->name('index');

