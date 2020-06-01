<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class   CreateCheckListTaskTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_tasks', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::create('check_list_task_translates', function (Blueprint $table) {
            $table->integer('lang_id')->nullable()->unsigned();
            $table->integer('task_id')->nullable()->unsigned();
            $table->string('name')->nullable();

            $table->foreign('lang_id')->references('id')->on('langs')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('check_list_tasks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_list_tasks', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id');
        });
        Schema::dropIfExists('check_list_task_translates');
    }
}
