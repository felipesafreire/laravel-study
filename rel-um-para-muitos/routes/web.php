<?php

use App\Produto;
use App\Categoria;

Route::get('/categorias', function () {
    $categorias = Categoria::all();
    foreach ($categorias as $categoria) {
        echo '<h4>', $categoria->nome, '</h4>';
        foreach($categoria->produtos as $produto){
            echo '<p>Nome do Produto:', $produto->nome;
            echo '</p>';
        }
        echo '<hr>';
    }
});

Route::get('/produtos', function () {
    $produtos = Produto::all();
    foreach ($produtos as $produto) {
        echo '<p>ID:', $produto->id, '<br/>';
        echo 'Nome:', $produto->nome, '<br/>';
        echo 'Estoque:', $produto->estoque, '<br/>';
        echo 'Preco:', $produto->preco, '<br/>';
        echo 'Categoria:', $produto->categoria->nome, '<br/><hr>';
    }
});

Route::get('/categoriasproduto/json', function () {
    $categorias = Categoria::with('produtos')->get();
    print_r($categorias->toJson());
});

Route::get('/adicionarproduto', function () {
    $categoria = Categoria::find(2);
    $p = new Produto();
    $p->nome = "Meu novo Produto 2";
    $p->preco = 1000;
    $p->estoque = 1;
    $p->categoria()->associate($categoria);
    $p->save();
    return $p->toJson();
});

Route::get('/removerprodutocategoria', function () {
    $p = Produto::find(2);
    if($p){
        $p->categoria()->dissociate();
        $p->save();
        return $p->toJson();
    }   
    return '';
});

Route::get('/adicionarproduto/{categoria}', function ($categoria) {
    $categoria = Categoria::find($categoria);
    $produto = new Produto();
    $produto->nome = "Meu novo Produto 3";
    $produto->preco = 1000;
    $produto->estoque = 1;
    if($categoria){
        $categoria->produtos()->save($produto);
    }
    return $categoria->toJson();
});
