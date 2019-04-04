<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return "<h1>Laravel</h1>";
});

Route::get('/ola', function () {
    return "<h1>Seja bem vindo</h1>";
});

Route::get('/ola/bemvindo', function () {
    return view('welcome');
});

Route::get('/nome/{nome}/{n}', function ($nome, $n) {
    return "<h1>Ola, $nome</h1>";
});

Route::get('/seunome/{nome}/{n}', function ($nome, $n) {
    for($i = 0; $i < $n; $i++){
        echo "<h1>Ola, $nome! ($i)</h1>";
    }
})->where('n','[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/nomesemregra/{nome?}', function ($nome = null) {
    if(isset($nome)){
        echo "Nome setado: $nome";
    }else{
        echo "Nome não setado";
    }
});

Route::prefix('app')->group(function(){
    
    Route::get('/',function(){
        return 'Pagina principal do app';
    });
    Route::get('about',function(){
        return 'About';
    });
    Route::get('profile',function(){
        return 'Pagina do Profile';
    });
    
});

Route::redirect('/aqui', '/ola', 301);

Route::view('/view', 'hellonome', ['nome' => 'nome', 'sobrenome'=>'sobrenome']);

Route::get('/hellonome/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    return view('hellonome', compact('nome','sobrenome'));
});

Route::get('/rest/hello', function () {
    return "Hello (GET)";
});

Route::post('/rest/hello', function () {
    return "Hello (POST)";
});

Route::delete('/rest/hello', function () {
    return "Hello (DELETE)";
});

Route::put('/rest/hello', function () {
    return "Hello (PUT)";
});

Route::put('/rest/imprimir', function (Request $req) {
    $nome = $req->input('nome');
    return "Hello $nome!! (POST)";
});

Route::match(['get','post'],'/rest/hello2', function(){
     return "Hello World 2";
});

Route::any('/rest/hello3', function(){
     return "Hello World 2";
});

Route::get('/produtos', function(){
     return "Hello World 2";
});