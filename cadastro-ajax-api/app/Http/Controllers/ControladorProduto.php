<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produto;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produto::all()->toJson();
    }

    public function indexView()
    {
        return view('produtos');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->input('nome');
        $produto->preco = $request->input('preco');
        $produto->estoque = $request->input('estoque');
        $produto->categoria_id = $request->input('categoria_id');
        $produto->save();
        return $produto->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        if($produto){
            return response($produto->toJson(), 200);
        }
        return response("Produto não encontrado", 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        if($produto){
            $produto->nome = $request->input('nome');
            $produto->preco = $request->input('preco');
            $produto->estoque = $request->input('estoque');
            $produto->categoria_id = $request->input('categoria_id');
            $produto->save();
            return $produto->toJson();
        }
        return response("Produto não encontrado.", 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        if($produto){
            $produto->delete();
            return response("OK", 200);
        }
        return response("Erro! Produto não encontrado", 400);
    }
}
