<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // Initial page
    public function showIndex()
    {
        if (Auth::check()) {
            return view('pages.home');
        }
        return view('pages.index');
    }

    // User home
    public function showHome()
    {
        return view('pages.home');
    }

    // User registration & login
    public function showLogin()
    {
        return view('pages.login');
    }

    // Show profile of user
    public function profile($username)
    {
        $user = User::whereUsername($username)->first();

        return view('pages.profile', compact('user'));
    }

}
