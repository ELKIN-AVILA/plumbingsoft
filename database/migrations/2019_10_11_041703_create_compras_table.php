<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuarios_id');
            $table->date('fecha');
            $table->string('descripcion',45);
            $table->decimal('total',12,2);
            $table->unsignedBigInteger('obras_id');
            $table->unsignedBigInteger('bodega_id');
            $table->foreign('usuarios_id')->references('id')->on('users');
            $table->foreign('obras_id')->references('id')->on('obras');
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
        Schema::dropIfExists('compras');
    }
}
