<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>

    @alerta(['tipo' => "danger", 'titulo' => 'Titulo'])
        @slot('mensagem')
            <strong>Erro: </strong>sua mensagem de erro.
        @endslot
    @endalerta 
    
    @alerta(['tipo' => "primary", 'titulo' => 'Titulo'])
        @slot('mensagem')
            <strong>Erro: </strong>sua mensagem de erro.
        @endslot
    @endalerta 

    @alerta(['tipo' => "success", 'titulo' => 'Titulo'])
        @slot('mensagem')
            <strong>Erro: </strong>sua mensagem de erro.
        @endslot
    @endalerta 

    <script src="{{asset('js/app.js')}}" type="text/javascript">
</body>
</html>