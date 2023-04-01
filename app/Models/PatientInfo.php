<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientInfo extends Model
{
    use HasFactory;
    public function cityname(){
        return $this->belongsTo(StateCity::class,'city');
    }
    public function statename(){
       return $this->belongsTo(State::class,'state');
    }
}
