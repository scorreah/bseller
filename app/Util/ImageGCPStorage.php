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
                $image = $request->file('image_shoe');
                $imageName = time().'_'.$image->getClientOriginalName();
                #$path = Storage::disk('gcp')->put($imageName, File::get($image));

                $gcpKeyFile = file_get_contents(env('GOOGLE_CLOUD_KEY_FILE'));
                $storage = new StorageClient(['keyFile' => json_decode($gcpKeyFile, true)]);
                $bucket = $storage->bucket(env('GOOGLE_CLOUD_STORAGE_BUCKET'));

                $storedImage = $bucket->upload(
                    file_get_contents($image->getRealPath()), [
                    'name' => $imageName
                ]);

                $path = 'https://storage.googleapis.com/'.env('GOOGLE_CLOUD_STORAGE_BUCKET').'/'.$imageName;
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
