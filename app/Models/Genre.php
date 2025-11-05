<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';

    protected $fillable = [
        'name',
        'description',
        'is_hot',
    ];

    public function stories()
    {
        return $this->belongsToMany(Comic::class, 'genre_commic', 'genre_id', 'commic_id');
    }
}
