<?php

namespace App;

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
}
