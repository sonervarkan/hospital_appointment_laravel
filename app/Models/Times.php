<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Times extends Model
{
    protected $fillable=["appointment_hour"];

    public function appointments(){
        return $this->hasMany(Appointments::class);
    }
}
