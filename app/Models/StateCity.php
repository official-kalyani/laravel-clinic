<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateCity extends Model
{
   // This model stores city details and is dependent on state model
    use HasFactory;
     public function state(){
        return $this->belongsTo(State::class);
     }
}
