<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model{

    protected $table = 'user_address';

    protected $fillable = [

        'address_id',

        'psgc_region_id',

        'psgc_prov_id',

        'psgc_city_id',

        'psgc_barangay_id',

        'house_no',

        'street_no'


    ];

}
