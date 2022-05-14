<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table='ratings';
    
    protected $fillable = [
        'product_id', 'rating', 'user_id', 
    ];
}
