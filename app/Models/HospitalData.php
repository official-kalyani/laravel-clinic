<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalData extends Model
{
    use HasFactory;
    protected $table = 'hospital_data';

    public function appointment(){
        return $this->hasOne(Appointment::class);
    }
    public function doctordata(){
        return $this->hasOne(DoctorInformation::class);
    }
}
