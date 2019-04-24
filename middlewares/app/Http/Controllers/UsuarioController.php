<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
        Log::debug('UsuarioController@index');
        return "<h3>Lista de Usuarios</h3>" .
            "<ul>" .
            "<li>Felipe</li>" .
            "<li>Tio João</li>" .
            "</ul>";
    }
}
