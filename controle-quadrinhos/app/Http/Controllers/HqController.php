<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;

class HqController extends Controller
{
    public function index()
    {
        $quadrinhos = [
            'Batman',
            'Homem Aranha',
            'Superman'
        ];

        return view('hq.index', compact('quadrinhos'));
    }

    public function create()
    {

        return view('hq.create');
    }

}
