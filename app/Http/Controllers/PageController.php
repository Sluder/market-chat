<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // Initial page
    public function index()
    {
        if (Auth::check()) {
            return view('pages.home');
        }
        return view('pages.index');
    }

    // User home
    public function home()
    {
        return view('pages.home');
    }

}
