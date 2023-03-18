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
            $table->string('hospital_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('dob')->nullable();
            $table->string('experience')->nullable();
            $table->string('docstatus')->nullable();
            $table->string('designation')->nullable();
            $table->string('password');
            $table->string('landline')->nullable();
            $table->string('gender')->nullable();
            $table->string('profilepic')->nullable();
            $table->string('licenseno')->nullable();
            $table->string('about')->nullable();
            $table->string('degree')->nullable();
            $table->string('pyear')->nullable();
            $table->string('speciality')->nullable();
            $table->string('clinicfee')->nullable();
            $table->string('commissionfee')->nullable();
            $table->string('onlinefee')->nullable();
            $table->string('addrs_name')->nullable();
            $table->string('state')->nullable();
            $table->string('street')->nullable();
            $table->string('full_addrs')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
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
