<?php

namespace App\Models\User;

use App\Models\Ncmh\Encounter\Encounter;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    protected $table = 'user_profiles';

    protected $fillable = [

        'name_id',

        'info_id',

        'address_id',

        'contact_id',

        'status_id',

        'user_id',

    ];

    public function user_contact()
    {

        return $this->belongsTo(\App\Models\User\UserContact::class, 'id', 'profile_id');
    }

    public function getPatientName()
    {
        return $this->belongsTo(UserName::class, 'name_id', 'name_id');
    }

    public function getPatientInfo()
    {
        return $this->belongsTo(UserInfo::class, 'info_id', 'info_id');
    }

    public function getPatientAddress()
    {
        return $this->belongsTo(UserAddress::class, 'address_id', 'address_id');
    }

    public function getPatientContact()
    {
        return $this->belongsTo(UserContact::class, 'contact_id', 'contact_id');
    }

    public function getPatientStatus()
    {
        return $this->belongsTo(UserStatus::class, 'status_id', 'status_id');
    }

    public function encounter()
    {
        return $this->hasOne(Encounter::class, "patient_id", "name_id");
    }

    //check patient_id if it exist
    public function ScopeCheckPatientExist($query, $patient_id)
    {
        return $query->where('name_id', $patient_id);
    }

    public function scopeCheckLastId($query)
    {

        return $query->orderBy('id', 'desc')->count();
    }
}
