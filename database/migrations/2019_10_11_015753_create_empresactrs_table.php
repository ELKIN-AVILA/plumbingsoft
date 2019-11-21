<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresactrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresactr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nit');
            $table->string('razsoc',200);
            $table->bigInteger('celular');
            $table->string('correo',90);
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
        Schema::dropIfExists('empresactr');
    }
}
