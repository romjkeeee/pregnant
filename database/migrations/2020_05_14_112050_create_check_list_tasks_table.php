<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckListTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_list_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('list_id')->nullable()->unsigned();
            $table->integer('name')->nullable();
            $table->timestamps();

            $table->foreign('list_id')->references('id')->on('check_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_list_tasks');
    }
}
