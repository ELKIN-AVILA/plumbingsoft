<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',70);
            $table->enum('estado',['A','F']);
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('empresactr_id');
            $table->foreign('empresa_id')->references('id')->on('empresa');
            $table->foreign('empresactr_id')->references('id')->on('empresactr');
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
        Schema::dropIfExists('obras');
    }
}
