<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable=["appointment_date", "patient_id", "doctor_id", "time_id"];

    public function patient(){
        return $this->belongsTo(Patients::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctors::class);
    }

    public function time(){
        return $this->belongsTo(Times::class);
    }

}
