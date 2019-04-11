<?php

Route::get('/', function () {
    return view('index');
});

/* PRODUTOS */
Route::get('/produtos', 'ProdutoController@index');
Route::get('/produto/novo', 'ProdutoController@create');
Route::post('/produto', 'ProdutoController@store');
Route::get('/produto/apagar/{id}', 'ProdutoController@destroy');
Route::get('/produto/editar/{id}', 'ProdutoController@edit');
Route::post('/produto/{id}', 'ProdutoController@update');

/* CATEGORIAS */
Route::get('/categorias', 'CategoriaController@index');
Route::get('/categorias/novo', 'CategoriaController@create');
Route::post('/categoria', 'CategoriaController@store');
Route::get('/categoria/apagar/{id}', 'CategoriaController@destroy');
Route::get('/categoria/editar/{id}', 'CategoriaController@edit');
Route::post('/categoria/{id}', 'CategoriaController@update');

