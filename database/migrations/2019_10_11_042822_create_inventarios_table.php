<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('descripcion',45);
            $table->unsignedBigInteger('usuarios_id');
            $table->unsignedBigInteger('bodega_id');
            $table->foreign('usuarios_id')->references('id')->on('users');
            $table->foreign('bodega_id')->references('id')->on('bodega');
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
        Schema::dropIfExists('inventarios');
    }
}
