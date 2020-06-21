<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('/proyectos/page', 'ProyectosController@page')->name('proyectos.page');
    Route::get('/proyectos/list', 'ProyectosController@list')->name('proyectos.list');

    Route::post('/proyectos/insert', 'ProyectosController@insert')->name('proyectos.insert');
    Route::post('/proyectos/select', 'ProyectosController@select')->name('proyectos.select');
    Route::post('/proyectos/update', 'ProyectosController@update')->name('proyectos.update');
});

