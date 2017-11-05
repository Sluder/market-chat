<?php

// Public routes
Route::get('/', 'PageController@showIndex')->name('show.index');
Route::get('/login', 'PageController@showLogin')->name('show.login');
Route::post('/login', 'Auth\AuthController@login')->name('user.login');

Route::post('/register', 'AccountController@register')->name('user.register');

// Authenticated routes
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/home', 'PageController@showHome')->name('show.home');

    Route::get('/logout', 'Auth\AuthController@logout')->name('user.logout');
});