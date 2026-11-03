<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model{

    protected $table = 'user_infos';

    protected $fillable = [

        'info_id',

        'gender',

        'dob',

        'age',

        'occupation',

        'civil_status',

        'education'

    ];

}
