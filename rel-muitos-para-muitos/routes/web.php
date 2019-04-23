<?php

use App\Desenvolvedor;
use App\Alocacao;
use App\Projeto;

Route::get('/desenvolvedor_projeto', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();
    return $desenvolvedores->toJson();
});

Route::get('/projeto_desenvoldedor', function () {
    $projetos = Projeto::with('desenvolvedores')->get();
    return $projetos->toJson();
});

Route::get('/alocar', function () {
    $projeto = Projeto::find(4);
    if ($projeto) {
        // $projeto->desenvolvedores()->attach(1,['horas_semanais' => 200]);
        $projeto->desenvolvedores()->attach([
            2 => ['horas_semanais' => 50],
            3 => ['horas_semanais' => 70],
        ]);
    }
    return $projeto->toJson();
});

Route::get('/desalocar', function () {
    $projeto = Projeto::find(4);
    if ($projeto) {
        // $projeto->desenvolvedores()->attach(1,['horas_semanais' => 200]);
        $projeto->desenvolvedores()->detach([1,2,3]);
    }
    return $projeto->toJson();
});
