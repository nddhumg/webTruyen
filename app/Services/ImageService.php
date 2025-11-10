<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public static function upload($file, $folder)
    {
        $filename = time().'_'.$file->getClientOriginalName();
        // Lưu file vào storage/app/public/avatars
        $file->storeAs($folder, $filename, 'public');
        return $folder.'/'.$filename;
    }

    public static function url($path){
        return asset('storage/' . ltrim($path, '/'));
    }
}
