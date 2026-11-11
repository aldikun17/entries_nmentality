<?php

use App\Http\Controllers\Auth\AuthenticatableController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get("/registration", [RegistrationController::class, "register"])->name("register");

    Route::post("/register", [RegistrationController::class, "register_store"])->name("register.store");

    Route::get("/login", [AuthenticatableController::class, "login"])->name("login");

    Route::middleware('throttle:login')->post("/loggedin", [AuthenticatableController::class, "login_store"])->name("login.store");
});


Route::middleware("auth")->group(function () {
    Route::post("/logout", [AuthenticatableController::class, 'logout'])->name("logout");
});
