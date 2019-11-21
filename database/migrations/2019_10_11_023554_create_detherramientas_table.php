<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetherramientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detherramientas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('herramientas_id');
            $table->string('codigo',45);
            $table->enum('estado',['A','I']);
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
        Schema::dropIfExists('detherramientas');
    }
}
