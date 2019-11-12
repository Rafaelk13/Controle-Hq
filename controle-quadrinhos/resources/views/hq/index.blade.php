@extends('layout')

@section('cabecalho')
Quadrinhos
@endsection

@section('conteudo')

<a href="/hq/criar" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach($quadrinhos as $quadrinho)
        <li class="list-group-item"><?= $quadrinho; ?></li>
    @endforeach
</ul>

@endsection

