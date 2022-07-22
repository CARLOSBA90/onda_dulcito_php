<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetaIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta_ingredientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receta_id')->unsigned()->index();
            $table->foreign('receta_id')->references('id')->on('receta')->onDelete('cascade');
            $table->integer('ingrediente_id')->unsigned()->index();
            $table->foreign('ingrediente_id')->references('id')->on('ingrediente')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['receta_id', 'ingrediente_id']);
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
        Schema::dropIfExists('receta_ingredientes');
    }
}
