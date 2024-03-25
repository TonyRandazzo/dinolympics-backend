<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkinResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'img'=> $this->img,
            'description'=> $this->description,
            'available'=> $this->available,
            'quantity'=> $this->quantity,
        ];
    }
}
