<?php

namespace App\Http\Resources;

use App\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        $image_row = json_decode($this->img, true);
        $image = $image_row['main'];
        unset($image_row['main']);
        $images = [];
        foreach($image_row as $image => $value) {
            array_push($images, asset('images/products/big/' . $value));
        }

        return [
            'id' => $this->id,
            'name' => [
                'tk' => $this->name_tk,
                'ru' => $this->name_ru,
                'en' => $this->name_en
            ],
            'code' => $this->code,
            'price' => $this->price ?? '0.00',
            'discount_price' => $this->discount,
            'availability' => $this->availability,
            'brand' => $this->brand,
            'description' => [
                'en' => $this->description_en,
                'ru' => $this->description_ru,
                'tk' => $this->description_tk,
            ],
            'new' => $this->new,
            'recommended' => $this->recommended,
            'status' => $this->status,
            'images' => [
                // "image" => asset('images/products/big/' . ($this->img ?  $image  : '/sorag-jogap.png')),
                "image" => asset('images/products/big/' . ($this->img ?  json_decode($this->img, true)['main']  : '/sorag-jogap.png')),
                "all_images" => $this->img ? $images : []
            ],
            'category_product' => CategoryResource::collection($this->whenLoaded('category_product'))
        ];
    }
}