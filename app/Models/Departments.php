<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $fillable = ["department_name"];

    public function doctors(){
        // ::class=> App\Models\Doctors'ı kısaca tanımlıyor ve buradaki sınıfı getiriyor
        return $this->hasMany(Doctors::class);
    }
}
