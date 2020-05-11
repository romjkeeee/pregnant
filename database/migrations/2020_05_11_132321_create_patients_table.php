<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('token')->nullable();
			$table->string('code', 4)->nullable();
			$table->string('email')->nullable();
			$table->integer('region_id')->nullable();
			$table->integer('city_id')->nullable();
			$table->string('address')->nullable();
			$table->integer('clinic_id')->nullable();
			$table->integer('doctor_id')->nullable();
			$table->integer('duration_id')->nullable();
			$table->date('date_of_birth')->nullable();
			$table->string('last_name')->nullable();
			$table->string('name')->nullable();
			$table->string('second_name')->nullable();
			$table->string('phone')->nullable();
			$table->string('password')->nullable();
			$table->boolean('pregnant')->nullable()->default(0);
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
		Schema::drop('patients');
	}

}
