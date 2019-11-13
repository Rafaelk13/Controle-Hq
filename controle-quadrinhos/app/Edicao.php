<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edicao extends Model
{
    protected $fillable = ['numero'];

    public function saga()
    {
        return $this->belongsTo(Saga::class);
    }
}
