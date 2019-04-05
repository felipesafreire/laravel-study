<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function listar()
    {
        $produtos = [
            "Notebook Asus i7 16GB",
            "Mouse e Teclado Microsoft USB",
            "Monitor 21 - Samsumg",
            "Impressora HP",
            "Disco SSD 512 GB"
        ];
        return view("produtos", compact('produtos'));
    }

    public function secaoprodutos($palavra)
    {
        return view('secao_produtos', compact('palavra'));
    }

    public function mostraropcoes()
    {
        return view('mostrar_opcoes');
    }

    public function opcoes($opcao)
    {
        return view('opcao', compact('opcao'));
    }

    public function loopFor($n)
    {
        return view('loop_for', compact('n'));
    }

    public function loopForEach()
    {
        $produtos = [
            ["id" => 1, "nome" => "Notebook Asus i7 16GB"],
            ["id" => 2, "nome" => "Mouse e Teclado Microsoft USB"],
            ["id" => 3, "nome" => "Monitor 21 - Samsumg"],
            ["id" => 4, "nome" => "Impressora HP"],
            ["id" => 5, "nome" => "Disco SSD 512 GB"]
        ];
        return view('foreach', compact('produtos'));
    }
}
