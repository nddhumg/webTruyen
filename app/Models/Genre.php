<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    protected $table = 'genres';

    protected $fillable = [
        'name',
    ];

    public function comics()
    {
        return $this->belongsToMany(Comic::class, 'genre_comic', 'genre_id', 'comic_id');
    }
}
