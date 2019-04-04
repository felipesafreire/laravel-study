<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nome', "MeuController@getNome");

Route::get('/idade', "MeuController@getIdade");

Route::get('/multiplicar/{n1}/{n2}', "MeuController@multiplicar");

Route::get('/nome/{id}', "MeuController@getNomeById");

Route::resource('/cliente', "ClienteController");