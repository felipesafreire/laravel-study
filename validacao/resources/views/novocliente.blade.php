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
                    <input type="text" name="nome" placeholder="Cliente" 
                        class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" id="nome">
                    @if ($errors->has('nome'))
                        <div class="invalid-feedback">
                            {{$errors->first('nome')}}
                        </div>
                    @endif  
                </div>
                <div class="form-group">
                    <label for="idade">Idade</label>
                    <input type="number" name="idade"  placeholder="Idade" 
                        class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="idade">
                    @if ($errors->has('idade'))
                        <div class="invalid-feedback">
                            {{$errors->first('idade')}}
                        </div>
                    @endif 
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" placeholder="Endereço" 
                        class="form-control {{$errors->has('endereco') ? 'is-invalid' : ''}}" id="endereco">
                    @if ($errors->has('endereco'))
                        <div class="invalid-feedback">
                            {{$errors->first('endereco')}}
                        </div>
                    @endif 
                </div>
                <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" placeholder="E-mail" 
                            class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email">
                        @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{$errors->first('email')}}
                        </div>
                    @endif
                    </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a href="/clientes" class="btn btn-danger btn-sm">Cancelar</a>
                </div>
            </form>
        </div>
        {{-- @if ($errors->any())
            <div class="card-footer">

                @foreach ($errors->all() as $error)
                    <p class="text text-danger">
                        {{$error}}
                    </p>
                @endforeach

            </div>
        @endif --}}
    </div>
@endsection