<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chat_id')->nullable();
            $table->integer('sender_id')->nullable();
            $table->integer('rec_id')->nullable();
            $table->enum('msg_type', ['default', 'attach'])->nullable();
            $table->enum('sender_type', ['doctor', 'patient', 'admin'])->nullable();
            $table->enum('rec_type', ['doctor', 'patient', 'admin'])->nullable();
            $table->text('text')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
