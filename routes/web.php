<?php

Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/total-exames-acumulado/{perfilAcesso}/{idExecutivo}', 'TotalExamesAcumuladoController@index')->name('total-exames-acumulado');
    Route::get('/logout', 'Auth\LoginController@logout');
});
