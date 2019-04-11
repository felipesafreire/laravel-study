<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/produtos', 'ProdutoController@index');
Route::get('/categorias', 'CategoriaController@index');
Route::get('/categorias/novo', 'CategoriaController@create');
Route::post('/categoria', 'CategoriaController@store');
Route::get('/categoria/apagar/{id}', 'CategoriaController@destroy');
Route::get('/categoria/editar/{id}', 'CategoriaController@edit');
Route::post('/categoria/{id}', 'CategoriaController@update');

