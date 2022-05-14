<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_name','user_phone','comments','products',
        'user_surname','email',
        'user_id','delivery',
        'total_price', 'online_payment', 'desc',
    ];

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    
}
