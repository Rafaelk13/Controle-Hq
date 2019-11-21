@extends('layout')

@section('cabecalho')
    Edições
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach($edicoes as $edicao)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Edições {{ $edicao->numero }}
            </li>
        @endforeach

    </ul>
@endsection
