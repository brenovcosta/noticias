<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')
                ->unsigned()
                ->nullable()
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');
            $table->text('titulo');
            $table->text('descricao');
            $table->text('url_video');
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
        Schema::dropIfExists('videos');
    }
}
