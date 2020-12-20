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

Route::get('/', function () {
    return redirect('login');
});
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth', 'as' => 'dashboard.', 'prefix' => '/dashboard/'], function () {

    Route::group(['as' => 'admin.', 'prefix' => '/admin/'], function () {
        Route::get('flora', 'Admin\FloraController@index')->name('flora.index');
        Route::post('flora', 'Admin\FloraController@store')->name('flora.store');
        Route::get('flora/tambah', 'Admin\FloraController@create')->name('flora.create');
        Route::get('flora/edit/{id}', 'Admin\FloraController@edit')->name('flora.edit');
        Route::put('flora/{id}/edit', 'Admin\FloraController@update')->name('flora.update');
        Route::get('flora/{id}', 'Admin\FloraController@download')->name('flora.download');
        Route::delete('flora/{id?}', 'Admin\FloraController@destroy')->name('flora.destroy');

        Route::get('fauna', 'Admin\FaunaController@index')->name('fauna.index');
        Route::post('fauna', 'Admin\FaunaController@store')->name('fauna.store');
        Route::get('fauna/tambah', 'Admin\FaunaController@create')->name('fauna.create');
        Route::get('fauna/edit/{id}', 'Admin\FaunaController@edit')->name('fauna.edit');
        Route::put('fauna/{id}/edit', 'Admin\FaunaController@update')->name('fauna.update');
        Route::get('fauna/{id}', 'Admin\FaunaController@download')->name('fauna.download');
        Route::delete('fauna/{id?}', 'Admin\FaunaController@destroy')->name('fauna.destroy');
    });
});
