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

Route::group(['prefix'=> 'dashboard', 'as'=>'Dashboard.', 'middleware' => ['AuthApi']], function(){
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/my-profile', 'DashboardController@Myprofile')->name('Myprofile');
    Route::post('/my-profile', 'DashboardController@MyprofileStore')->name('MyprofileStore');
    Route::get('/my-profile/json', 'DashboardController@MyprofileJson')->name('MyprofileJson');
    Route::get('/suspend', 'DashboardController@Notice')->name('Notice');
});

