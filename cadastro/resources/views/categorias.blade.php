@extends('layouts.app', ["current" => 'categorias'])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">
                Cadastro de Categorias
                <a href="/categorias/novo" class="btn btn-primary btn-sm float-right">Nova Cateroria</a>
            </h5>
            
            @if (count($categorias) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome da Categoria</th>
                            <th>Ações</th>
                        </tr>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{$categoria->id}}</td>
                                    <td>{{$categoria->nome}}</td>
                                    <td>
                                        <a href="/categoria/editar/{{$categoria->id}}" class="btn btn-sm btn-primary">
                                            Editar
                                        </a>
                                        <a href="/categoria/apagar/{{$categoria->id}}" class="btn btn-sm btn-danger">
                                            Apagar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
            @endif    
        </div>
    </div>
@endsection