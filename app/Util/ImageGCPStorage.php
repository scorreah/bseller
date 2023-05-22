<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use App\Models\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageGCPStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        try {
            if ($request->hasFile('image_shoe')) {
                $image_shoe = $request->file('image_shoe');
                $nombreImagen = time().'_'.$image_shoe->getClientOriginalName();
                $path = Storage::disk('gcs')->put($nombreImagen, File::get($image_shoe));
            } else {
                $path = 'Error';
            }
        } catch(Exception $e) {
            $path = 'Error';
        }

        return $path;
    }

    public function delete(string $dir): bool
    {
        try {
            Storage::disk('gcs')->delete($dir);
        } catch(Exception $e) {
            return false;
        }

        return true;
    }
}
