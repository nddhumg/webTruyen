<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ChapterImage extends Model
{

    protected $table = 'chapter_images';
    protected $fillable = [
        'chapter_id',
        'image_path',
        'order',
    ];
 public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
}
