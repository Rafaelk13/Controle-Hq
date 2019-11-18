<?php


namespace App\Services;

use App\{Edicao, Quadrinho, Saga};
use Illuminate\Support\Facades\DB;


class RemovedorDeQuadrinho
{
    public function removerQuadrinho(int $quadrinhoId) : string
    {
        DB::beginTransaction();
        $quadrinho = Quadrinho::find($quadrinhoId);
        $nomeQuadrinho = $quadrinho->nome;
        $this->removerSagas($quadrinho);
        $quadrinho->delete();
        DB::commit();

        return $nomeQuadrinho;

    }

    /**
     * @param $quadrinho
     */
    private function removerSagas(Quadrinho $quadrinho): void
    {
        $quadrinho->sagas->each(function (Saga $saga) {
            $this->removerEdicao($saga);
            $saga->delete();
        });
    }

    /**
     * @param Saga $saga
     * @throws \Exception
     */
    private function removerEdicao(Saga $saga): void
    {
        $saga->edicoes->each(function (Edicao $edicao) {
            $edicao->delete();
        });

    }

}
