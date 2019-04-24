<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\ProdutoAdmin;

class ProdutoController extends Controller
{
    private $produtos = ['Televisão', 'Comptudaor', 'Notebook'];

    public function __construct()
    {
        $this->middleware(ProdutoAdmin::class);
    }

    public function index()
    {
        echo '<h1>Lista de Produtos</h1>';
        echo '<ul>';
        foreach ($this->produtos as $p) {
            echo '<li>' . $p . '</li>';
        }
        echo '</ul>';
    }
}
