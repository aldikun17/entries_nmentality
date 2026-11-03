<?php

namespace App\Models\Ncmh\Encounter;

use Illuminate\Database\Eloquent\Model;

class Encounter extends Model{

    protected $table = 'ncmh_encounters';

    protected $fillable = [

        'encounter_no',

        'encounter_date',

        'encounter_type',

        'service_type',

        'patient_id'

    ];

}
