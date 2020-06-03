<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicPriceTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinic_prices', function (Blueprint $table) {
            $table->dropColumn('name');
        });

        Schema::create('clinic_price_translates', function (Blueprint $table) {
            $table->integer('lang_id')->nullable()->unsigned();
            $table->integer('price_id')->nullable()->unsigned();
            $table->string('name')->nullable();

            $table->foreign('lang_id')->references('id')->on('langs')->onDelete('cascade');
            $table->foreign('price_id')->references('id')->on('clinic_prices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clinic_prices', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id');
        });
        Schema::dropIfExists('clinic_price_translates');
    }
}
