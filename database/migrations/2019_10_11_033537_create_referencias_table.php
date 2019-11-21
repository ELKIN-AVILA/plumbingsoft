<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personas_id');
            $table->unsignedBigInteger('tiprefer_id');
            $table->string('nombre',100);
            $table->bigInteger('numcom');
            $table->enum('veridico',['S','N']);
            $table->foreign('personas_id')->references('id')->on('personas');
            $table->foreign('tiprefer_id')->references('id')->on('tiprefer');
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
        Schema::dropIfExists('referencias');
    }
}
