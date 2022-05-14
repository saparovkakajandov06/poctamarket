<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adblocks extends Model
{
    protected $table = 'adblocks';

    protected $fillable = [
        'img', 'sort_order',
        'title', 'link'
    ];
}
