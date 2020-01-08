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

route::get('/masakan', 'MasakanController@index')->name('masakan.index');
route::post('/masakan/store', 'MasakanController@store')->name('masakan.store');
route::get('/masakan/{id}/edit', 'MasakanController@edit')->name('masakan.edit');
route::post('/masakan/{id}/update', 'MasakanController@update')->name('masakan.update');
route::get('/masakan/{id}/delete', 'MasakanController@destroy')->name('masakan.delete');

route::get('/pengguna', 'AdminController@index')->name('admin.index');
route::post('/pengguna/store', 'AdminController@store')->name('admin.store');
route::get('/pengguna/{id}/edit', 'AdminController@edit')->name('admin.edit');
route::post('/pengguna/{id}/update', 'AdminController@update')->name('admin.update');
route::get('/pengguna/{id}/delete', 'AdminController@destroy')->name('admin.delete');

route::get('/level', 'LevelController@index')->name('level.index');
route::post('/level/store', 'LevelController@store')->name('level.store');
route::get('/level/{id}/edit', 'LevelController@edit')->name('level.edit');
route::post('/level/{id}/update', 'LevelController@update')->name('level.update');
route::get('/level/{id}/delete', 'LevelController@destroy')->name('level.delete');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    route::get('/', 'admin_login@login')->name('admin.home')->middleware('verified');   ;
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
});
Route::get('/logout', 'AuthAdmin\LoginController@logout');

route::get('/shop', 'UserController@index')->name('shop.index');
route::get('/keranjang/{id}', 'UserController@masakan_store')->name('shop.shop');
route::get('/order', 'UserController@checkout')->name('shop.c');

