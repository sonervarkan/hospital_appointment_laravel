<?php

namespace App\Http\Controllers;

use App\Models\Departments;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Departments::all();
        return view('departments.index', compact('departments'));
    }

    public function create(){
        return view("departments.create");
    }

    public function store(){
        $data=request()->all();
        Departments::create($data);
        return redirect()->route("departments.index");
    }

    public function edit($id){
        $department=Departments::FindOrFail($id);
        return view("departments.edit",compact("department"));
    }

    public function update($id){
        $data=request()->all();
        $department=Departments::FindOrFail($id);
        $department->update($data);
        return redirect()->route("departments.index");
    }

    public function destroy($id){
        $department=Departments::FindOrFail($id);
        $department->delete();
        return redirect()->route("departments.index");
    }
}
