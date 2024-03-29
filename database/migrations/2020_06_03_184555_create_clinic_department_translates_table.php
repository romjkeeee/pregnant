<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicDepartmentTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinic_departments', function (Blueprint $table) {
            $table->dropColumn(['name', 'street', 'building']);
        });

        Schema::create('clinic_department_translates', function (Blueprint $table) {
            $table->integer('lang_id')->nullable()->unsigned();
            $table->integer('department_id')->nullable()->unsigned();
            $table->string('name')->nullable();
            $table->string('street')->nullable();
            $table->string('building')->nullable();

            $table->foreign('lang_id')->references('id')->on('langs')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('clinic_departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clinic_department_translates', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id');
            $table->string('street')->nullable()->after('name');
            $table->string('building')->nullable()->after('street');
        });

        Schema::dropIfExists('clinic_department_translates');
    }
}
