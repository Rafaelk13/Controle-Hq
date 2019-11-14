@extends('layout')

@section('cabecalho')
    Quadrinhos
@endsection

@section('conteudo')
    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    <a href="{{ route('form_criar_quadrinho') }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach($quadrinhos as $quadrinho)
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $quadrinho->nome }}

                <span class="d-flex">
                    <a href="hq/{{ $quadrinho->id }}/sagas" class="btn btn-info btm-sm mr-1">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form method="post" action="/hq/{{ $quadrinho->id }}"
                          onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $quadrinho->nome )}}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>

@endsection

