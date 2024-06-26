<?php


namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PointResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'game' => $this->game,
            'points' => $this->points,
        ];
    }
}

