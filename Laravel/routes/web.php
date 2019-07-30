<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/callback', 'AuthController@callback')->name('callback');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/report', 'ReportController@index')->name('report');
        Route::post('/report', 'ReportController@display')->name('display');
        Route::post('/download', 'ReportController@download')->name('download');
        Route::get('/redirected', 'ReportController@redirected')->name('redirected');
        Route::get('/logout', 'AuthController@logout')->name('logout');
    });
});
