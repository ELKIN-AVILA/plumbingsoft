<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetcronogramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detcronograma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cronograma_id');
            $table->unsignedBigInteger('etapas_id');
            $table->unsignedBigInteger('secciones_id');
            $table->unsignedBigInteger('casas_id');
            $table->foreign('cronograma_id')->references('id')->on('cronograma');
            $table->foreign('etapas_id')->references('id')->on('etapas');
            $table->foreign('secciones_id')->references('id')->on('secciones');
            $table->foreign('casas_id')->references('id')->on('casas');
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
        Schema::dropIfExists('detcronograma');
    }
}
