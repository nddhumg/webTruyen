<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{

    protected $table = 'comics';

    protected $fillable = [
        'title',
        'author',
        'description',
        'cover_image',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_comic', 'comic_id', 'genre_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'comic_id', 'id');
    }

    public function latestChapter()
    {
        return $this->hasOne(Chapter::class)->latest('chapter_number');
    }
}
