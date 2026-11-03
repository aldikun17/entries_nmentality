<?php

namespace App\Models\Ncmh\Consultation;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model{

    protected $table = 'ncmh_consultations';

    protected $fillable = [

        'encounter_id ',

        'date_consultation',

        'chief_complaint',

        'history_present',

        'history_past',

        'family_history',

        'social_history',

        'remarks'


    ];

}
