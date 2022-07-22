<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_receta')->unsigned()->index();
            $table->foreign('id_receta')->references('id')->on('receta')->onDelete('cascade');
            $table->foreign('id_receta')->references('id')->on('receta')->onUpdate('cascade');
            $table->integer('id_secuencia')->unsigned()->index();
            $table->string('url',300);
            $table->string('descripcion',150);
            $table->integer('tamano');
            $table->timestamps();
            $table->unique(['id_receta', 'id_secuencia']);
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagens');
    }
}
