<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDotacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dotacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',80);
            $table->unsignedBigInteger('tipdota_id');
            $table->foreign('tipdota_id')->references('id')->on('tipdota');
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
        Schema::dropIfExists('dotacion');
    }
}
