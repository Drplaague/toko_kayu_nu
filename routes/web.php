<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', 'HomeControl@index');
    Route::get('/profile', 'HomeControl@profile');
    Route::get('/edit_profile', 'HomeControl@edit');
    Route::get('/shop', 'HomeControl@shop');
    Route::get('/detail/{datas}', 'HomeControl@detail');
    Route::get('/cart', 'HomeControl@cart');
    Route::get('/histori', 'HomeControl@histori');
    Route::get('/bayar/{data}', 'HomeControl@bayar');
    Route::post('ubah', 'HomeControl@update_profile')->name('ubah');
     
    
   

Route::get('/login', 'Control_admin@login') -> name('login');
    Route::get('/daftar_login', 'Control_admin@register');
    Route::post('cek_login', 'Control_admin@val_login')->name('cek_login');
    Route::post('daftar', 'Control_admin@val_register')->name('daftar');
    Route::get('logout', 'Control_admin@logout')->name('logout');

Route::group(['middleware' => ['auth','role_id:1']], function () {

    Route::get('/dashboard', 'Control_admin@index');
    Route::get('/databarang', 'Control_admin@data_barang');
    Route::get('/riwayat', 'Control_admin@riwayat');
    
    Route::get('/databarang/detail/{data_brg}', 'Control_admin@detail');
    Route::get('/databarang/edit/{data_brg}', 'Control_admin@edit');
    Route::post('store', 'Control_admin@store')->name('store');
    Route::delete('/databarang/{data}', 'Control_admin@destroy');
    Route::patch('/edit/{data_brg}', 'Control_admin@update');  
});

Route::group(['middleware' => ['auth','role_id:2']], function () {
    Route::post('/pesan/{data}', 'HomeControl@pesan');
    Route::get('/cart/bayar', 'HomeControl@cekout');
    Route::delete('/cart/{datas}', 'HomeControl@delete');
});