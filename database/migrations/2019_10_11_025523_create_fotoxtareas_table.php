<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoxtareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotoxtarea', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tareaxcasa_id');
            $table->string('ruta',100);
            $table->text('descripcion');
            $table->foreign('tareaxcasa_id')->references('id')->on('tareaxcasa');
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
        Schema::dropIfExists('fotoxtarea');
    }
}
