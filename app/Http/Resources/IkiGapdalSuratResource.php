<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IkiGapdalSuratResource extends JsonResource
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
            'img' => asset('images/slider/' . $this->img),
            'is_shown' => $this->is_shown,
            'sort_order' => $this->sort_order,
            'title' => $this->title,
            'link' => $this->link,
        ];
    }
}
