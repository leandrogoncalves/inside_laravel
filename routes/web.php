<?php

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/performance', 'PerformanceController@index')->name('performance');
    Route::post('/performance', 'PerformanceController@index')->name('performance');
    Route::get('/acesso', 'AcessoController@index')->name('acesso');
    Route::get('/acesso/{id}', 'AcessoController@redirectNewUser');
    Route::get('/logout', 'Auth\LoginController@logout');
});
Route::get('/total-exames-acumulado/{perfilAcesso}/{idExecutivo}', 'TotalExamesAcumuladoController@index')->name('total-exames-acumulado');
