<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $table = 'chapters';
    protected $fillable = [
        'comic_id',
        'chapter_number',
    ];

    public function comic()
    {
        return $this->belongsTo(Comics::class, 'comic_id');
    }

    // Một chương có nhiều hình ảnh
    public function images()
    {
        return $this->hasMany(ChapterImage::class, 'chapter_id');
    }
}
