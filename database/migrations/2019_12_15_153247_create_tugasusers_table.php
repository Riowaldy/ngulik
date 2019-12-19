<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugasusers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tugas_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('link');
            $table->integer('nilai');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tugas_id')->references('id')->on('tugass');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugasusers');
    }
}
