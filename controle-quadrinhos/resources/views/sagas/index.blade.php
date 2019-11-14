@extends('layout')

@section('cabecalho')
    Sagas de {{ $quadrinhos->nome }}
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach($sagas as $saga)
            <li class="list-group-item"> Saga - {{ $saga->nome }}</li>
        @endforeach
    </ul>
@endsection
