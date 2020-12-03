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
            $table->date('birthday')->nullable();
            $table->text('massage_type')->nullable();
            $table->text('medical_background')->nullable();
            $table->text('skin_diseases')->nullable();
            $table->text('JKT_diseases')->nullable();
            $table->text('adenopathia')->nullable();
            $table->text('endocrine_system')->nullable();
            $table->text('CDV')->nullable();
            $table->text('respiratory_diseases')->nullable();
            $table->text('veneral_diseases')->nullable();
            $table->text('pregnant')->nullable();
            $table->text('allergic_response')->nullable();
            $table->text('drugs')->nullable();
            $table->boolean('photo')->default(false);
            $table->text('annotation')->nullable();
            $table->date('last_massage')->nullable();
            $table->boolean('is_active')->default(false);
            $table->softDeletes();
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
