@extends('layout')

@section('cabecalho')
    Edições
@endsection

@section('conteudo')

    @include('mensagem', ['mensagem' => $mensagem])

    <form action="/sagas/{{ $sagaId }}/edicoes/lido" method="post">
        @csrf
        <ul class="list-group">
            @foreach($edicoes as $edicao)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Edições {{ $edicao->numero }}
                    <input type="checkbox" name="edicoes[]" value="{{ $edicao->id }}" {{$edicao->lido ? 'checked' : ''}}>
                </li>
            @endforeach

        </ul>

        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
@endsection
