<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'APILocalization'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::post('register', 'AuthController@register');
        Route::post('refresh', 'AuthController@refresh');
        Route::get('user/verify/{verification_code}', 'AuthController@verifyUser')->name('user.verify');
        Route::post('login', 'AuthController@login');
        Route::post('forgot-password', 'AuthController@forgetPassword');
        Route::post('reset-forgot-password', 'AuthController@resetForgottenPassword');
        Route::post('update-token', 'AuthController@updateToken');

    });

// authenticated routes
    Route::group(['middleware' => ['jwt.verify:api']], function () {
        Route::group(['namespace' => 'Auth'], function () {
            Route::post('logout', 'AuthController@logout');
            // user routes
            Route::get('profile', 'AuthController@profile');
            Route::post('update', 'AuthController@update');
            Route::post('change-password', 'AuthController@changePassword');
        });
    });

    // home route
    Route::get('home', 'HomeController');
    Route::post('add-to-cart', 'OrderController@add_to_cart');
    Route::post('remove-from-cart', 'OrderController@remove_from_cart');
    Route::post('create-order', 'OrderController@create_order');
    Route::get('get-cart-items/{userId}', 'OrderController@get_cart_items');
    Route::get('get-items', 'MakeApi@get_items');

    // services route
    Route::get('services', 'ServiceController');

    // Settings route
    Route::get('settings', 'SettingController@index');

    // Contact Request Route
    Route::post('contact', 'SettingController@contact');

});