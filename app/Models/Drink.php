<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Drink",
 *     title="Drink",
 *     description="Modelo de um Drink",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-03-27T22:11:59.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-03-27T22:11:59.000000Z"),
 *     @OA\Property(property="nome", type="string", example="Mojito"),
 *     @OA\Property(property="foto", type="string", example="uploads/697APr0Pg544KgrM1ANZC9ctPpQ9slKT621jHahu.png"),
 *     @OA\Property(property="preparo", type="string", example="Misture todos os ingredientes e sirva."),
 *     @OA\Property(property="fruta_id", type="integer", example=1),
 *     @OA\Property(property="bebida_id", type="integer", example=1),
 *     @OA\Property(
 *         property="frutas",
 *         type="object",
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="created_at", type="string", format="date-time", example="2025-03-27T19:08:10.000000Z"),
 *         @OA\Property(property="updated_at", type="string", format="date-time", example="2025-03-27T19:08:10.000000Z"),
 *         @OA\Property(property="nome", type="string", example="Banana")
 *     ),
 *     @OA\Property(
 *         property="bebidas",
 *         type="object",
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="created_at", type="string", format="date-time", example="2025-03-27T19:08:18.000000Z"),
 *         @OA\Property(property="updated_at", type="string", format="date-time", example="2025-03-27T19:08:18.000000Z"),
 *         @OA\Property(property="nome", type="string", example="Refrigerante")
 *     ),
 *    
 *        
 *        
 *        
 *             
 *             
 *             
 *             
 *             
 *           
 *               
 *                
 *                 
 *                
 *             
 *         
 *     
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

    public function frutas() {
        return $this->belongsTo(Fruta::class, 'fruta_id');
    }

    public function bebidas() {
        return $this->belongsTo(Bebida::class, 'bebida_id');
    }
}
