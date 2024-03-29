@extends('layout')

@section('cabecalho')
    Adicionar Quadrinhos
@endsection


@section('conteudo')

    @include('erros', ['errors' => $errors])

    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>

            <div class="col col-2">
                <label for="nome">Sagas</label>
                <input type="text" class="form-control" name="nome_sagas" id="nome_sagas">
            </div>

            <div class="col col-2">
                <label for="nome">Edição por Saga</label>
                <input type="number" class="form-control" name="ed_por_saga" id="ed_por_saga">
            </div>

        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>

@endsection
