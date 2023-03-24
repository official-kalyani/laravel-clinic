<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorInformation extends Model
{
    use HasFactory;
    public function appointmentdata(){
        return $this->hasOne(Appointment::class);
    }
    public function hospitalname(){
        return $this->belongsTo(HospitalData::class);
    }

}
