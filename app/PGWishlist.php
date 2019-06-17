<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PGWishlist extends Model
{
    protected $table = 'pg_wishlist';
    protected $primaryKey = 'id_wishlist';
    public $timestamps = true;
    protected $fillable = [
        'user_id','booking_id', 'wl_category', 'wl_details', 'flag',
    ];
}
