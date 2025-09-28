<?php

namespace App\Http\Controllers;


use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index()
    {
        $patients = Patients::all();
        return view('patients.index', compact('patients'));
    }

    public function create(){
        return view("patients.create");
    }

    public function store(){
        $data=request()->all();
        Patients::create($data);
        return redirect()->route("patients.index");
    }

    public function edit($id){
        $patient=Patients::FindOrFail($id);
        return view("patients.edit",compact("patient"));
    }

    public function update($id){
        $data=request()->all();
        $patient=Patients::FindOrFail($id);
        $patient->update($data);
        return redirect()->route("patients.index");
    }

    public function destroy($id){
        $patient=Patients::FindOrFail($id);
        $patient->delete();
        return redirect()->route("patients.index");
    }
}
