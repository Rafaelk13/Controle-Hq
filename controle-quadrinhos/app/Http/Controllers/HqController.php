<?php


namespace App\Http\Controllers;


use App\Http\Requests\QuadrinhosFormRequest;
use App\Quadrinho;
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

    public function store(QuadrinhosFormRequest $request)
    {
        $quadrinho = Quadrinho::create(['nome' => $request->nome]);
        $saga = $quadrinho->sagas()->create(['nome' => $request->nome_sagas]);

        for ($i = 1; $i <= $request->ed_por_saga; $i++) {
            $saga->edicoes()->create(['numero' => $i]);
        }

        $request->session()->flash('mensagem', "Quadrinho {$quadrinho} criada com sucesso {$quadrinho->nome}");

        return redirect()->route('listar_quadrinhos');

    }

    public function destroy(Request $request)
    {
        Quadrinho::destroy($request->id);
        $request->session()->flash('mensagem', 'Quadrinho removido com sucesso');

        return redirect()->route('listar_quadrinhos');

    }

}
