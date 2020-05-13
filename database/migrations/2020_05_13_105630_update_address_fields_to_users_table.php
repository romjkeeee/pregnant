<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAddressFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('lang_id')->nullable()->after('id');
            $table->integer('region_id')->nullable()->after('lang_id');
            $table->integer('city_id')->nullable()->after('region_id');
            $table->string('street')->nullable()->after('city_id');
            $table->string('building')->nullable()->after('street');
            $table->string('apartment')->nullable()->after('building');
        });
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('region_id');
            $table->dropColumn('city_id');
            $table->dropColumn('address');
            $table->dropColumn('duration_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lang_id');
            $table->dropColumn('region_id');
            $table->dropColumn('city_id');
            $table->dropColumn('street');
            $table->dropColumn('building');
            $table->dropColumn('apartment');
        });
        Schema::table('patients', function (Blueprint $table) {
            $table->integer('region_id')->nullable()->after('id');
            $table->integer('city_id')->nullable()->after('region_id');
            $table->string('address')->nullable()->after('city_id');
            $table->integer('duration_id')->nullable()->after('address');
        });

    }
}
