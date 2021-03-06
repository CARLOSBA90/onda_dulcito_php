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
            $table->id();
            $table->foreignId('seccion_id')
            ->nullable()
            ->constrained('seccions')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('receta_id')
            ->nullable()
            ->constrained('recetas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
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
