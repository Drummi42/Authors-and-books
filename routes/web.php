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

Route::get('/', 'Library\Front\LibraryController@index')->name('library.all');

Route::prefix('admin')->group(function(){
    Route::prefix('library')->group(function(){
        Route::view('/','library.admin.index')->name('admin.library');
    });
});

