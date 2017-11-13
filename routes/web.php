<?php

// Public routes
Route::get('/', 'PageController@showIndex')->name('show.index');
Route::get('/login', 'PageController@showLogin')->name('show.login');
Route::post('/login', 'Auth\AuthController@login')->name('user.login');

Route::post('/register', 'AccountController@register')->name('user.register');

// Authenticated routes
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/home', 'PageController@showHome')->name('show.home');
    Route::get('/profile/{username}', 'PageController@profile')->name('show.profile');
    Route::post('/profile/{user}/update', 'AccountController@updateProfile')->name('user.update');
    Route::post('/profile/{user}/update/password', 'AccountController@updatePassword')->name('user.update.password');

    Route::get('/logout', 'Auth\AuthController@logout')->name('user.logout');
});