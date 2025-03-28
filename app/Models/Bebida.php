<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="Bebida",
 *     title="Bebida",
 *     description="Modelo de uma Bebida",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="nome", type="string", example="Vodka"),
 * )
 */

class Bebida extends Model
{
    protected $fillable = [
        'nome'
    ] ;
}
