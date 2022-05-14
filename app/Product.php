<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name_tk',
        'name_ru',
        'name_en',
        'code',
        'price',
        'discount',
        'status',
        'new',
        'recommended',
        'availability',
        'brand',
        'description_tk',
        'category_id',
        'img',
    ];

    /*  protected $appends = [
  //        'is_compared',
          'is_wishlist'
      ];

      protected $casts = [
  //        'is_compared' => 'boolean',
          'is_wishlist' => 'boolean',
      ];*/


    /*public function getIsWishlistAttribute()
    {
        $products = session('wishlist.products') ?? collect();
        return $products->contains($this->id);
    }*/

//    public function scopeNew($query)
//    {
//        return $query->where('new', 1);
//    }
//
//    public function scopeRecommended($query)
//    {
//        return $query->where('recommended', 1);
//    }
//
//    public function scopeStatus($query)
//    {
//        return $query->where('status', 1);
//    }
//
//    public function setNewAttribute($value)
//    {
//        $this->attributes['new'] = $value === 'on' ? 1 : 0;
//    }
//
//    public function setRecommendedAttribute($value)
//    {
//        $this->attributes['recommended'] = $value === 'on' ? 1 : 0;
//    }
//
//    public function setStatusAttribute($value)
//    {
//        $this->attributes['status'] = $value === 'on' ? 1 : 0;
//    }
//
//    public function New()
//    {
//        return $this->new === 1;
//    }
//
//    public function Recommended()
//    {
//        return $this->recommended === 1;
//    }
//
//    public function Status()
//    {
//        return $this->status === 1;
//    }
//
//

    public function getIsWishlistAttribute()
    {
        $products = session('wishlist.products') ?? collect();
        return $products->contains($this->id);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category','category_product');
    }

    public function category_product(){
        return $this->hasMany(Category_Product::class);
    }

    public function colors() {
        return $this->belongsToMany('App\Color','color_product');
    }

    public function ratings() {
        return $this->hasMany('App\Rating');
    }

    public function getStarRating() {
        $count = $this->ratings()->count();

        if(empty($count)) {return 0;}

        $starCountSum = $this->ratings()->sum('rating');
        $average = $starCountSum / $count;
        return $average;
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function otzyws() {
        return $this->hasMany('App\Otzyw');
    }

    public function eksklyuziws() {
        return $this->hasMany('App\Eksklyuziw');
    }

    public function soobshits() {
        return $this->hasMany('App\Soobshit');
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}



//<?php
//
//namespace App;
//
//use Illuminate\Database\Eloquent\Model;
//
//class Product extends Model
//{
//    protected $table = 'products';
//
//    protected $fillable = [
//        'name_tk',
//        'code',
//        'price',
//        'discount',
//        'availability',
//        'brand',
//        'description_tk',
//        'new',
//        'recommended',
//        'status',
//        'category_id',
//        'img',
//    ];
//
//  /*  protected $appends = [
////        'is_compared',
//        'is_wishlist'
//    ];
//
//    protected $casts = [
////        'is_compared' => 'boolean',
//        'is_wishlist' => 'boolean',
//    ];*/
//
//
//    /*public function getIsWishlistAttribute()
//    {
//        $products = session('wishlist.products') ?? collect();
//        return $products->contains($this->id);
//    }*/
//
//    public function scopeNew($query)
//    {
//        return $query->where('new', 1);
//    }
//
//    public function scopeRecommended($query)
//    {
//        return $query->where('recommended', 1);
//    }
//
//    public function scopeStatus($query)
//    {
//        return $query->where('status', 1);
//    }
//
//    public function setNewAttribute($value)
//    {
//        $this->attributes['new'] = $value === 'on' ? 1 : 0;
//    }
//
//    public function setRecommendedAttribute($value)
//    {
//        $this->attributes['recommended'] = $value === 'on' ? 1 : 0;
//    }
//
//    public function setStatusAttribute($value)
//    {
//        $this->attributes['status'] = $value === 'on' ? 1 : 0;
//    }
//
//    public function New()
//    {
//        return $this->new === 1;
//    }
//
//    public function Recommended()
//    {
//        return $this->recommended === 1;
//    }
//
//    public function Status()
//    {
//        return $this->status === 1;
//    }
//
//    public function categories()
//    {
//        return $this->belongsToMany('App\Category','category_product');
//    }
//
//    public function category_product(){
//        return $this->hasMany(Category_Product::class);
//    }
//
//    public function colors() {
//        return $this->belongsToMany('App\Color','color_product');
//    }
//
//    public function ratings() {
//        return $this->hasMany('App\Rating');
//    }
//
//    public function getStarRating() {
//        $count = $this->ratings()->count();
//
//        if(empty($count)) {return 0;}
//
//        $starCountSum = $this->ratings()->sum('rating');
//        $average = $starCountSum / $count;
//        return $average;
//    }
//
//    public function reviews() {
//        return $this->hasMany('App\Review');
//    }
//
//    public function otzyws() {
//        return $this->hasMany('App\Otzyw');
//    }
//
//    public function eksklyuziws() {
//        return $this->hasMany('App\Eksklyuziw');
//    }
//
//    public function soobshits() {
//        return $this->hasMany('App\Soobshit');
//    }
//
//    public function wishlist(){
//        return $this->hasMany(Wishlist::class);
//    }
//}
