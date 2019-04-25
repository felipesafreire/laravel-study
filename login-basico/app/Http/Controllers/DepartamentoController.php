<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class DepartamentoController extends Controller
{
    public function index()
    {

        echo '<h1>Lista de Categorias</h1>';
        echo '<ul>
                <li>Eletronicos</li>
                <li>Informatica</li>
                <li>Celulares</li>
             </ul><hr>';

        if (Auth::check()) {
            $user = Auth::user();
            echo '<h4>Você esta logado.</h4>';
            echo '<p>' . $user->name . '</p>';
            echo '<p>' . $user->email . '</p>';
            echo '<p>' . $user->id . '</p>';
        } else {
            echo '<h4>Você não esta logado.</h4>';
        }
    }
}
