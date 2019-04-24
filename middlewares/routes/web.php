<?php

Route::get('/usuario', 'UsuarioController@index')->middleware('primeiro', 'segundo');

Route::get('/', function () {
    return 'teste';
});

Route::get('/terceiro', function () {
    return 'teste';
})->middleware('terceiro:João,20');
