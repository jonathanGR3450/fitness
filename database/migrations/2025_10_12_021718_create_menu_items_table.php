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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            
            // Información del menú
            $table->string('titulo', 100);          // Inicio, Sobre mí, etc.
            $table->string('ruta', 100);            // welcome, about, move, etc.
            $table->string('url', 255)->nullable(); // URL completa (opcional)
            
            // Organización
            $table->integer('orden')->default(0);   // Orden en el menú
            $table->boolean('activo')->default(true);
            
            // Multi-idioma
            $table->string('idioma', 2)->default('es'); // es, en
            
            // Menú padre (para submenús)
            $table->foreignId('parent_id')->nullable()->constrained('menu_items')->onDelete('cascade');
            
            $table->timestamps();
            
            // Índices
            $table->index(['idioma', 'activo', 'orden']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};