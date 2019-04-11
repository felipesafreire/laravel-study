@extends('layouts.app', ['current' => "clientes"])

@section('body')
    <div class="card border">
        <div class="card-header">
            <h3 class="card-title">Cadastro de Cliente</h3>
        </div>
        <div class="card-body">
            <form action="/cliente" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome do cliente</label>
                    <input type="text" name="nome" placeholder="Cliente" class="form-control" id="nome">
                </div>
                <div class="form-group">
                    <label for="idade">Idade</label>
                    <input type="number" name="idade" placeholder="Idade" class="form-control" id="idade">
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" placeholder="Endereço" class="form-control" id="endereco">
                </div>
                <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" placeholder="E-mail" class="form-control" id="email">
                    </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@endsection