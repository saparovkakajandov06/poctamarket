<?php

namespace App\Http\Resources;

use App\Category_Product;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'id' => $this->id,
            'name' => [
                'en' => $this->name_en,
                'ru' => $this->name_ru,
                'tk' => $this->name_tk
            ],
            'sort_order' => $this->sort_order,
            'status' => $this->status,
            'category_id' => Category_ProductResource::collection($this->whenLoaded('category_id')),
            'has_children' => CategoryResource::collection($this->whenLoaded('has_children')),
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}