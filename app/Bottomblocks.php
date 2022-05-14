<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bottomblocks extends Model
{
    protected $table = 'bottomblocks';

    protected $fillable = [
        'img', 'sort_order',
        'title', 'link'
    ];
}
