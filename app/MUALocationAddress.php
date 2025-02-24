<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUALocationAddress extends Model
{
    protected $table = 'mua_location_address';
    protected $primaryKey = 'id_booking_address';
    public $timestamps = true;
    protected $fillable = [
        'user_id','booking_id', 'loc_addr', 'loc_prov',
        'loc_kota','loc_kel', 'loc_kec', 'loc_postal_code', 'flag',
    ];
}
