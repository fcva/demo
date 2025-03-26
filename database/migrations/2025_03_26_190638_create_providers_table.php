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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 180);
            $table->string('razon_social', 180)->nullable();
            $table->string('ruc', 15)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('celular', 15)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->string('correo_electronico', 180)->nullable();
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
        Schema::dropIfExists('providers');
    }
};
