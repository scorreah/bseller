<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Exception;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        try
        {
            $image_shoe = $request->file('image_shoe');
            $nombreImagen =  "img\shoes\\".time()."_".$image_shoe->getClientOriginalName();
            Storage::disk('local')->put($nombreImagen,  File::get($image_shoe));
        }catch(Exception $e)
        {
            $nombreImagen = "Error";
        }
        return $nombreImagen;
    }
}