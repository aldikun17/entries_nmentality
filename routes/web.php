<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Ncmh\ConsultationController;
use App\Http\Controllers\Ncmh\EncounterController;
use App\Http\Controllers\Patient\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware("auth")->group(function () {

    Route::get("/dashboard", [DashboardController::class, "dashboard"])->name("dashboard");

    //patients
    Route::get("/create/patient", [PatientController::class, 'create'])->name("patient.create");
    Route::post("/store/patient", [PatientController::class, 'store'])->name("patient.store");
    Route::get("/edit/patient/{patientId}", [PatientController::class, 'edit'])->name("patient.edit");
    Route::put("/update/patient/{patientId}", [PatientController::class, "update"])->name("patient.update");
    Route::delete("/delete/patient/{patientId}", [PatientController::class, "delete_patient"])->name("patient.delete");
    Route::get("/patients", [PatientController::class, "index"])->name("patient.index");
    Route::get("/patient/{patientId}", [PatientController::class, "show"])->name("patient.show");

    //NCSM encounter and consultation
    Route::get("/patient-encounter/{patient_id}", [EncounterController::class, "create"])->name("encounter");
    Route::post("patient-encounter/store", [EncounterController::class, "store"])->name("encounter.store");

    Route::get("/patient-consultation/{encounter_id}", [ConsultationController::class, "create"])->name("consultation");
    Route::post("patient-consultation/store", [ConsultationController::class, "store"])->name("consultation.store");
    Route::get("/patient-consultation-index", [ConsultationController::class, "index"])->name("consultation.index");
});

require __DIR__ . '/auth.php';
