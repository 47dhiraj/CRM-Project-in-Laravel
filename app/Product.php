<?php

namespace App;

use App\Tag;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    //
    protected $fillable= [
        'name', 'price', 'category', 'description'
    ];

    /** 
     * Yo chai order table sanga realtionship dekhaune function ho
     * 
    */
    public function order()
    {
        return $this->hasMany(Order::class);   
        // return $this->hasMany( Order::class, 'order_id', 'id');
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();   
        // return $this->belongsToMany(Tag::class, 'product_tag')->withTimestamps();
        //return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id')->withTimestamps();
    }

}
