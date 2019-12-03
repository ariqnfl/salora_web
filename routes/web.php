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
Route::get('/about',function (){
    return view('aboutus');
});
Route::get('/pembayaran',function (){
    return view('sukses');
})->name('pembayaran');
Route::get('/order-details','OrderController@menampilkanSemuaOrder')->name('showOrder');
Route::get('/', 'LapanganController@nampilinGambar')->name('home');
Route::get('/favorites','FavoriteController@buatFavorite')->name('my-fav');
Route::resource('favorite','FavoriteController',['except' => ['create','edit','show','update']]);
Route::get('/panel', 'PanelController@index')->name('panel');
Route::get('/lapangan', 'LapanganController@filterData')->name('lapangan');
Auth::routes();
Route::resource("users","UserController");
Route::resource("lapangans","LapanganController");
Route::resource('order','OrderController');
Route::get('/ajax/lapangans/search', 'LapanganController@ajaxSearch')->name('ajax.search');
Route::get('/ajax/kategoris/search', 'LapanganController@ajaxSearchKategori')->name('ajax.search-kategori');
Route::get('/ajax/jenis/search', 'LapanganController@ajaxSearchJenis')->name('ajax.search-jenis');
Route::get('auth/{provider}','Auth\SocialiteController@redirectToProvider');
Route::get('auth/{provider}/callback','Auth\SocialiteController@handleProviderCallback');
Route::get('/news', 'NewsController@index');

Route::get('/{id}', 'LapanganController@showGambar')->name('gambar');
Route::get('/{id}/upload-bukti', 'OrderController@userEdit')->name('edit-user');
Route::put('/{id}/upload-bukti', 'OrderController@userUpdate')->name('update-user');

Route::GET('/laporan', 'LaporanController@index')->name('laporan');
Route::POST('/printlaporan', 'LaporanController@printlaporan');

