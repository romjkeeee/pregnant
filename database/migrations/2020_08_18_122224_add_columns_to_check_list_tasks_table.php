<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCheckListTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_tasks', function (Blueprint $table) {
            $table->date('date')->nullable();
            $table->boolean('remember')->nullable();
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
            $table->date('date')->nullable();
            $table->boolean('remember')->nullable();
        });
    }
}
