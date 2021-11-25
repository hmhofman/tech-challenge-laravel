<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'id',
        'uid',
        'city',
        'street_name',
        'street_address',
        'secondary_address',
        'building_number',
        'mail_box',
        'community',
        'zip_code',
        'zip',
        'postcode',
        'time_zone',
        'street_suffix',
        'city_suffix',
        'city_prefix',
        'state',
        'state_abbr',
        'country',
        'country_code',
        'latitude',
        'longitude',
        'full_address'
    ];
}
