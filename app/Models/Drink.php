<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Drink",
 *     title="Drink",
 *     description="Modelo de um Drink",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="nome", type="string", example="Caipirinha"),
 *     @OA\Property(property="foto", type="string", example="https://example.com/drink.jpg"),
 *     @OA\Property(property="preparo", type="string", example="Misture todos os ingredientes e sirva."),
 *     @OA\Property(property="fruta_id", type="integer", example=2),
 *     @OA\Property(property="bebida_id", type="integer", example=1)
 * )
 */

class Drink extends Model
{

    protected $fillable = [
        'nome',
        'foto',
        'preparo',
        'fruta_id',
        'bebida_id'
    ] ;

    public function ingredientes() {
        return $this->belongsToMany(Ingrediente::class, 'drink_ingredientes', 'drink_id', 'ingrediente_id');
    }

    public function frutas() {
        return $this->belongsTo(Fruta::class);
    }

    public function bebidas() {
        return $this->belongsTo(Bebida::class);
    }
}
