<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otzyw extends Model
{
    protected $table = 'otzyws';

    protected $fillable = [
        'otzyw'
    ];

    public function product() {
        return $this->belongsTo('App\Product','product_id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
}
