<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUADurasi extends Model
{
    protected $table = 'mua_durasi';
    public $timestamps = true;
    protected $fillable = [
        'partner_id','package_id', 'durasi_jam', 'durasi_harga',
    ];
}
