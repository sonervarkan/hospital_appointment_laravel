<?php

namespace App\Http\Controllers;

use App\Models\Times;
use Illuminate\Http\Request;


class TimesController extends Controller{

    public function index(){
        $times = Times::all();
        return view('times.index', compact('times'));
    }

    public function create(){
        return view("times.create");
    }

    public function store(Request $request){
        $data = $request->all();
        Times::create($data);
        return redirect()->route("times.index");
    }

    public function edit($id){
        $time = Times::FindOrFail($id);
        return view("times.edit", compact("time"));
    }

    public function update($id){
        $data = request()->all();
        $time = Times::FindOrFail($id);
        $time->update($data);
        return redirect()->route("times.index");
    }

    public function destroy($id){
        $time = Times::FindOrFail($id);
        $time->delete();
        return redirect()->route("times.index");
    }
}
