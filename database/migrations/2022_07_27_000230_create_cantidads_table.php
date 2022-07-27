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
            $table->id();
            $table->foreignId('id_tipo')
                ->nullable()
                ->constrained('tipos')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->integer('unidad');
            $table->timestamps();
            $table->unique(['id_tipo', 'unidad']);
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
