<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    protected $fillable = [
        'color','color_tk'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product','color_product');
    }
}
