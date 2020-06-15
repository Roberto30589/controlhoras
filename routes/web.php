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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/clientes/page', 'ClientesController@page')->name('clientes.page');
    Route::get('/clientes/list', 'ClientesController@list')->name('clientes.list');

    Route::post('/clientes/insert', 'ClientesController@insert')->name('clientes.insert');
    Route::post('/clientes/select', 'ClientesController@select')->name('clientes.select');
    Route::post('/clientes/update', 'ClientesController@update')->name('clientes.update');
});
