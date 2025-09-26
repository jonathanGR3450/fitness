<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    use HasFactory;

    protected $table = 'global_settings';

    protected $fillable = [
        // Logo y Branding
        'logo',
        'site_name',
        'site_slogan',
        
        // Redes Sociales
        'link_facebook',
        'link_instagram',
        'link_pinterest',
        
        // SEO Básico
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_author',
        'meta_robots',
        'canonical_url',
        
        // Favicon y Configuraciones
        'favicon',
        'google_analytics',
    ];

    /**
     * Obtener la configuración global
     */
    public static function getSettings()
    {
        return self::first() ?: new self();
    }

    /**
     * Actualizar o crear configuración global
     */
    public static function updateSettings(array $data)
    {
        $settings = self::first();
        
        if ($settings) {
            $settings->update($data);
        } else {
            $settings = self::create($data);
        }
        
        return $settings;
    }
}