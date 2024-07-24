<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktor extends Model
{
    use HasFactory;

    public function film(){
        return $this->belongsToMany(Film::class, 'film_aktor', 'aktor_id', 'film_id');
    }
}
