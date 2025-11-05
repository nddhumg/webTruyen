<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commics extends Model
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
        return $this->belongsToMany(Genres::class, 'genre_commic', 'commic_id', 'genre_id');
    }
}
