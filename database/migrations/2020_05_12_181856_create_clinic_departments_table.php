<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_departments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinic_id')->nullable()->unsigned();
            $table->string('name')->nullable();
            $table->string('street')->nullable();
            $table->string('building')->nullable();
            $table->timestamps();

            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinic_departments');
    }
}
