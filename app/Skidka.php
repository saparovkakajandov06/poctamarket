<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skidka extends Model
{
    protected $table = 'skidkas';

    protected $fillable = [
        'name',
        'img',
    ];
}
