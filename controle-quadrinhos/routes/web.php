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
Route::delete('/hq/{id}', 'HqController@destroy');
Route::post('/hq/{id}/editaNome', 'HqController@editaNome');

Route::get('/hq/{quadrinhoId}/sagas', 'SagasController@index');

Route::get('/sagas/{saga}/edicoes', 'EdicoesController@index');
Route::post('/sagas/{saga}/edicoes/lido', 'EdicoesController@lido');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');
