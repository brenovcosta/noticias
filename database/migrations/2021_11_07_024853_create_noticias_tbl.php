<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')
                ->unsigned()
                ->nullable()
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');
            $table->text('titulo');
            $table->text('autor');
            $table->timestamp('data_publicacao');
            $table->timestamp('data_atualizacao');
            $table->text('texto');
            $table->text('url_img');
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
        Schema::dropIfExists('noticias');
    }
}
