<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUAWishlist extends Model
{
    protected $table = 'mua_wishlist';
    protected $primaryKey = 'id_wishlist';
    public $timestamps = true;
    protected $fillable = [
        'user_id','booking_id', 'wl_category', 'wl_details', 'flag',
    ];
}
