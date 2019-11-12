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
        $quadrinho = Quadrinho::create($request->all());
        $request->session()->flash('mensagem', "Quadrinho {$quadrinho} criada com sucesso {$quadrinho->nome}");

        return redirect()->route('listar_quadrinhos');

    }

    public function destroy(Request $request)
    {
        Quadrinho::destroy($request->id);
        $request->session()->flash('mensagem', 'Quadrinho removida com sucesso');

        return redirect()->route('listar_quadrinhos');

    }

}
