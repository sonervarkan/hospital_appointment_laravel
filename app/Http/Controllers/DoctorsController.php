<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Departments;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Doctors::all();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Departments::all();
        return view('doctors.create', compact('departments'));
    }

    public function store()
    {
        $data=request()->all();
        Doctors::create($data);
        return redirect()->route("doctors.index");
    }

    public function edit($id)
    {
        $doctor=Doctors::FindOrFail($id);
        $departments = Departments::all();
        return view('doctors.edit', compact('doctor', 'departments'));
    }

    public function update($id)
    {
        $data=request()->all();
        $doctor=Doctors::FindOrFail($id);
        $doctor->update($data);
        return redirect()->route("doctors.index");
    }

    public function destroy($id)
    {
        $doctor = Doctors::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctors.index');
    }
}
