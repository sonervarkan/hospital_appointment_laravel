<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $fillable = ["doctor_name_surname", "department_id"];

    public function department(){
        return $this->belongsTo(Departments::class);
    }

    public function appointments(){
        return $this->hasMany(Appointments::class);
    }
}
