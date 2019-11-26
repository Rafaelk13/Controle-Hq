<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Saga extends Model
{
    protected $fillable = ['nome'];

    public function edicoes()
    {
        return $this->hasMany(Edicao::class);
    }

    public function quadrinhos()
    {

        return $this->belongsTo(Quadrinho::class);

    }

    public function getEdicoesLidas() : Collection
    {
        return $this->edicoes->filter(function (Edicao $edicao) {
            return $edicao->lido;
        });
    }
}
