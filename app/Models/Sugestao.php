<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sugestao extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'nomeDrink',
        'ingredientes',
        'recado'
    ] ;
}
