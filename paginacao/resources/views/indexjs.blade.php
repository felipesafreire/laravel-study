<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>Paginação</title>
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="card text-center">

            <div class="card-header">
                Tabela de Clientes
            </div>

            <div class="card-body">

                <h5 class="card-title">
                    {{-- Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }}
                    ({{ $clientes->firstItem() }} a {{ $clientes->lastItem() }}) --}}
                </h5>

                <table class="table table-hover" id="tblClientes">

                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">E-mail</th>
                    </thead>
                    <tbody>

                    </tbody>

                </table>

            </div>

            <div class="card-footer">

                <nav id="paginator">
                    <ul class="pagination">
                    </ul>
                </nav>

            </div>

        </div>

    </div>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>

</html>
<script>
    $(document).ready(function(){

        carregarClientes(1);

        $('body').on('click', "#paginator > ul > li > a", function(){
            carregarClientes($(this).attr('pagina'));
        })

    });

    function carregarClientes(pagina){

        $.get('/json', {page: pagina}, function(resp){
            montarTabela(resp);
            montarPaginator(resp);
            $(".card-title").html("Exibindo " + resp.per_page + " clientes de " + resp.total + " (" + resp.from + " a " + resp.to + ")");
        });

    }

    function montarTabela(data){

        $("#tblClientes > tbody").html('');

        for(var i = 0; i < data.data.length; i++){
            $("#tblClientes > tbody").append(montarLinha(data.data[i]))
        }

    }

    function montarLinha(cliente){
        return '<tr>' +
                    '<td>'+cliente.id+'</td>' +
                    '<td>'+cliente.nome+'</td>' +
                    '<td>'+cliente.sobrenome+'</td>' +
                    '<td>'+cliente.email+'</td>' +
               '</tr>';
    }

    function montarPaginator(data){

        $("#paginator > ul").html('');
        $("#paginator > ul").append(getItemAnterior(data));

        n = 10;
        if(data.current_page - n/2 <= 1){
            inicio = 1;
        }else if(data.last_page - data.current_page < n){
            inicio = data.last_page - n + 1;
        }else{
            inicio = data.current_page - n/2
        }
        fim = inicio + n  - 1;
        for(var i = inicio; i <= fim; i++ ){
            $("#paginator > ul").append(getItem(data, i));
        }

        $("#paginator > ul").append(getItemProximo(data));

    }

    function getItemAnterior(data){

        i = data.current_page - 1;

        if(1==data.current_page){
            s = '<li class="page-item disabled">';
        }else{
            s = '<li class="page-item">';
        }
        s += '<a class="page-link" pagina="'+i+'" href="javascript:void(0);">Anterior</a></li>';

        return s;

    }

    function getItemProximo(data){
        i = data.last_page + 1;
        if(1==data.last_page){
            s = '<li class="page-item disabled">';
        }else{
            s = '<li class="page-item">';
        }
        s += '<a class="page-link" pagina="'+i+'" href="javascript:void(0);">Próximo</a></li>';

        return s;

    }

    function getItem(data, i){

        if(i==data.current_page){
            s = '<li class="page-item active">';
        }else{
            s = '<li class="page-item">';
        }
        s += '<a class="page-link" pagina="'+i+'" href="javascript:void(0);">' + i + '</a></li>';

        return s;

    }

</script>
