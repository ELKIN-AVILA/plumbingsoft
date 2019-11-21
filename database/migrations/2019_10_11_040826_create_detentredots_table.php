<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetentredotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detentredot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entredota_id');
            $table->unsignedBigInteger('dotacion_id');
            $table->integer('cantidad');
            $table->foreign('entredota_id')->references('id')->on('entredota');
            $table->foreign('dotacion_id')->references('id')->on('dotacion');
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
        Schema::dropIfExists('detentredot');
    }
}
