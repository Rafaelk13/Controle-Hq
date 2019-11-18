<?php


namespace App\Http\Controllers;


use App\Edicao;
use App\Http\Requests\QuadrinhosFormRequest;
use App\Quadrinho;
use App\Saga;
use App\Services\CriadorDeQuadrinho;
use App\Services\RemovedorDeQuadrinho;
use Illuminate\Http\Request;

class HqController extends Controller
{
    public function index(Request $request)
    {
        $quadrinhos = quadrinho::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('hq.index', compact('quadrinhos', 'mensagem'));
    }

    public function create()
    {

        return view('hq.create');
    }

    public function store(QuadrinhosFormRequest $request, CriadorDeQuadrinho $criadorDeQuadrinho)
    {
        $quadrinho = $criadorDeQuadrinho->criarQuadrinho($request->nome, $request->nome_sagas , $request->ed_por_saga);

        $request->session()->flash('mensagem', "Quadrinho {$quadrinho} criada com sucesso {$quadrinho->nome}");

        return redirect()->route('listar_quadrinhos');

    }

    public function destroy(Request $request, RemovedorDeQuadrinho $removedorDeQuadrinho)
    {
        $nomeQuadrinho = $removedorDeQuadrinho->removerQuadrinho($request->id);
        $request->session()->flash('mensagem', "Quadrinho $nomeQuadrinho removido com sucesso");

        return redirect()->route('listar_quadrinhos');

    }

}
