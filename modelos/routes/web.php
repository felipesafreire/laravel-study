<?php

use App\Models\Categoria;

Route::get('/', function () {
    $categorias = Categoria::all();
    foreach ($categorias as $categoria) {
        echo 'Id: ', $categoria->id, ' Nome: ', $categoria->nome, '<br>';
    }
});

Route::get('/inserir/{nome}', function ($nome) {
    $cat = new Categoria();
    $cat->nome = $nome;
    $cat->save();
    return redirect('/');
});

Route::get('/categoria/{id}', function ($id) {
    $categoria = Categoria::findOrFail($id);
    if ($categoria) {
        echo 'Id: ', $categoria->id, '<br> Nome: ', $categoria->nome;
    } else {
        echo 'Categoria não encontrada.';
    }
});

Route::get('/categoria/atualizar/{id}/{nome}', function ($id, $nome) {
    $categoria = Categoria::find($id);
    if ($categoria) {
        $categoria->nome = $nome;
        $categoria->save();
        return redirect('/');
    } else {
        echo 'Categoria não encontrada.';
    }
});

Route::get('/categoria/remover/{id}', function ($id) {
    $categoria = Categoria::find($id);
    if ($categoria) {
        $categoria->delete();
        return redirect('/');
    } else {
        echo 'Categoria não encontrada.';
    }
});

Route::get('/categoriapornome/{nome}', function ($nome) {
    $categorias = Categoria::where('nome', $nome)->get();
    foreach ($categorias as $categoria) {
        echo 'Id: ', $categoria->id, ' Nome: ', $categoria->nome, '<br>';
    }
});

Route::get('/categoria/maiorque/{id}', function ($id) {
    $categorias = Categoria::where('id', '>', $id)->get();
    foreach ($categorias as $categoria) {
        echo 'Id: ', $categoria->id, ' Nome: ', $categoria->nome, '<br>';
    }
    $count = Categoria::where('id', '>', $id)->count();
    echo '<h3>Count: ', $count, '</h3>';
    $count = Categoria::where('id', '>', $id)->max('id');
    echo '<h3>Max: ', $count, '</h3>';
});

Route::get('/ids123', function () {
    $categorias = Categoria::find([1 ,2 ,3]);
    foreach ($categorias as $categoria) {
        echo 'Id: ', $categoria->id, ' Nome: ', $categoria->nome, '<br>';
    }
});

Route::get('/categorias/todas', function () {
    $categorias = Categoria::withTrashed()->get();
    foreach ($categorias as $categoria) {
        echo 'Id: ', $categoria->id, ' Nome: ', $categoria->nome, ($categoria->trashed() ? ' (Apagado)': ''),'<br>';
    }
});

Route::get('/ver/{id}', function ($id) {
    // $categoria = Categoria::withTrashed()->find($id);
    $categoria = Categoria::withTrashed()->where('id', $id)->get()->first();
    if ($categoria) {
        echo 'Id: ', $categoria->id, '<br> Nome: ', $categoria->nome;
    } else {
        echo 'Categoria não encontrada.';
    }
});

Route::get('/categorias/apagadas', function () {
    $categorias = Categoria::onlyTrashed()->get();
    foreach ($categorias as $categoria) {
        echo 'Id: ', $categoria->id, ' Nome: ', $categoria->nome, ($categoria->trashed() ? ' (Apagado)': ''),'<br>';
    }
});

Route::get('/restaurar/{id}', function ($id) {
    $categoria = Categoria::withTrashed()->find($id);
    if ($categoria) {
        $categoria->restore();
        echo 'Categoria Restaurada Id: ', $categoria->id, '<br>';
        echo '<a href="/">Listar Todas</a>';
    } else {
        echo 'Categoria não encontrada.';
    }
});


Route::get('/apagarpermanente/{id}', function ($id) {
    $categoria = Categoria::withTrashed()->find($id);
    if ($categoria) {
        $categoria->forceDelete();
        return redirect('/categorias/todas');
    } else {
        echo 'Categoria não encontrada.';
    }
});