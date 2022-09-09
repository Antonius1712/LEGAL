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

Route::get('/sf', 'CheckSheetBPKBController@sf')->name('sf');
Route::get('/logout', 'Auth\LoginController@logout');

Route::middleware(['auth', 'validasi-group'])
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('home');

        Route::post('/check-sheet-bpkb/approve/{id}', 'CheckSheetBPKBController@approve')->name('check-sheet-bpkb.approve');
        Route::post('/check-sheet-bpkb/save', 'CheckSheetBPKBController@save')->name('check-sheet-bpkb.save');
        Route::get('/check-sheet-bpkb/get-data', 'CheckSheetBPKBController@getData')->name('check-sheet-bpkb.get-data');
        Route::resource('/check-sheet-bpkb', 'CheckSheetBPKBController');
});

Route::get('/generate-pdf-sheet-bpkb-legal/{id}', 'PDF\GeneratePdfSheetBpkbLegalController@index');
