<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUAPackageType extends Model
{
    protected $table = 'mua_package_type';
    
    protected $fillable = [
        'package_id', 'type_id',
    ];
}
