<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    protected $fillable = [
        'size'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product','size_product');
    }
}
