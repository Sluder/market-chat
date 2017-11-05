<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    // New user registration
    public function register(RegistrationRequest $request)
    {
        Input::merge(array_map('trim', Input::all()));

        // Check is email & username are not in use
        if ($this->userExists($request->get('email'))->getData()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'This email is already in use']);

        } else if ($this->userExists($request->get('username'))->getData()) {
            return redirect()->back()->withInput()->withErrors(['username' => 'This username is already in use']);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'username_last_changed' => date("Y-m-d H:i:s"),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        Mail::to($user->email)->send(new RegisterEmail);

        Auth::login($user);

        return redirect()->route('show.home');
    }

    // Checks if user already exists with email or username
    public function userExists($data)
    {
        return response()->json(User::where('username', 'LIKE', '%' . $data . '%')->orWhere('email', $data)->exists());
    }

}
