<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnsToCheckListTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_list_tasks', function (Blueprint $table) {
            $table->removeColumn('date');
            $table->removeColumn('remember');
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
            $table->removeColumn('date');
            $table->removeColumn('remember');
        });
    }
}
