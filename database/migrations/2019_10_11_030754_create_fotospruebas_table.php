<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotospruebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotospruebas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pruebasxcasa_id');
            $table->string('ruta',100);
            $table->string('descripcion',200)->nullable();
            $table->foreign('pruebasxcasa_id')->references('id')->on('pruebasxcasa');
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
        Schema::dropIfExists('fotospruebas');
    }
}
