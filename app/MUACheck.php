<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUACheck extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'mua_booking_check';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at', 'booking_date'];
    
    protected $fillable = [
        'partner_id',
        'package_id',
        'booking_date',
        'kuantitas',
        'user_id',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
