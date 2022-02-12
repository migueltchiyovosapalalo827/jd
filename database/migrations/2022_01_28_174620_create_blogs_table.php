<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',150);
            $table->string('autor',60);
            $table->string('resumo');
            $table->text('conteudo');
            $table->string('foto');
            $table->integer('visualizacao')->default(0);
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
        Schema::dropIfExists('blogs');
    }
}
