<?php

Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/performance', 'PerformanceController@index')->name('performance');
    Route::get('/logout', 'Auth\LoginController@logout');
});

