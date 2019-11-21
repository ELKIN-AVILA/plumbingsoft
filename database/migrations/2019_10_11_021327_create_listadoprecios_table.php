<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListadopreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listadoprecios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->unsignedBigInteger('obras_id');
            $table->unsignedBigInteger('usuarios_id');
            $table->unsignedBigInteger('tipcontrato_id');
            $table->unsignedBigInteger('tipcobro_id');
            $table->decimal('precio',12,2);
            $table->integer('cantidad');
            $table->decimal('total',12,2);
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
        Schema::dropIfExists('listadoprecios');
    }
}
