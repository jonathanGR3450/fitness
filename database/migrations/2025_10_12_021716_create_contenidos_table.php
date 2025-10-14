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
        Schema::create('contenidos', function (Blueprint $table) {
            $table->id();
            
            // Identificadores
            $table->string('pagina', 50);           // welcome, about, move, community, blog, contact
            $table->string('seccion', 50);          // hero, features, video, pricing, etc.
            $table->string('clave', 100);           // titulo_h1, subtitulo, imagen_fondo, etc.
            
            // Contenido
            $table->string('tipo', 20);             // texto, imagen, video, url, lista
            $table->text('valor')->nullable();      // El contenido en sí
            
            // Organización
            $table->string('idioma', 2)->default('es'); // es, en
            $table->integer('orden')->default(0);   // Para ordenar elementos
            
            // Metadata opcional
            $table->text('descripcion')->nullable(); // Descripción del campo (ayuda para editores)
            
            $table->timestamps();
            
            // Índices para búsquedas rápidas
            $table->index(['pagina', 'seccion', 'idioma']);
            $table->unique(['pagina', 'seccion', 'clave', 'idioma']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenidos');
    }
};