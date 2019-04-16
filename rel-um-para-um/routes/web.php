<?php

use App\Cliente;
use App\ClienteEndereco;

Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach ($clientes as $cliente):

        echo '<p>ID:', $cliente->id, '</p>';
        echo '<p>Nome:', $cliente->nome, '</p>';
        echo '<p>Telefone:', $cliente->telefone, '</p>';

        echo '<p>Rua:', $cliente->endereco->rua, '</p>';
        echo '<p>Numero:', $cliente->endereco->numero, '</p>';
        echo '<p>Bairro:', $cliente->endereco->bairro, '</p>';
        echo '<p>UF:', $cliente->endereco->uf, '</p>';

    endforeach;
});

Route::get('/enderecos', function () {
    $enderecos = ClienteEndereco::all();
    foreach ($enderecos as $endereco):

        echo '<p>Nome:', $endereco->cliente->nome, '</p>';
        echo '<p>Telefone:', $endereco->cliente->telefone, '</p>';

        echo '<p>ID do Cliente:', $endereco->cliente_id, '</p>';
        echo '<p>Rua:', $endereco->rua, '</p>';
        echo '<p>Numero:', $endereco->numero, '</p>';
        echo '<p>Bairro:', $endereco->bairro, '</p>';
        echo '<p>UF:', $endereco->uf, '</p>';

    endforeach;
});

Route::get('/inserir', function (){

    $c = new Cliente();
    $c->nome = "Jose Almeida";
    $c->telefone = "1197002486";
    $c->save();

    $e = new ClienteEndereco();
    $e->rua = "Av. do Estado";
    $e->numero = 400;
    $e->bairro = "Centro";
    $e->cidade = "São Paulo";
    $e->uf = "UF";

    $c->endereco()->save($e);

});

Route::get('/clientes/json', function (){

//    $clientes = Cliente::all();
    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();

});

Route::get('/enderecos/json', function (){

    $enderecos = ClienteEndereco::with(['cliente'])->get();
    return $enderecos->toJson();

});