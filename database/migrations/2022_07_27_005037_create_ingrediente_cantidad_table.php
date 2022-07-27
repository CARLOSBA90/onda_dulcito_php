<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredienteCantidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingrediente_cantidad', function (Blueprint $table) {
            /*verificar relaciones */
            $table->id();
            
            $table->foreignId('ingrediente_id')
            ->nullable()
            ->constrained('ingredientes')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('cantidad_id')
            ->nullable()
            ->constrained('cantidads')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('receta_id')
            ->nullable()
            ->constrained('recetas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->timestamps();
            $table->unique(['receta_id','ingrediente_id', 'cantidad_id']);
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
        Schema::dropIfExists('ingrediente_cantidad');
    }
}
