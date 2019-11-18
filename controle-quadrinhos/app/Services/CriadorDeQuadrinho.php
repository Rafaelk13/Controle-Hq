<?php


namespace App\Services;


use App\Quadrinho;
use Illuminate\Support\Facades\DB;

class CriadorDeQuadrinho
{
    public function criarQuadrinho(string $nomeQuadrinho, string $nomeSagas, int $ed_por_saga) : Quadrinho
    {
        DB::beginTransaction();
        $quadrinho = Quadrinho::create(['nome' => $nomeQuadrinho]);
        $saga = $quadrinho->sagas()->create(['nome' => $nomeSagas]);
        $this->criaEdicoes($ed_por_saga, $saga);
        DB::commit();

        return $quadrinho;
    }

    /**
     * @param int $ed_por_saga
     * @param $saga
     */
    private function criaEdicoes(int $ed_por_saga, $saga): void
    {
        for ($i = 1; $i <= $ed_por_saga; $i++) {
            $saga->edicoes()->create(['numero' => $i]);
        }
    }

}
