<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class PostService {


    public  function saveImage($file){
        return Storage::disk('public')->put('/upload', $file );
    }

    public function deleteImage($imgName){

        if (file_exists(public_path($imgName))) {
            unlink(public_path($imgName));
        }
    }
}
