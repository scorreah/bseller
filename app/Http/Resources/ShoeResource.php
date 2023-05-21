<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

use Illuminate\Http\Resources\Json\JsonResource;
class ShoeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'producto' => $this->getModel(),
            'marca' => $this->getBrand(),
            'talla' => $this->getSize(),
            'imagen' => $_ENV['APP_URL'].'/'.$this->getImage(),
            'url_producto' => $_ENV['APP_URL']."/shoes/".$this->getId(),
        ];
    }
}