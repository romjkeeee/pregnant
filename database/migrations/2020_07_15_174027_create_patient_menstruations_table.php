<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientMenstruationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_menstruations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->date('start_last_menstruation');
            $table->integer('duration_menstruation');
            $table->integer('duration_cycle');
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
        Schema::dropIfExists('patient_menstruations');
    }
}
