<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('gender');
            $table->string('email');
            $table->string('weight');
            $table->string('mobile');
            $table->string('blood');
            $table->string('dob');
            $table->string('height');
            $table->string('patientstatus');
            $table->string('profilepic');
            $table->string('full_addrs');
            $table->string('state');
            $table->string('longitude');
            $table->string('city');
            $table->string('latitude');
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
        Schema::dropIfExists('patient_infos');
    }
}
