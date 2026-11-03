<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model{

    protected $table = 'user_profiles';

    protected $fillable = [

        'name_id',

        'info_id',

        'address_id',

        'contact_id',

        'status_id',

        'user_id',

    ];

    public function user_contact(){

        return $this->belongsTo(\App\Models\User\UserContact::class,'id','profile_id');

    }

    public function scopeCheckLastId($query){

        return $query->orderBy('id','desc')->count();

    }

}
