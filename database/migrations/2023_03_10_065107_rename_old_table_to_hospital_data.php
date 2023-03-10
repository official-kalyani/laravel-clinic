<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameOldTableToHospitalData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('user_data', function (Blueprint $table) {
        //     //
        // });
        Schema::rename('user_data', 'hospital_data');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('user_data', function (Blueprint $table) {
        //     //
        // });
        Schema::rename('hospital_data', 'user_data');
    }
}
