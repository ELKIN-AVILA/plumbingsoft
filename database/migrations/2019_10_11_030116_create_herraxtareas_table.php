<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerraxtareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herraxtarea', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('detherramientas_id');
            $table->unsignedBigInteger('tareaxcasa_id');
            $table->foreign('detherramientas_id')->references('id')->on('detherramientas');
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
        Schema::dropIfExists('herraxtarea');
    }
}
