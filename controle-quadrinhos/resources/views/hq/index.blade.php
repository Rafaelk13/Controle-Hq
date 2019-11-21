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
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="nome-quadrinho-{{ $quadrinho->id }}">{{ $quadrinho->nome }}</span>

                <div class="input-group w-50" hidden id="input-nome-quadrinho-{{ $quadrinho->id }}">
                    <input type="text" class="form-control" value="{{ $quadrinho->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarQuadrinho({{ $quadrinho->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                <span class="d-flex">
                    <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $quadrinho->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    <a href="hq/{{ $quadrinho->id }}/sagas" class="btn btn-info btm-sm mr-1" >
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

    <script>
        function toggleInput(quadrinhoId) {
            const nomeQuadrinhoEl = document.getElementById(`nome-quadrinho-${quadrinhoId}`);
            const inputSerieEl = document.getElementById(`input-nome-quadrinho-${quadrinhoId}`);
            if (nomeQuadrinhoEl.hasAttribute('hidden')) {
                nomeQuadrinhoEl.removeAttribute('hidden');
                inputSerieEl.hidden = true;
            } else {
                inputSerieEl.removeAttribute('hidden');
                nomeQuadrinhoEl.hidden = true;
            }

        }

        function editarQuadrinho(quadrinhoId) {
            let formData = new FormData();
            const nome = document.querySelector(`#input-nome-quadrinho-${quadrinhoId} > input`).value;
            const token = document.querySelector('input[name="_token"]').value;
            formData.append('nome', nome);
            formData.append('_token', token);
            const url = `/hq/${quadrinhoId}/editaNome`;
            fetch(url, {body: formData, method: 'POST'}).then(() => {
                toggleInput(quadrinhoId);
                document.getElementById(`nome-quadrinho-${quadrinhoId}`).textContent = nome;
            });

        }
    </script>

@endsection

