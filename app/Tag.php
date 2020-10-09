<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable= [
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();   
        // return $this->belongsToMany( Product::class, 'product_tag')->withTimestamps();
        //return $this->belongsToMany(Product::class, 'product_tag', 'tag_id', 'product_id')->withTimestamps();
    }


}
