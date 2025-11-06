<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class HomeController extends Controller
{
    public function index()
    {
        $comics = Comic::all();
        return view('app_pages.home.index'); // Trả về view resources/views/home.blade.php
    }

   public function login(){
        return view('app_pages.user.login');
   }

   public function register(){
        return view('app_pages.user.register');
   }
}
