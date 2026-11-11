<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Patients\PatientsHelper;
use App\Models\User\UserName;
use App\Models\User\UserProfile;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private function patient_helper($request = [])
    {

        return new PatientsHelper($request);
    }
    public function index()
    {
        $patient_helper = $this->patient_helper();

        $search = request()->query('search');

        $patients =  $patient_helper->request_patient_list($search);

        return view("Patient.index", compact('patients'));
    }

    public function show($id)
    {
        $patient_helper = $this->patient_helper();
        $patient = $patient_helper->request_patient_edit($id);

        return view("Patient.show", compact("patient"));
    }


    public function create()
    {
        return view("patient.create_patient");
    }

    public function store(Request $request)
    {

        $patient_helper = $this->patient_helper($request->all());

        $patient_helper->createPatient();

        return redirect()->route('patient.index')->with('success', 'Client Successfully Created');
    }

    public function edit($id)
    {
        $patient_helper = $this->patient_helper();

        $patient = $patient_helper->request_patient_edit($id);

        return view("Patient.edit", compact("patient"));
    }

    public function update(Request $request, $id)
    {
        $patient_helper = $this->patient_helper($request->all());
        $patient_helper->createPatient($id);

        return redirect()->route("dashboard");
    }


    public function delete_patient($id)
    {
        $patient_helper =  $this->patient_helper();

        $patient_helper->patient_delete($id);
        return redirect()->route("patient.index")->with("success", "Deleted.");
    }
}
