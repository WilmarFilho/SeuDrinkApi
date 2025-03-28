<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="Ingrediente",
 *     title="Ingrediente",
 *     description="Modelo de um Ingrediente",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="nome", type="string", example="Leite Condensado"),
 * )
 */
class Ingrediente extends Model
{

    protected $fillable = [
        'nome'
    ] ;


    public function ingredientes() {
        return $this->belongsToMany(Drink::class, 'drink_ingredientes', 'ingrediente_id', 'drink_id');
    }

}
