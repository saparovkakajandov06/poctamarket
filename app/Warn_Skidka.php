<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warn_Skidka extends Model
{

    protected $table = "warns";

    protected $fillable = [
      'category_id', 'prosent', 'img'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
}
