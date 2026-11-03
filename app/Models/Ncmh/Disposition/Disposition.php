<?php

namespace App\Models\Ncmh\Disposition;

use Illuminate\Database\Eloquent\Model;

class Disposition extends Model{

    protected $table = 'ncmh_dispositions';

    protected $fillable = [

        'encounter_id',

        'disposition_type',

        'disposition_date',

        'referred_to',

        'referred_by',

        'follow_up_date',

        'instructions',

        'admitted',

        'disposition_notes',

        'remarks'


    ];

}
