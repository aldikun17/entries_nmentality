<?php

namespace App\Http\Helpers\Patients;

use App\Models\User;
use App\Models\User\UserAddress;
use App\Models\User\UserContact;
use App\Models\User\UserInfo;
use App\Models\User\UserName;
use App\Models\User\UserProfile;
use App\Models\User\UserStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientsHelper
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function DataNames($name_id)
    {
        return UserName::updateOrCreate(
            ["name_id" => $name_id],
            [

                "first_name" => $this->request["first_name"],
                "last_name" => $this->request["last_name"],
                "middle_name" => $this->request["middle_name"],
                "suffix" => $this->request["suffix"],
                "title" => $this->request["title"]

            ]
        );
    }

    public function DataInfos($info_id)
    {

        return UserInfo::updateOrCreate(
            ["info_id" => $info_id],
            [

                "gender" => $this->request["gender"],
                "dob" => $this->request["dob"],
                "age" => $this->request["age"],
                "civil_status" => $this->request["civil_status"],
                "occupation" => $this->request["occupation"],
                "education" => $this->request["education"]
            ]
        );
    }

    public function DataContact($contact_id)
    {

        return UserContact::updateOrCreate(
            ["contact_id" => $contact_id],
            [


                "email_address" => $this->request["email_address"],
                "mobile_number" => $this->request["mobile_number"],
            ]
        );
    }

    public function DataAddress($address_id)
    {

        return UserAddress::updateOrCreate(
            ["address_id" => $address_id],
            [

                "psgc_region_id" => $this->request["psgc_region_id"],
                "psgc_prov_id" => $this->request["psgc_prov_id"],
                "psgc_city_id" => $this->request["psgc_city_id"],
                "psgc_barangay_id" => $this->request["psgc_barangay_id"],
                "full_address" => $this->request["full_address"]
            ]
        );
    }
    public function DataStatus($status_id)
    {
        return UserStatus::updateOrCreate(
            ["status_id" => $status_id],
            [

                "patient_class" => $this->request["patient_class"],
            ]
        );
    }

    protected function patientInformation($patient_id)
    {

        return UserProfile::updateOrCreate(
            ['name_id'                        => $patient_id,],
            [
                'info_id'                        => $patient_id,

                'address_id'                     => $patient_id,

                'contact_id'                   => $patient_id,

                'status_id'                       =>  $patient_id,

                'user_id'                           => Auth::user()->id

            ]
        );
    }



    public function createPatient($id = null)
    {
        //create if not exist(id) zehaha
        if (empty($id)) {
            $profile  = UserProfile::select('id')->orderBy('id', 'desc')->first(); //Look at the last inserted row in user_profiles
            $patient_id = $profile ? ($profile->id + 1) : 1; //If records exist, add 1. If empty, start at 1.
            $this->patientInformation($patient_id);
            $DataNames             = $this->DataNames($patient_id);

            $DataInfos             = $this->DataInfos($patient_id);

            $DataAddress          = $this->DataAddress($patient_id);

            $DataContact          = $this->DataContact($patient_id);

            $DataStatus          = $this->DataStatus($patient_id);
        } else {
            //update if exist
            /*
            to know eaxtcly what to update?? because we update data 
            with different table at once so linked them like that passed the patient id will do it
            */
            $this->patientInformation($id, $id);
            $DataNames             = $this->DataNames($id, $id);

            $DataInfos             = $this->DataInfos($id, $id);

            $DataAddress          = $this->DataAddress($id, $id);

            $DataContact          = $this->DataContact($id, $id);

            $DataStatus          = $this->DataStatus($id, $id);
        }
    }


    public function request_patient_edit($id)
    {

        return UserProfile::where('name_id', $id)
            ->with('getPatientName')
            ->with('getPatientInfo')
            ->with('getPatientContact')
            ->with('getPatientAddress')
            ->with('getPatientStatus')->first();
    }

    public function patient_delete($id)
    {
        /*
        $patient = UserProfile::with([
            "user_names",
            "user_infos",
            "user_contacts",
            "user_address",
            "user_status"
        ]);

        if ($patient) $patient->delete();
        */

        $patient = UserProfile::where('name_id', $id)
            ->with('getPatientName')
            ->with('getPatientInfo')
            ->with('getPatientContact')
            ->with('getPatientAddress')
            ->with('getPatientStatus')->first();

        if ($patient) {

            // delete all the informations
            if ($patient->getPatientName()) $patient->getPatientName()->delete();
            if ($patient->getPatientInfo())  $patient->getPatientInfo()->delete();
            if ($patient->getPatientContact()) $patient->getPatientContact()->delete();
            if ($patient->getPatientAddress()) $patient->getPatientAddress()->delete();
            if ($patient->getPatientStatus())  $patient->getPatientStatus()->delete();

            //delete the main patient
            $patient->delete();
        }
    }

    public function request_patient_list($search = null)
    {
        return DB::table("user_profiles")->select(
            "user_profiles.name_id",
            "user_infos.info_id",
            "user_names.last_name",
            "user_names.first_name",
            "user_names.middle_name",
            "user_infos.occupation",
            "user_infos.gender",
            "user_infos.age",
            "user_contacts.mobile_number",
            "user_contacts.email_address",
            "user_address.full_address",
            "patient_status.patient_class"
        )->join("user_names", "user_profiles.name_id", "user_names.name_id")
            ->join("user_infos", "user_profiles.info_id", "user_infos.info_id")
            ->join("user_contacts", "user_profiles.contact_id", "user_contacts.contact_id")
            ->join("user_address", "user_profiles.address_id", "user_address.address_id")
            ->join("patient_status", "user_profiles.status_id", "patient_status.status_id")->when($search, function ($query, $search) {
                $query->where('user_names.last_name', 'LIKE', "%{$search}%")->orWhere('user_names.first_name', 'LIKE', "%{$search}%");
            })
            ->paginate(1) // if not search display this
            ->appends(['search' => $search]); // if search  
    }


    public function request_patient_name($id)
    {
        return UserProfile::where('name_id', $id)
            ->with('getPatientName')
            ->with('getPatientInfo')->first();
    }
}
