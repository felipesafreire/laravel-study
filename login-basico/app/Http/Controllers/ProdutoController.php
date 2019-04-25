<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct()
    { 
        //$this->middleware('auth');
    }

    public function index()
    {

        echo '<h1>Lista de Produtos</h1>';
        echo '<ul>
                <li>Carne</li>
                <li>Teste</li>
                <li>Teste 2</li>
             </ul>';

     }
}
