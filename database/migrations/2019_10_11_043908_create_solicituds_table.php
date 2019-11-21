<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->unsignedBigInteger('persol_id');
            $table->unsignedBigInteger('persova_id');
            $table->decimal('valorsol',12,2)->nullable();
            $table->enum('estado',['A','R','E']);
            $table->text('observacion');
            $table->unsignedBigInteger('tipsol_id');
            $table->foreign('persol_id')->references('id')->on('users');
            $table->foreign('persova_id')->references('id')->on('users');
            $table->foreign('tipsol_id')->references('id')->on('tipsol');
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
        Schema::dropIfExists('solicituds');
    }
}
