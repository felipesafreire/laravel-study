<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nome', "MeuController@getNome");
