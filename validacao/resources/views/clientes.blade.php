@extends('layouts.app', ["current" => 'clientes'])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">
                Cadastro de clientes
                <a href="/novocliente" class="btn btn-primary btn-sm float-right">Novo cliente</a>
            </h5>
            
            @if (count($clientes) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>E-mail</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                        </tr>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id}}</td>
                                    <td>{{$cliente->nome}}</td>
                                    <td>{{$cliente->idade}}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td>{{$cliente->endereco}}</td>
                                    <td>
                                        {{-- <a href="/categoria/editar/{{$categoria->id}}" class="btn btn-sm btn-primary">
                                            Editar
                                        </a>
                                        <a href="/categoria/apagar/{{$categoria->id}}" class="btn btn-sm btn-danger">
                                            Apagar
                                        </a> --}}
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