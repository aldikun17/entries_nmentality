<?php

namespace App\Models\Ncmh\Assessment;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model{

    protected $table = 'ncmh_assessments';

    protected $fillable = [

        'assessment',

        'risk_level',

        'suicide_risk',

        'violence_risk',

        'functional_status',

        'assessed_by',

        'assessed_at',

        'remarks',

        'encounter_id '

    ];

}
