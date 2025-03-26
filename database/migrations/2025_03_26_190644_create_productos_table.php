<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained()->update('cascade')->onDelete('cascade');
            $table->string('nombre', 180);
            $table->string('marca', 120)->nullable();
            $table->string('modelo', 120)->nullable();
            $table->string('color', 90)->nullable();
            $table->string('dimension', 90)->nullable();
            $table->string('descripcion', 180)->nullable();
            $table->string('observacion', 120)->nullable();
            $table->boolean('es_activo')->default(true);
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
