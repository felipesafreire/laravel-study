<?php
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/negadologin', function () {
    return 'Você precisa ser admin para logar.';
});

Route::get('/negado', function () {
    return 'Acesso Negado';
});

Route::get('/produtos', 'ProdutoController@index');


Route::post('/login', function (Request $request) {

    $loginOk = false;
    $admin = false;
    switch ($request->input('user')) {
        case 'joao':
            $loginOk = $request->input('passwd') === "senhajoao";
            $admin = true;
            break;
        case 'pedro':
            $loginOk = $request->input('passwd') === "senhapedro";
            break;
        case 'default':
            $loginOk = false;
            break;
    }
    if ($loginOk) {
        $request->session()->put('login', ['user' => $request->input('user'), 'admin' => $admin]);
        return response('Login OK', 200);
    } else {
        $request->session()->flush();
        return response('Falha ao logar', 404);
    }
});

Route::get('/deslogar', function (Request $request) {
    $request->session()->flush();
    return 'Deslogado com sucesso';
});