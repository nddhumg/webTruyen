<?php

namespace App\Http\Controllers;

use App\Models\Commics;
use App\Models\Genres;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        view()->share('currentPage', 'dashboard');
    }

    public function index()
    {
        $countUser = User::count();
        $countComic = Commics::count();
        $countGenre = Genres::count();

        return view('admin::dashboard', [
            'countUser' => $countUser,
            'countComic' => $countComic,
            'countGenre' => $countGenre,
        ]);
    }
}
