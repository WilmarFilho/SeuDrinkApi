<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{

    protected $fillable = [
        'nome'
    ] ;


    public function drinks()
    {
        return $this->belongsToMany(Drink::class);
    }

}
