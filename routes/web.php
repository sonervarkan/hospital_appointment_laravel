<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\TimesController;
use App\Http\Controllers\AppointmentsController;

Route::resource("departments", DepartmentsController::class);
Route::resource("doctors", DoctorsController::class);
Route::resource("patients", PatientsController::class);
Route::resource("times", TimesController::class);
Route::resource("appointments", AppointmentsController::class);


Route::get('/appointments/get-doctors/{department_id}', [AppointmentsController::class, 'getDoctors']);
Route::get('/appointments/get-times/{doctor_id}/{appointment_date}', [AppointmentsController::class, 'getTimes'])->name('appointments.getTimes');


Route::get('/', function () {
    return view('welcome');
})->name('welcome');
