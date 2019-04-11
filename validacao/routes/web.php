<?php

Route::get('/clientes', 'ClienteController@index');
Route::get('/novocliente', 'ClienteController@create');
Route::post('/cliente', 'ClienteController@store');
