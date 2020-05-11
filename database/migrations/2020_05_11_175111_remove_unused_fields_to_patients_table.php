<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUnusedFieldsToPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('token');
            $table->dropColumn('code');
            $table->dropColumn('email');
            $table->dropColumn('last_name');
            $table->dropColumn('name');
            $table->dropColumn('second_name');
            $table->dropColumn('phone');
            $table->dropColumn('password');
            $table->dropColumn('confirmed');

            $table->integer('user_id')->nullable()->unsigned()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->string('token')->nullable()->after('id');
            $table->string('code', 4)->nullable()->after('token');
            $table->string('email')->nullable()->after('code');
            $table->string('last_name')->nullable()->after('email');
            $table->string('name')->nullable()->after('last_name');
            $table->string('second_name')->nullable()->after('name');
            $table->string('phone')->nullable()->after('second_name');
            $table->string('password')->nullable()->after('phone');
            $table->boolean('confirmed')->default(0)->after('password');
        });
    }
}
