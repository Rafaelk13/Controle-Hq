<?php

namespace App\Http\Controllers;

use App\Edicao;
use App\Saga;
use Illuminate\Http\Request;


class EdicoesController extends Controller
{
    public function index(Saga $saga, Request $request)
    {
        return view('edicoes.index', [
            'edicoes' => $saga->edicoes,
            'sagaId' => $saga->id,
            'mensagem' => $request->session()->get('mensagem')
        ]);

    }

    public function lido(Saga $saga, Request $request)
    {
        $edicoesLidas = $request->edicoes;
        $saga->edicoes->each(function (Edicao $edicao) use ($edicoesLidas) {
            $edicao->lido = in_array(
                $edicao->id,
                $edicoesLidas);
        });
        $saga->push();
        $request->session()->flash('mensagem', 'Edições marcadas como lidas');

        return redirect()->back();
    }

}
