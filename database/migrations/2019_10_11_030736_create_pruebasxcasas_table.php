<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePruebasxcasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pruebasxcasa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('casas_id');
            $table->unsignedBigInteger('pruebas_id');
            $table->foreign('casas_id')->references('id')->on('casas');
            $table->foreign('pruebas_id')->references('id')->on('pruebas');
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
        Schema::dropIfExists('pruebasxcasas');
    }
}
