<?php

use App\Http\Controllers\ChaptersController;
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
Route::get('/test', function () {
    return view('app_pages.story.story_main');
});

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('truyen', ComicsController::class)->names('comic');
        // Route::resource('chapter', ChaptersController::class)->names('chapter');
        Route::prefix('truyen/{id}/chapter')
            ->name('chapter.')
            ->group(function () {
                Route::get('create', [ChaptersController::class, 'create'])->name('create');
                Route::get('edit/{idChapter}', [ChaptersController::class, 'edit'])->name('edit');
                Route::delete('destroy/{idChapter}', [ChaptersController::class, 'destroy'])->name('destroy');
                Route::post('store', [ChaptersController::class, 'store'])->name('store');
            });
        Route::get('truyen/{id}/chapter/create', [ChaptersController::class, 'create'])->name('chapter.create');
        Route::resource('theloai', GenresController::class)->names('genre');
        Route::get('theloai/search', [GenresController::class, 'search'])->name('genre.search');
        Route::resource('nguoidung', UserController::class)->names('user');
    });
