<?php

namespace App\Http\Helpers\Ncmh\ConsultationHelper;

use App\Models\Ncmh\Consultation\Consultation;
use Illuminate\Support\Facades\DB;

class ConsultationHelper
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function createConsulatation($encounter_id, $id = null)
    {
        return Consultation::updateOrCreate(
            ["id" => $id],
            [

                "encounter_id" => $encounter_id,
                "date_consultation" => $this->request["date_consultation"],
                "chief_complaint" => $this->request["chief_complaint"],
                "history_present" => $this->request["history_present"],
                "history_past" => $this->request["history_past"],
                "family_history" => $this->request["family_history"],
                "social_history" => $this->request["social_history"],
                "remarks" => $this->request["remarks"]

            ]
        );
    }

    public function request_consultation_list($search = null)
    {
        return DB::table("ncmh_consultations")->select(
            'ncmh_consultations.encounter_id',
            'ncmh_consultations.date_consultation',
            'ncmh_consultations.chief_complaint',
            'ncmh_consultations.history_present',
            'ncmh_consultations.history_past',
            'ncmh_consultations.family_history',
            'ncmh_consultations.social_history',
            'ncmh_consultations.remarks',
            'ncmh_encounters.encounter_date',
            'user_names.name_id',
            'user_names.last_name',
            'user_names.first_name'
        )->join("ncmh_encounters", "ncmh_consultations.encounter_id", "ncmh_encounters.id")->join('user_names', 'ncmh_encounters.patient_id', 'user_names.name_id')
            ->when($search, function ($query, $search) {
                $query->where('user_names.last_name', 'LIKE', "%{$search}%")->orWhere('user_names.first_name', 'LIKE', "%{$search}%");
            })
            ->paginate(1) // if not search display this
            ->appends(['search' => $search]); // if search  
    }
}
