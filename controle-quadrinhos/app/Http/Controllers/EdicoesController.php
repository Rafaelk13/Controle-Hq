<?php

namespace App\Http\Controllers;

use App\Saga;
use Illuminate\Http\Request;

class EdicoesController extends Controller
{
    public function index(Saga $saga)
    {
        $edicoes = $saga->edicoes;

        return view('edicoes.index', compact('edicoes'));

    }
}
