<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="Drink_Ingredientes",
 *     title="Ingredientes do Drink",
 *     description="Ingredientes de um Drink",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="drink_id", type="integer", example=10),
 *     @OA\Property(property="ingrediente_id", type="integer", example=11),
 *     
 * )
 */
class DrinkIngrediente extends Model
{


    protected $fillable = [
        'drink_id',
        'ingrediente_id'
    ];





}
