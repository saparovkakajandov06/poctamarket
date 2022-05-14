<?php

namespace App\Http\Resources;

use App\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $product = Product::find($this->id);

        return [
            'id' => $this->id,
            'name_tk' => $product->name_tk,
            'price' => $product->price,
            'amount' => $this->amount,
            'img' => asset('images/products/little/' . $this->json_decode($product->img)->main),
        ];
    }
}
