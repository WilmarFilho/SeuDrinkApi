<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Fruta",
 *     title="Fruta",
 *     description="Modelo de uma Fruta",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="nome", type="string", example="Morango"),
 * )
 */

class Fruta extends Model
{
    protected $fillable = [
        'nome'
    ] ;
}
