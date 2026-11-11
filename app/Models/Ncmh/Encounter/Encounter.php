<?php

namespace App\Models\Ncmh\Encounter;

use App\Models\Ncmh\Consultation\Consultation;
use App\Models\User\UserProfile;
use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{

    protected $table = 'ncmh_encounters';

    protected $fillable = [

        'encounter_no',

        'encounter_date',

        'encounter_type',

        'service_type',

        'patient_id'

    ];

    public function ScopeCheckEncounterExist($query, $encounter_id)
    {
        return $query->where("id", $encounter_id);
    }

    public function consultation()
    {
        return $this->hasOne(Consultation::class, "encounter_id", "id");
    }

    public function patient()
    {
        return $this->belongsTo(UserProfile::class, "patient_id", "name_id");
    }
}
