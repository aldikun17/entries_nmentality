<?php

namespace App\Http\Controllers\Ncmh;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Ncmh\ConsultationHelper\ConsultationHelper;
use App\Models\Ncmh\Consultation\Consultation;
use App\Models\Ncmh\Encounter\Encounter;
use App\Models\User\UserName;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    private function consultation_helper($request = [])
    {
        return new ConsultationHelper($request);
    }

    public function create($encounter_id)
    {

        $encounter = Encounter::CheckEncounterExist($encounter_id)->first();

        if ($encounter) {
            return view("Ncmh.consultation.consultation_create", compact("encounter"));
        }
    }

    public function store(Request $request)
    {
        $consultation_helper = $this->consultation_helper($request->all());

        $consultation_helper->createConsulatation($request->input("encounter_id"));

        return redirect()->route("patient.index")->with("success", "consultation created");
    }

    public function index()
    {
        $consultation_helper = $this->consultation_helper();

        $search = request()->query('search');

        $consultations = $consultation_helper->request_consultation_list($search);

        return view("Ncmh.consultation.index", compact("consultations"));
    }
}
