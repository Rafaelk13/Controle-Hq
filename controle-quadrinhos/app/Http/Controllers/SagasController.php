<?php

namespace App\Http\Controllers;

use App\Quadrinho;
use Illuminate\Http\Request;

class SagasController extends Controller
{
    public function index(int $quadrinhoId)
    {
        $quadrinhos = Quadrinho::find($quadrinhoId);
        $sagas = $quadrinhos->sagas;

        return view('sagas.index', compact('quadrinhos', 'sagas'));
    }
}
