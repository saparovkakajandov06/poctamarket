<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pocta extends Model
{
    protected $table = 'poctas';

    protected $fillable = [
       'email'
    ];
}
