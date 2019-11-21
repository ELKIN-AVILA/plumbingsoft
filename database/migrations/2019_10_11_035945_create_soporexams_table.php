<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoporexamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soporexam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('examenesxper_id');
            $table->string('adjunto',100);
            $table->foreign('examenesxper_id')->references('id')->on('examenesxper');
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
        Schema::dropIfExists('soporexam');
    }
}
