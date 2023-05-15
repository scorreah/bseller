<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use App\Models\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        try {
            $image_shoe = $request->file('image_shoe');
            $nombreImagen = 'img/shoes/'.time().'_'.$image_shoe->getClientOriginalName();
            Storage::disk('public')->put($nombreImagen, File::get($image_shoe));
        } catch(Exception $e) {
            $nombreImagen = 'Error';
        }

        return 'storage/'.$nombreImagen;
    }

    public function delete(string $dir): bool
    {
        try {
            Storage::disk('local')->delete($dir);
        } catch(Exception $e) {
            return false;
        }

        return true;
    }
}
