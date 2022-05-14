<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    protected $fillable = [
        'name_tk',
        'sort_order','status', 'category_id',
        'has_children'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product','category_product');
    }

    public function category_product(){
        return $this->hasMany(Category_Product::class,'category_id');
    }


    public function warn_skidka()
    {
        return $this->belongsTo('App\Warn_Skidka');
    }

    public function getAllChildren()
    {
        $sections = collect();

        foreach ($this->childrenCategories as $section) {
            $sections->push($section);
            $sections = $sections->merge($section->getAllChildren());
        }

        return $sections;
    }
}