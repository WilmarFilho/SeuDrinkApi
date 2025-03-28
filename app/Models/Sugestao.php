<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="Sugestao",
 *     title="Sugestão",
 *     description="Modelo de uma Sugestao",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="nome", type="string", example="Wilmar Filho"),
 *     @OA\Property(property="email", type="email", example="wilmarfilho32@hotmail.com"),
 *     @OA\Property(property="nomeDrink", type="string", example="Caipirinha"),
 *     @OA\Property(property="ingredientes", type="string", example="Açucar, Leite ..."),
 *     @OA\Property(property="recado", type="string", example="Esse é um drink muito ..."),
 * )
 */

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
