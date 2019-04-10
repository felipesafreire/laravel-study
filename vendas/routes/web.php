<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {
    // $categorias = DB::table('categorias')->get();
    // foreach ($categorias as $categoria) {
    //     echo 'Id: ', $categoria->id, ', Nome: ', $categoria->nome, '<br>';
    // }

    // echo '<hr>';

    // $nomes = DB::table('categorias')->pluck('nome');
    // foreach ($nomes as $nome) {
    //     echo 'Nome: ', $nome, '<br>';
    // }

    // echo '<hr>';

    // $categorias = DB::table('categorias')->where('id', '=', 1)->get();
    // foreach ($categorias as $categoria) {
    //     echo 'Id: ', $categoria->id, ', Nome: ', $categoria->nome, '<br>';
    // }

    // $categoria = DB::table('categorias')->where('id', '=', 1)->first();
    // echo 'Id: ', $categoria->id, ', Nome: ', $categoria->nome, '<br>';

    // echo '<hr>';

    // $categorias = DB::table('categorias')->where('nome', 'like', '%p%')->get();
    // foreach ($categorias as $categoria) {
    //     echo 'Id: ', $categoria->id, ', Nome: ', $categoria->nome, '<br>';
    // }

    // echo '<hr>';

    // $categorias = DB::table('categorias')
    //     // ->where('id', 1)
    //     // ->orWhere('id', 2)
    //     // ->whereIn('id', [1,2,3])
    //     // ->whereNotIn('id', [1,2,3])
    //     // ->whereBetween('id', [1, 20])
    //     // ->whereNotBetween('id', [1,80])
    //     ->get();
    // foreach ($categorias as $categoria) {
    //     echo 'Id: ', $categoria->id, ', Nome: ', $categoria->nome, '<br>';
    // }

    // echo '<hr>';

    $categorias = DB::table('categorias')
        // ->orderBy('nome')
        ->orderBy('id', 'asc')
        ->get();
    foreach ($categorias as $categoria) {
        echo 'Id: ', $categoria->id, ', Nome: ', $categoria->nome, '<br>';
    }
});

Route::get('/categorias/insert', function () {
    // $categorias = DB::table('categorias')->insert([
    //     ['nome' => 'Categoria 1'],
    //     ['nome' => 'Categoria 2'],
    // ]);

    $categoria = DB::table('categorias')->insertGetId(
        ['nome' => 'Categoria 1']
    );
    dd($categoria);
});

Route::get('/categorias/update', function () {
    $categoria = DB::table('categorias')->where('id', '=', 114)->first();
    var_dump($categoria);
    DB::table('categorias')
        ->where('id', 114)
        ->update(['nome' => 'categoria atualizada']);
    $categoria = DB::table('categorias')->where('id', '=', 114)->first();
    var_dump($categoria);
});

Route::get('/categorias/delete', function () {

    $categorias = DB::table('categorias')->get();
    foreach ($categorias as $categoria) {
        echo 'Id: ', $categoria->id, ', Nome: ', $categoria->nome, '<br>';
    }

    // DB::table('categorias')
    //     ->delete(100);

    DB::table('categorias')
        ->whereNotIn('id', [5,6,7])
        ->delete();

    echo '<hr>';

    $categorias = DB::table('categorias')->get();
    foreach ($categorias as $categoria) {
        echo 'Id: ', $categoria->id, ', Nome: ', $categoria->nome, '<br>';
    }
});
