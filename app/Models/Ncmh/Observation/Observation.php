<?php

namespace App\Models\Ncmh\Observation;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model{

    protected $table = 'ncmh_observations';

    protected $fillable = [

        'encounter_id',

        'observation_type',

        'observation_value',

        'unit',

        'observation_date',

        'observed_by',

        'observed_behavior',

        'observed_physical',

        'observed_progess',

        'remarks',

    ];

}
