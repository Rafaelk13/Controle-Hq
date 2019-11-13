<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Quadrinho extends Model
{
    protected $fillable = ['nome'];

    public function sagas()
    {
        return $this->hasMany(Saga::class);
    }

}
