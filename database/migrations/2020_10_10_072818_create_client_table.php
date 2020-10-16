<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fio');
            $table->date('date_of_birth')->nullable();
            $table->string('massage_type')->nullable();
            $table->string('medical_background')->nullable();
            $table->unsignedBigInteger('photo_id')->nullable();
            $table->string('annotation')->nullable();
            $table->date('last_massage')->nullable();
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
        Schema::dropIfExists('client');
    }
}
