<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoporcursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soporcur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curxper_id');
            $table->string('adjunto',100);
            $table->foreign('curxper_id')->references('id')->on('curxper');
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
        Schema::dropIfExists('soporcur');
    }
}
