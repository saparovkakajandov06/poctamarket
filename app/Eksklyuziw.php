<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eksklyuziw extends Model
{
    protected $table = 'eksklyuziws';

    public function product() {
        return $this->belongsTo('App\Product','product_id');
    }
}
