<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUAType extends Model
{
    protected $table = 'mua_type';
    
    protected $fillable = [
        'id', 'type_name',
    ];
}
