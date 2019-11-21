<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoxbodegasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productoxbodega', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bodega_id');
            $table->unsignedBigInteger('dotacion_id')->nullable();
            $table->unsignedBigInteger('herramientas_id')->nullable();
            $table->unsignedBigInteger('materiales_id')->nullable();
            $table->integer('cantidad');
            $table->foreign('bodega_id')->references('id')->on('bodega');
            $table->foreign('dotacion_id')->references('id')->on('dotacion');
            $table->foreign('herramientas_id')->references('id')->on('herramientas');
            $table->foreign('materiales_id')->references('id')->on('materiales');
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
        Schema::dropIfExists('productoxbodega');
    }
}
