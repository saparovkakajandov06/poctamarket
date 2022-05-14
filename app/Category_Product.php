<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_Product extends Model
{
    protected $table = 'category_product';

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

}
