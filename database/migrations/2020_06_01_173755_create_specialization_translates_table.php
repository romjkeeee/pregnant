<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecializationTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('specializations', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::create('specialization_translates', function (Blueprint $table) {
            $table->integer('lang_id')->nullable()->unsigned();
            $table->integer('specialization_id')->nullable()->unsigned();
            $table->string('name')->nullable();

            $table->foreign('lang_id')->references('id')->on('langs')->onDelete('cascade');
            $table->foreign('specialization_id')->references('id')->on('specializations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specializations', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id');
        });
        Schema::dropIfExists('specialization_translates');
    }
}
