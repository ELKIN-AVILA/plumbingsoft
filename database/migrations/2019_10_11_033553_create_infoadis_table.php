<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoadisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infoadi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personas_id');
            $table->date('fecingr');
            $table->date('fecegr')->nullable();
            $table->foreign('personas_id')->references('id')->on('personas');
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
        Schema::dropIfExists('infoadi');
    }
}
