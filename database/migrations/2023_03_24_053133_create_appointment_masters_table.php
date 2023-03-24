<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_masters', function (Blueprint $table) {
            $table->id();
            $table->integer('hospital_id');
            $table->integer('doctor_id');
            $table->date('date');
            $table->string('available_category');
            $table->string('slot_start_time');
            $table->string('slot_end_time');
            $table->string('break_start_time');
            $table->string('break_end_time');
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
        Schema::dropIfExists('appointment_masters');
    }
}
