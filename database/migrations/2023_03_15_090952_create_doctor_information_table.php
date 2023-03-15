<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_information', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('dob');
            $table->string('experience');
            $table->string('docstatus');
            $table->string('designation');
            $table->string('password');
            $table->string('landline');
            $table->string('gender');
            $table->string('profilepic');
            $table->string('licenseno');
            $table->string('about');
            $table->string('degree');
            $table->string('pyear');
            $table->string('speciality');
            $table->string('clinicfee');
            $table->string('commissionfee');
            $table->string('onlinefee');
            $table->string('addrs_name');
            $table->string('state');
            $table->string('street');
            $table->string('full_addrs');
            $table->string('city');
            $table->string('zip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_information');
    }
}
