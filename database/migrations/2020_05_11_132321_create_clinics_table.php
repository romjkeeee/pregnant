<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('name')->nullable();
            $table->text('text')->nullable();
            $table->string('address')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->boolean('paid')->default(0);
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
        Schema::drop('clinics');
    }

}
