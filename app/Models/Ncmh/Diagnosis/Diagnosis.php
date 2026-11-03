<?php

namespace App\Models\Ncmh\Diagnosis;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model{

    protected $table = 'ncmh_diagnosis';

    protected $fillable = [

        'encounter_id',

        'icd10_code',

        'diagnosis_name',

        'diagnosis_type',

        'diagnostic_status',

        'diagnosed_by',

        'diagnosed_at',

        'remarks'

    ];



}
