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

    // Profile
    Route::prefix('profile')->group(function() {
        Route::get('/{username}', 'PageController@profile')->name('show.profile');
        Route::post('/update', 'AccountController@updateProfile')->name('user.update');
        Route::post('/update/password', 'AccountController@updatePassword')->name('user.update.password');

        Route::post('/follow/{follow_id}', 'FollowController@follow')->name('user.follow');
        Route::post('/unfollow/{follow_id}', 'FollowController@unfollow')->name('user.unfollow');
    });

    // Markets
    Route::get('/symbol/{ticker}', 'MarketController@showSymbol')->name('show.symbol');

    // Rooms
    Route::get('{room_uuid}', 'RoomController@showRoom')->name('show.room');
});