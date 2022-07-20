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

Auth::routes();

// Route::get('/sf', 'LoginController@sf')->name('sf');
Route::get('/logout', 'Auth\LoginController@logout');

Route::middleware('auth')
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/check-sheet-bpkb', 'CheckSheetBPKBController');
});
