<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $table = 'commics';

    protected $fillable = [
        'title',
        'author',
        'description',
        'cover_image',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_commic', 'commic_id', 'genre_id');
    }
}
