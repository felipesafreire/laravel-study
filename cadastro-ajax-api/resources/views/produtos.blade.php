@extends('layout.app', ["current" => "produtos" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h5 class="card-title">
                    Cadastro de Produtos
                </h5>
            </div>
            <div class="col">
                <button onclick="novoProduto()" class="btn btn-sm btn-primary float-right" role="button">Novo Produto</button>
            </div>
        </div>
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Departamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>         
            </tbody>
        </table>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="cadastroProduto">
    <div class="modal-dialog" role="document">
        <form id="formPoduto">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" 
                            id="nomeProduto" placeholder="Nome do Produto">
                </div>
                <div class="form-group">
                    <label for="precoProduto">Preço</label>
                    <input type="number" class="form-control" name="precoProduto" 
                            id="precoProduto" placeholder="Preço">
                </div>
                <div class="form-group">
                    <label for="quantidadeProduto">Quantidade</label>
                    <input type="number" class="form-control" name="quantidadeProduto" 
                            id="quantidadeProduto" placeholder="Quantidade">
                </div>
                <div class="form-group">
                        <label for="departamentoProduto">Departamento</label>
                        <select class="form-control" name="departamentoProduto" id="departamentoProduto">
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            </div>
        </form>
    </div>
</div>
    
@endsection

@section('javascript')

<script>

    $(document).ready(function(){
        carregaCategorias();
        carregaProdutos();
    })

    function novoProduto(){
        document.getElementById("formPoduto").reset();
        $("#cadastroProduto").modal('show');
    }

    function carregaProdutos(){
        $.getJSON('/api/produtos', function(data) { 
            $.each(data, function(i, produto) {
                console.log(produto);
            });
        });
    }

    function carregaCategorias(){
        $.getJSON('/api/categorias', function(data) { 
            $('#departamentoProduto').append('<option value="">Selecione um departamento</option>');
            $.each(data, function(i, categoria) {
                $('#departamentoProduto').append('<option value="' + categoria.id + '">' + categoria.nome + '</option>');
            });
        });
    }

</script>

@endsection