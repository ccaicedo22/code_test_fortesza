<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_file', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id_send');
            $table->foreign('user_id_send')->references('user_id_send')->on('messages');         
            $table->unsignedBigInteger('user_id_receive');
            $table->foreign('user_id_receive')->references('user_id_receive')->on('messages');
            $table->unsignedBigInteger('id_message');
            $table->foreign('id_message')->references('id')->on('messages');
            $table->string('file_name');
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
        Schema::dropIfExists('upload_file');
    }
};
