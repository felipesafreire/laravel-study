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

@if(isset($produtos))

    @if(count($produtos) == 0)
        <h1>Nenhum produto</h1>
    @elseif(count($produtos) === 1)
        <h1>Temos um produto</h1>
    @else
        <h1>Temos vários produtos</h1>
    @endif

@else
    <h1>Variável produtos não foi passada como parâmetro.</h1>
@endif

@empty($produtos)
    <h1>Não tem produto.</h1>
@endempty


<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>