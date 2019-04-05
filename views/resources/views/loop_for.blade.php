@extends('layout.meulayout')


@section('secao_conteudo')
    
    <h1>Loop FOR</h1>

    @for ($i = 0; $i < $n; $i++)
<p>Número: {{$i}}</p>
    @endfor

@endsection