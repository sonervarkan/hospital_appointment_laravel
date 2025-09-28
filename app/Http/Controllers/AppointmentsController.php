<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Departments;
use App\Models\Doctors;
use App\Models\Patients;
use App\Models\Times;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index(){
        $appointments=Appointments::all();
        return view("appointments.index", compact("appointments"));
    }

    public function create(){
        $departments = Departments::all();
        $times = Times::all();
        $doctors=Doctors::all();
        return view("appointments.create", compact("departments",  "times", "doctors"));
    }

    public function store(){
        $data = request()->all();
        $patient=Patients::create($data);
        $data['patient_id'] = $patient->id;
        Appointments::create($data);
        return redirect()->route("appointments.index");
    }

    public function getDoctors($department_id){
        $doctors = Doctors::where("department_id", $department_id)->get();
        return response()->json($doctors);
    }

    public function getTimes($doctor_id, $appointment_date)
    {
        $bookedTimes = Appointments::where('doctor_id', $doctor_id)
            ->whereDate('appointment_date', $appointment_date)
            ->pluck('time_id')
            ->toArray();

        $times=Times::all();

        // Dolu olanları işaretle
        foreach ($times as $time) {
            $time->booked = in_array($time->id, $bookedTimes);
        }

        return response()->json($times);
    }

    public function edit($id)
    {
        $appointment = Appointments::with('patient')->findOrFail($id);
        $departments = Departments::all();
        $doctors = Doctors::all();
        $times = Times::all();

        return view("appointments.edit", compact("appointment", "departments", "doctors", "times"));
    }

    public function update($id)
    {
        $data = request()->all();
        $appointment = Appointments::findOrFail($id);

        // Önce patient'i güncelle
        $patient = $appointment->patient;
        $patient->update([
            'patient_name' => $data['patient_name'],
            'patient_surname' => $data['patient_surname'],
            'patient_tc_no' => $data['patient_tc_no'],
        ]);

        // Appointment'i güncelle
        $appointment->update([
            'department_id'    => $data['department_id'],
            'doctor_id'        => $data['doctor_id'],
            'appointment_date' => $data['appointment_date'],
            'time_id'          => $data['time_id'],
        ]);

        return redirect()->route("appointments.index");
    }

    public function destroy($id){
        $appointment=Appointments::FindOrFail($id);
        $appointment->delete();
        return redirect()->route("appointments.index");
    }
}
