<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetinventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detinventarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inventarios_id');
            $table->unsignedBigInteger('dotacion_id')->nullable();
            $table->unsignedBigInteger('herramientas_id')->nullable();
            $table->unsignedBigInteger('materiales_id')->nullable();
            $table->integer('cantidad');
            $table->decimal('precio',12,2);
            $table->foreign('inventarios_id')->references('id')->on('inventarios');
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
        Schema::dropIfExists('detinventarios');
    }
}
