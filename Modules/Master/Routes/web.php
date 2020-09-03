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

Route::group(['prefix'=>'/master','as'=>'Master.'], function(){
    Route::get('/', 'MasterController@index')->name('index');
    Route::get('load', 'MasterController@load')->name('load');
    Route::get('mataPelajaran', 'MasterController@mataPelajaran')->name('mataPelajaran');    
    Route::get('loadMataPelajaran', 'MasterController@loadMataPelajaran')->name('loadMataPelajaran');    
    Route::get('Upload', 'MasterController@Upload')->name('Upload');
    Route::get('loadSoal', 'MasterController@loadSoal')->name('loadSoal'); 
});
