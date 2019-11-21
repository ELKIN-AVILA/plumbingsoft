<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareaxcasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareaxcasa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('detcronograma_id');
            $table->unsignedBigInteger('tareas_id');
            $table->enum('estado',['A','R','F']);
            $table->foreign('detcronograma_id')->references('id')->on('detcronograma');
            $table->foreign('tareas_id')->references('id')->on('tareas');
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
        Schema::dropIfExists('tareaxcasa');
    }
}
