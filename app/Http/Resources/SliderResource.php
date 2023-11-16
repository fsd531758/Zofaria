<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'media' => $this->image ,
            'type'=>$this->file()->first()->type === 'image' ? 'image' : 'video' ,
            'title' => $this->title,
            'description' => $this->description
        ];
    }
}
