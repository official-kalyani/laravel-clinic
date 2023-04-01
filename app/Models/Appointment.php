<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public function doctorname(){
        return $this->belongsTo(DoctorInformation::class,'doctor_id');
    }
    public function hospitaldata(){
        return $this->belongsTo(HospitalData::class,'hospital_id');
    }
    public function patientdata(){
        return $this->belongsTo(PatientInfo::class,'patient_id');
    }
}
