@extends('layout.meulayout')


@section('secao_conteudo')
    
    @foreach ($produtos as $produto)
        <p>Id: {{$produto['id']}}, Nome: {{$produto['nome']}}</p>
    @endforeach

    <hr>

    @foreach ($produtos as $produto)
        <p>
            Id: {{$produto['id']}}, Nome: {{$produto['nome']}}
            @if ($loop->first)
                primeiro
            @endif
            @if ($loop->last)
                ultimo elemento
            @endif
        <span class="badge badge-secondary">
            {{$loop->index}} / {{$loop->count}} / {{$loop->remaining}}
        </span>

        <span class="badge badge-warning">
            {{$loop->iteration}}
        </span>
        </p>
    @endforeach

@endsection

