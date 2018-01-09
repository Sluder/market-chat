<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PageController extends Controller
{
    /**
     * View initial welcome page
     */
    public function showIndex()
    {
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
     */
    public function profile($username)
    {
        try {
            $user = User::whereUsername($username)->firstOrFail();

            return view('pages.profile', compact('user'));

        } catch (ModelNotFoundException $e) {
            return view('pages.errors.not-found')->with(['message' => 'User with username ' . $username . ' was not found']);
        }
    }

}
