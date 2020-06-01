<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('clinics', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('text');
            $table->dropColumn('address');
        });
        Schema::create('clinic_translates', function (Blueprint $table) {
            $table->integer('lang_id')->nullable()->unsigned();
            $table->integer('clinic_id')->nullable()->unsigned();
            $table->string('name')->nullable();
            $table->text('text')->nullable();
            $table->string('address')->nullable();

            $table->foreign('lang_id')->references('id')->on('langs')->onDelete('cascade');
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
        Schema::table('clinics', function (Blueprint $table) {
            $table->string('name')->nullable()->after('type');
            $table->text('text')->nullable()->after('name');
            $table->text('address')->nullable()->after('text');
        });
        Schema::dropIfExists('clinic_translates');
    }
}
