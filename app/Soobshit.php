<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soobshit extends Model
{
    protected $table = 'soobshits';

    public function product() {
        return $this->belongsTo('App\Product','product_id');
    }
}
