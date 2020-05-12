<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientBelliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_bellies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->nullable()->unsigned();
            $table->float('uterine_fundus_height', 8, 2)->nullable();
            $table->float('girth_abdomen', 8, 2)->nullable();
            $table->date('date')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_bellies');
    }
}
