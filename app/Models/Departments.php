<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $fillable = ["department_name"];

    public function doctors(){
       
        return $this->hasMany(Doctors::class);
    }
}
