<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Exception;

class Shoe extends Model
{
    /**
     * SHOE ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['image'] - string - contains the path to the product image
     * $this->attributes['size'] - float - contains the size of the shoe
     * $this->attributes['brand'] - string - contains the shoe brand
     * $this->attributes['model'] - string - contains the shoe model
    */

    protected $fillable = ['price','image','size','brand','model'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id) : void
    {
        $this->attributes['id'] = $id;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice($name) : void
    {
        $this->attributes['price'] = $name;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage($price) : void
    {
        $this->attributes['image'] = $price;
    }

    public function getSize(): float
    {
        return $this->attributes['size'];
    }

    public function setSize($price) : void
    {
        $this->attributes['size'] = $price;
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand($price) : void
    {
        $this->attributes['brand'] = $price;
    }

    public function getModel(): string
    {
        return $this->attributes['model'];
    }

    public function setModel($price) : void
    {
        $this->attributes['model'] = $price;
    }

    public static function validate(Request $request) : array
    {
        $validatedData = $request->validate([
            'price' => 'required|numeric|min:0',
            'size' => 'required|numeric|min:4',
            'brand' => 'required|string',
            'model' => 'required|string',
            'image_shoe' => 'required|image',
        ]);
        return $validatedData;
    }

    public function saveImage(Request $request) : string
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
