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
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id();
            
            // Identificadores
            $table->string('grupo', 50);        // general, redes_sociales, colores, footer
            $table->string('clave', 100);       // logo, facebook_url, primary_color, etc.
            
            // Contenido
            $table->string('tipo', 20);         // texto, imagen, url, color, email, telefono
            $table->text('valor')->nullable();  // El valor del campo
            
            // Multi-idioma opcional
            $table->string('idioma', 2)->default('es'); // es, en
            
            // Metadata
            $table->string('etiqueta', 100)->nullable();    // Etiqueta legible para el admin
            $table->text('descripcion')->nullable();         // Ayuda para el editor
            
            $table->timestamps();
            
            // Índices
            $table->index(['grupo', 'idioma']);
            $table->unique(['grupo', 'clave', 'idioma']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuraciones');
    }
};