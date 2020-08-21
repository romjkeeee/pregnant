<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTaskRemembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_task_remembers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->nullable()->unsigned();
            $table->integer('patient_id')->nullable()->unsigned();
            $table->date('date')->nullable();
            $table->boolean('remember')->default(0);
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('check_list_tasks')->onDelete('cascade');
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
        Schema::dropIfExists('patient_task_remembers');
    }
}
