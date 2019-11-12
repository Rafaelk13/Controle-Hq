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

Route::get('/hq', 'HqController@index')->name('listar_quadrinhos');
Route::get('/hq/criar', 'HqController@create')->name('form_criar_quadrinho');
Route::post('/hq/criar', 'HqController@store');
Route::delete('/hq/{id}', 'SeriesController@destroy');
