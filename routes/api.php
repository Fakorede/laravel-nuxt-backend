<?php

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

// User endpoint
Route::get('/user', 'AuthController@user');

// Topics routes
Route::group(['prefix' => 'topics'], function() {
    Route::post('/', 'TopicController@store')->middleware('auth:api');
    Route::get('/', 'TopicController@index');
    Route::get('/{topic}', 'TopicController@show');
    Route::patch('/{topic}', 'TopicController@update')->middleware('auth:api');
    Route::delete('/{topic}', 'TopicController@destroy')->middleware('auth:api');

    // Post routes group
    Route::group(['prefix' => '/{topic}/posts'], function() {
        Route::post('/', 'PostController@store')->middleware('auth:api');
    });
});

