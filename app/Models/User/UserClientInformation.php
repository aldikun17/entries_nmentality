<?php

namespace App\Models\User;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserClientInformation extends Model{

    protected $table = 'user_client_tokens';

    protected $fillable = [
        'profile_id',
        'client_id',
        'plainSecret',
        'state',
        'authCode',
        'callback',
        'redirect'
    ];

    public function user(){

        return $this->belongsTo(User::class,'id','profile_id');

    }



}
