<?php

Route::group([
    'prefix'     => config('hazah.route_prefix'),
    'middleware' => ['web'],
], function () {
    // routes for logging in and logging out
    Route::get('login', 'Tokenly\HazahClient\Http\Controllers\HazahAuthController@login')->name('login');
    Route::get('logout', 'Tokenly\HazahClient\Http\Controllers\HazahAuthController@logout')->name('hazah.logout');

    // oAuth handlers
    Route::get('authorize', 'Tokenly\HazahClient\Http\Controllers\HazahAuthController@redirectToProvider')->name('hazah.authorize');
    Route::get('authorize/callback', 'Tokenly\HazahClient\Http\Controllers\HazahAuthController@handleProviderCallback')->name('hazah.authorize-callback');


    // protected routes
    Route::group([
        'middleware' => ['auth'],
    ], function () {
        // The welcome page for the user that requires a logged in user
        Route::get('home', 'Tokenly\HazahClient\Http\Controllers\HazahAuthController@home')->name('hazah.home');

        // This is a route to sync the user with their Hazah information
        //   Redirect the user here to update their local user information with their Hazah information
        Route::get('sync', 'Tokenly\HazahClient\Http\Controllers\HazahAuthController@sync')->name('hazah.sync');
    });

});
