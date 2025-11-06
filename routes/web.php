<?php

use App\Http\Controllers\ComicsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isLogin;
use Illuminate\Support\Facades\Route;

// ==================== HOME ====================
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/login', [HomeController::class, 'login'])->middleware('guest')->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');

Route::middleware([isLogin::class])
    ->prefix('users')
    ->name('users.')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/info', 'showInfo')->name('info');
        Route::post('/update', 'update')->name('update');
        Route::get('/logout', 'logout')->name('logout');
    });
Route::controller(UserController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

// Route::get('/truyen/{slug}', [ComicController::class, 'show'])->name('comic.show');

Route::get('/test', function () {
    return view('app_pages.story.story_main');
});

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('truyen', ComicsController::class)->names('comic');

        Route::resource('theloai', GenresController::class)->names('genre');
        Route::prefix('theloai')
            ->name('genre.')
            ->controller(GenresController::class)
            ->group(function () {
                Route::get('/search', 'search')->name('search');
            });
    Route::resource('nguoidung', UserController::class)->names('user');
    });
