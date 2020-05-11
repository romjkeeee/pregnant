<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('token')->nullable();
			$table->string('code', 4)->nullable();
			$table->text('specialization')->nullable();
			$table->text('clinics')->nullable();
			$table->string('last_name')->nullable();
			$table->string('name')->nullable();
			$table->string('second_name')->nullable();
			$table->string('phone')->nullable();
			$table->string('password')->nullable();
			$table->boolean('confirmed')->default(0);
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
		Schema::drop('doctors');
	}

}
