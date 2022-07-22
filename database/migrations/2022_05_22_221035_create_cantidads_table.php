<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCantidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantidads', function (Blueprint $table) {
           // ojo al cambiar(hacer update), son registros historicos, inmodificables
            $table->increments('id');
            $table->integer('tipo');
            $table->integer('unidad');
            $table->timestamps();
            $table->unique(['tipo', 'unidad']);
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
        Schema::dropIfExists('cantidads');
    }
}
