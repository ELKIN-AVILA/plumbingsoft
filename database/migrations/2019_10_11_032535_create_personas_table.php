<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cargos_id');
            $table->unsignedBigInteger('tipdoc_id');
            $table->bigInteger('numdoc');
            $table->string('prinom',45);
            $table->string('segnom',45)->nullable();
            $table->string('priape',45);
            $table->string('segape',45)->nullable();
            $table->bigInteger('celular');
            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('departamentos_id');
            $table->unsignedBigInteger('ciudades_id');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('cargos_id')->references('id')->on('cargos');
            $table->foreign('tipdoc_id')->references('id')->on('tipdoc');
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->foreign('departamentos_id')->references('id')->on('departamentos');
            $table->foreign('ciudades_id')->references('id')->on('ciudades');
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
        Schema::dropIfExists('personas');
    }
}
