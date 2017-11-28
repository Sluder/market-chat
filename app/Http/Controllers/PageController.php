<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * View initial welcome page
     */
    public function showIndex()
    {
        if (Auth::check()) {
            return view('pages.home');
        }
        return view('pages.index');
    }

    /**
     * View for user home
     */
    public function showHome()
    {
        return view('pages.home');
    }

    /**
     * View for user registration & login
     */
    public function showLogin()
    {
        return view('pages.login');
    }

    /**
     * View for user profile
     *
     * @param $username
     * @return user with username profile
     */
    public function profile($username)
    {
        $user = User::whereUsername($username)->first();

        return view('pages.profile', compact('user'));
    }

}
