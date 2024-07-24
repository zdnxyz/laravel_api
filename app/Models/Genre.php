<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function film(){
        return $this->belongsToMany(Film::class, 'film_genre', 'genre_id', 'film_id');
    }
}
