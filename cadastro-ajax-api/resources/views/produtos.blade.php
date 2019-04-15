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
        <table class="table table-ordered table-hover" id="tblProdutos">
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

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
    })

    $(document).ready(function(){
        carregaCategorias();
        carregaProdutos();
    })

    $("#formPoduto").submit(function(event){
        event.preventDefault();
        if($("#id").val()==''){
            criarProduto()
        }else{
            editarProduto();
        }
        $("#cadastroProduto").modal('hide');
    });

    function criarProduto(){
        $.post('/api/produtos', 
        {
            nome: $('#nomeProduto').val(),
            preco: $('#precoProduto').val(),
            estoque: $('#quantidadeProduto').val(),
            categoria_id: $('#departamentoProduto').val()
        }, 
        function(data){
            $("#tblProdutos > tbody").append(montarTabela(data))
        },'json')
    }

    function editarProduto(){
        $.ajax({
            url: `/api/produtos/${$('#id').val()}`,
            type: 'PUT',
            data: {
                id: $('#id').val(),
                nome: $('#nomeProduto').val(),
                preco: $('#precoProduto').val(),
                estoque: $('#quantidadeProduto').val(),
                categoria_id: $('#departamentoProduto').val()
            },
            success: function(data) { 
                var linha = $("#tblProdutos > tbody > tr").filter(function(i,produto){ return $(this).find('td').eq(0).text() == $('#id').val() });
                console.log(linha);
                if(linha){
                    $(linha).replaceWith(montarTabela(JSON.parse(data)))
                }
            },
            error: function(error){
                alert(error);
            }
        })
    }

    function novoProduto(){
        document.getElementById("formPoduto").reset();
        $("#cadastroProduto").modal('show');
    }

    function carregaProdutos(){
        $.getJSON('/api/produtos', function(data) { 
            $.each(data, function(i, produto) {
                $("#tblProdutos > tbody").append(montarTabela(produto));
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

    function montarTabela(produto){
        return "<tr>"+
            "<td>"+ produto.id +"</td>" + 
            "<td>"+ produto.nome +"</td>" + 
            "<td>"+ produto.estoque +"</td>" +
            "<td>"+ produto.preco +"</td>" + 
            "<td>"+ produto.categoria_id +"</td>" + 
            "<td>" + 
                "<button type='button' class='btn btn-primary btn-sm' onclick='editar("+produto.id+")'>Editar</button> " + 
                "<button type='button' class='btn btn-danger btn-sm' onclick='apagar("+produto.id+")'>Apagar</button>" + 
            "</td>" + 
        +"</tr>";
    }

    function editar(id){
        $.getJSON(`/api/produtos/${id}`, function(data) { 
            $('#id').val(data.id);
            $('#nomeProduto').val(data.nome);
            $('#precoProduto').val(data.preco);
            $('#quantidadeProduto').val(data.estoque);
            $('#departamentoProduto').val(data.categoria_id);
            $("#cadastroProduto").modal('show');
        });
    }

    function apagar(id){
        $.ajax({
            url: `/api/produtos/${id}`,
            type: 'DELETE',
            success: function(result) { 
                var linha = $("#tblProdutos > tbody > tr").filter(function(i,produto){ return $(this).find('td').eq(0).text() == id });
                if(linha){
                    linha.remove();
                }
            },
            error: function(error){
                alert(error);
            }
        })
    }

</script>

@endsection