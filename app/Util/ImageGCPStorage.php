<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use App\Models\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Google\Cloud\Storage\StorageClient;

class ImageGCPStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        try {
            if ($request->hasFile('image_shoe')) {
                $gcpKeyFile = file_get_contents(env('GOOGLE_CLOUD_KEY_FILE'));
                $storage = new StorageClient(['keyFile' => json_decode($gcpKeyFile, true)]);
                $bucket = $storage->bucket(env('GOOGLE_CLOUD_STORAGE_BUCKET'));
                $gcpStoragePath = 'images/'.$time().'_'.$image_shoe->getClientOriginalName();
                $image_shoe = $request->file('image_shoe');
                $bucket->upload(File::get($image_shoe), ['name' => $gcpStoragePath]);
            } else {
                $gcpStoragePath = 'Error';
            }
        } catch(Exception $e) {
            $gcpStoragePath = 'Error';
        }

        return $gcpStoragePath;
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
