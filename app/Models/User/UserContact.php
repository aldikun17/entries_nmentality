<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{

    protected $table = 'user_contacts';

    protected $fillable = [

        'contact_id',

        'email_address',

        'mobile_number'

    ];

    public function client_information()
    {

        return $this->hasOne(App\Models\User\UserClientInformation::class, 'profile_id', 'id');
    }
}
