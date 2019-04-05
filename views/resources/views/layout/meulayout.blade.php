<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>

@hasSection('minha_secao_produtos')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Produtos</h5>
            <p class="card-text">
                @yield('minha_secao_produtos')
            </p>
            <a href="#" class="card-link">Informações</a>
            <a href="#" class="card-link">Ajuda</a>
        </div>

    </div>

@endif

@hasSection('secao_conteudo')

    @yield('secao_conteudo')
    
@endif

<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>