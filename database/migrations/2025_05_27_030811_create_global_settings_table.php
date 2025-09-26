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
        Schema::create('global_settings', function (Blueprint $table) {
            $table->id();
            
            // Logo y Branding
            $table->string('logo')->nullable()->comment('Ruta del logo del sitio');
            $table->string('site_name')->nullable()->comment('Nombre del sitio/empresa');
            $table->string('site_slogan')->nullable()->comment('Slogan o tagline');
            
            // Redes Sociales
            $table->string('link_facebook')->nullable()->comment('URL de Facebook');
            $table->string('link_instagram')->nullable()->comment('URL de Instagram');
            $table->string('link_pinterest')->nullable()->comment('URL de Pinterest');
            
            // SEO Básico
            $table->string('meta_title', 60)->nullable()->comment('Título SEO principal');
            $table->text('meta_description')->nullable()->comment('Descripción meta para SEO');
            $table->text('meta_keywords')->nullable()->comment('Palabras clave separadas por comas');
            $table->string('meta_author')->nullable()->comment('Autor del sitio');
            $table->string('meta_robots')->default('index,follow')->comment('Directivas para robots');
            $table->string('canonical_url')->nullable()->comment('URL canónica del sitio');
            
         
            
            // Favicon y Configuraciones Adicionales
            $table->string('favicon')->nullable()->comment('Ruta del favicon');
            $table->string('google_analytics')->nullable()->comment('ID de Google Analytics');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_settings');
    }
};