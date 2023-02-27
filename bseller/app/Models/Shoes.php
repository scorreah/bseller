<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoes extends Model
{
    use HasFactory;
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['price'] - int - contains the product price
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

    public function getPrice(): string
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

}
