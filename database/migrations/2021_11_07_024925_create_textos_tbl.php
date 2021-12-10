<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextosTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textos', function (Blueprint $table) {
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
        Schema::dropIfExists('textos');
    }
}
