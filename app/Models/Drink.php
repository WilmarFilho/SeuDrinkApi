<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    public function ingredientes() {
        return $this->belongsToMany(Drink::class);
    }

    public function frutas() {
        return $this->belongsTo(Fruta::class);
    }

    public function bebidas() {
        return $this->belongsTo(Bebida::class);
    }
}
