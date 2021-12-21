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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','LoginController@index')->name('login');

//Route::group(['middleware' => 'auth'],function(){
    Route::group(['prefix' => 'master'], function() {
        Route::group(['prefix' => 'jam-kerja'], function() {
            Route::get('/',"JamKerjaController@index");
            Route::post('data',"JamKerjaController@data");
            Route::post('save',"JamKerjaController@save");
            Route::post('row',"JamKerjaController@row");
        });
    });

//});