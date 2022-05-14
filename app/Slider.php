<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';

    protected $fillable = [
        'img','title','sort_order',
        'description','is_shown','slider_id','url'
    ];
}
