<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Huge extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'ip_address'
    ];
}
