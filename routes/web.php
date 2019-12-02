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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/', 'LapanganController@nampilinGambar');
Route::get('/panel', 'PanelController@index')->name('panel');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource("users","UserController");
Route::resource("lapangans","LapanganController");
Route::get('/ajax/lapangans/search', 'LapanganController@ajaxSearch')->name('ajax.search');
Route::get('/ajax/kategoris/search', 'LapanganController@ajaxSearchKategori')->name('ajax.search-kategori');
Route::get('/ajax/jenis/search', 'LapanganController@ajaxSearchJenis')->name('ajax.search-jenis');
Route::get('auth/{provider}','Auth\SocialiteController@redirectToProvider');
Route::get('auth/{provider}/callback','Auth\SocialiteController@handleProviderCallback');

Route::get('/{id}', 'LapanganController@showGambar')->name('gambar');


