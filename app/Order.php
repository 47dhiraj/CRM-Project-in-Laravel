<?php

namespace App;

use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    
    use SoftDeletes;
    protected $dates = ['deleted_at']; 


    protected $fillable= [
        'status', 'note', 'user_id'
    ];



    /** 
     * Yo chai user table sanga realtionship dekhaune function ho
     * 
    */
    public function user()
    {
        return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo( Product::class);
        // return $this->belongsTo( Product::class, 'product_id', 'id');
    }

}
