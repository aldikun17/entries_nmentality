<?php

namespace App\Models\Ncmh\Prescription;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model {

    protected $table = 'ncmh_prescriptions';

    protected $fillable = [

        'encounter_id',

        'prescription',

        'date_prescribed',

        'remarks'


    ];

}
