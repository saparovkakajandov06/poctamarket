<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminSliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'img' => asset($this->img),
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'slider_id' => $this->slider_id,
            'is_shown' => $this->is_shown,
            'sort_order' => $this->sort_order,
        ];
    }
}
