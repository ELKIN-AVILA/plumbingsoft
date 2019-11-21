<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',45);
            $table->enum('estado',['P','F','PR']);
            $table->unsignedBigInteger('secciones_id');
            $table->unsignedBigInteger('tipedificacion_id');
            $table->foreign('secciones_id')->references('id')->on('secciones');
            $table->foreign('tipedificacion_id')->references('id')->on('tipedificacion');
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
        Schema::dropIfExists('casas');
    }
}
