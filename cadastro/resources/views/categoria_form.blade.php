@extends('layouts.app', ['current' => "categorias"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form @if(isset($categoria)) action="/categoria/{{$categoria->id}}" @else action="/categoria" @endif method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria</label>
                    <input type="text" name="nomeCategoria" value="@if(isset($categoria)){{$categoria->nome}}@endif" placeholder="Categoria" class="form-control" id="nomeCategoria">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@endsection