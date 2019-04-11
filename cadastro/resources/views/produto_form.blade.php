@extends('layouts.app', ['current' => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form @if(isset($produto)) action="/produto/{{$produto->id}}" @else action="/produto" @endif method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" name="nomeProduto" value="@if(isset($produto)){{$produto->nome}}@endif" placeholder="Produto" class="form-control" id="nomeProduto">
                </div>
                <div class="form-group">
                    <label for="precoProduto">Preço do Produto</label>
                    <input type="number" name="precoProduto" value="@if(isset($produto)){{$produto->preco}}@endif" placeholder="Preço do Produto" class="form-control" id="precoProduto">
                </div>
                <div class="form-group">
                    <label for="estoqueProduto">Estoque do Produto</label>
                    <input type="number" name="estoqueProduto" value="@if(isset($produto)){{$produto->estoque}}@endif" placeholder="Estoque do Produto" class="form-control" id="estoqueProduto">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control">
                        @if(!isset($produto))
                            <option value="">Selecione uma categoria</option>
                        @endif
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}" @if(isset($produto)) @if ($categoria->id===$produto->categoria_id) selected @endif @endif>{{$categoria->nome}}</option>     
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@endsection