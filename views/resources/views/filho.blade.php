@extends('layout.app')

@section('titulo',"Minha página filha")

@section('barralateral')
    @parent
    <p>Este é a barra lateral do filho</p>
@endsection

@section('conteudo')
    <h1>Este é o conteudo do filho</h1>
@endsection