<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obraz extends Model
{
    protected $table = 'obrazs';

    protected $fillable = [
        'img','title'
    ];
}
