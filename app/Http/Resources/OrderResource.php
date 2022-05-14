<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CartResource as CartResource;

class OrderResource extends JsonResource

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
            'user_name' => $this->user_surname,
            'user_phone' => $this->user_phone,
            'email' => $this->email,
            'user_id' => $this->user_id,
            // 'products' => ProductResource::collection($this->products),
            'total_price' => $this->total_price,
            'status' => $this->status,
            'comments' => $this->comments,
            'delivery' => $this->delivery,
            'delivery_sum' => $this->delivery_sum,
            'paymenttype' => $this->paymenttype,
            'online_payment' => $this->online_payment,
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
