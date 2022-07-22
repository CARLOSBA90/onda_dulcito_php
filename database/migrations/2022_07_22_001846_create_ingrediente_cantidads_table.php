<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredienteCantidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingrediente_cantidads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingrediente_id')->unsigned()->index();
            $table->foreign('ingrediente_id')->references('id')->on('ingrediente')->onDelete('cascade');
            $table->integer('cantidad_id')->unsigned()->index();
            $table->foreign('cantidad_id')->references('id')->on('cantidad')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['ingrediente_id', 'cantidad_id']);
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
        Schema::dropIfExists('ingrediente_cantidads');
    }
}
