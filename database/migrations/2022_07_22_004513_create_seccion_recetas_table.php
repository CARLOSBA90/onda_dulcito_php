<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion_recetas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seccion_id')->unsigned()->index();
            $table->foreign('seccion_id')->references('id')->on('seccion')->onDelete('cascade');
            $table->foreign('seccion_id')->references('id')->on('seccion')->onUpdate('cascade');
            $table->integer('receta_id')->unsigned()->index();
            $table->foreign('receta_id')->references('id')->on('receta')->onDelete('cascade');
            $table->foreign('receta_id')->references('id')->on('receta')->onUpdate('cascade');
            $table->timestamps();
            $table->unique(['seccion_id', 'receta_id']);
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
        Schema::dropIfExists('seccion_recetas');
    }
}
