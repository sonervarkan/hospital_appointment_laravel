<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable =["patient_name", "patient_surname", "patient_tc_no"];

    public function appointments(){
        return $this->hasMany(Appointments::class);
    }
}
