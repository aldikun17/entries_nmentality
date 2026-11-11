<?php

namespace App\Http\Controllers\Ncmh;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Ncmh\EncounterHelper\EncounterHelper;
use App\Models\User\UserProfile;
use Illuminate\Http\Request;

class EncounterController extends Controller
{

    private function encounter_helper($request)
    {
        return new EncounterHelper($request);
    }

    public function create($id)
    {

        $patient = UserProfile::CheckPatientExist($id)->first();

        if ($patient) {
            return view("Ncmh.encounter.create_encounter", compact("patient"));
        }
    }

    public function store(Request $request)
    {
        $encounter_helper = $this->encounter_helper($request->all());

        $encounter = $encounter_helper->createEncounter($request->input("patient_id"));

        return redirect()->route("consultation", $encounter->id)->with("success", "Encounter create");
    }
}
