<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IkiGapdalSurat extends Model
{
    protected $table = 'iki_gapdal_surats';

    protected $fillable = [
        'img', 'sort_order',
        'title', 'link'
    ];
}
