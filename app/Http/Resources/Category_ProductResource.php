<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category_ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

            return [

                'categories' => CategoryResource::collection($this->whenLoaded('categories')),
                'products' => ProductResource::collection($this->whenLoaded('products'))

            ];
    }
}
