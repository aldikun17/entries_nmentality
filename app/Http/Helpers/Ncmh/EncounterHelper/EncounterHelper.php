<?php

namespace App\Http\Helpers\Ncmh\EncounterHelper;

use App\Models\Ncmh\Encounter\Encounter;
use Illuminate\Support\Str;

class EncounterHelper
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function createEncounter($patient_id, $id = null)
    {
        $encounter_no = "enc_no-" . strtoupper(Str::random(10));

        return Encounter::updateOrCreate(
            ["id" => $id],
            [

                "patient_id" => $patient_id,
                "encounter_no" => $encounter_no,
                "encounter_date" => $this->request["encounter_date"],
                "encounter_type" => $this->request["encounter_type"],
                "service_type" => $this->request["service_type"],

            ]
        );
    }
}
