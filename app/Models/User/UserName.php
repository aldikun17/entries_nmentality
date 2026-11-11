<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserName extends Model
{

    protected $table = 'user_names';

    protected $fillable = [

        'name_id',

        'first_name',

        'last_name',

        'middle_name',

        'suffix',

        'title'

    ];
}
