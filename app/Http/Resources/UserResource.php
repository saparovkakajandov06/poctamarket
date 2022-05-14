<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public static $wrap = null;
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
          'login' => $this->login,
          'name' => $this->name,
          'surname' => $this->surname,
          'middlename' => $this->middlename,
          'birthday' => $this->birthday,
          'address' => $this->address,
          'phone' => $this->phone,
          'email' => $this->email,
          'role' => $this->role,
            'orders' => OrderResource::collection($this->whenLoaded('orders'))
        ];
    }
}
