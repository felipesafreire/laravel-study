@extends('layouts.app', ["current" => 'produtos'])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">
                Cadastro de Produto
                <a href="/produto/novo" class="btn btn-primary btn-sm float-right">Nova Produto</a>
            </h5>
            
            @if (count($produtos) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Ações</th>
                        </tr>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{$produto->id}}</td>
                                    <td>{{$produto->nome}}</td>
                                    <td>{{$produto->preco}}</td>
                                    <td>{{$produto->estoque}}</td>
                                    <td>
                                        <a href="/produto/editar/{{$produto->id}}" class="btn btn-sm btn-primary">
                                            Editar
                                        </a>
                                        <a href="/produto/apagar/{{$produto->id}}" class="btn btn-sm btn-danger">
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