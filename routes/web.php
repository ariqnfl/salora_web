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

Route::get('/panel', function () {
    return view('layouts.global');
})->name('panel');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource("users","UserController");
Route::resource("lapangans","LapanganController");
Route::get('/ajax/lapangans/search', 'LapanganController@ajaxSearch')->name('ajax.search');
Route::get('/ajax/kategoris/search', 'LapanganController@ajaxSearchKategori')->name('ajax.search-kategori');
Route::get('/ajax/jenis/search', 'LapanganController@ajaxSearchJenis')->name('ajax.search-jenis');


