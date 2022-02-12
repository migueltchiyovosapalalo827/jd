<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormacaoscandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacaoscandidatos', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado');
            $table->unsignedBigInteger('formacao_id');
            $table->foreign('formacao_id')->references('id')->on('formacaos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('candidatos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('formacaoscandidatos');
    }
}
