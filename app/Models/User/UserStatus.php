<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model{

    protected $table = 'patient_status';

    protected $fillable = [

        'user_id',

        'patient_class'

    ];

}
