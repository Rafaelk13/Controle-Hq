@extends('layout')

@section('cabecalho')
    Sagas de {{ $quadrinhos->nome }}
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach($sagas as $saga)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/sagas/{{ $saga->id }}/edicoes">
                    Saga - {{ $saga->nome }}
                </a>
                <span class="badge badge-secondary">
                    {{ $saga->getEdicoesLidas()->count() }} / {{ $saga->edicoes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection
