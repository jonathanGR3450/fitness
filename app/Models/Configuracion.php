<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table = 'configuraciones';

    protected $fillable = [
        'grupo',
        'clave',
        'tipo',
        'valor',
        'idioma',
        'etiqueta',
        'descripcion',
    ];

    // ============================================
    // SCOPES
    // ============================================

    /**
     * Filtrar por grupo
     */
    public function scopeGrupo($query, $grupo)
    {
        return $query->where('grupo', $grupo);
    }

    /**
     * Filtrar por idioma
     */
    public function scopeIdioma($query, $idioma = null)
    {
        $idioma = $idioma ?? app()->getLocale();
        return $query->where('idioma', $idioma);
    }

    // ============================================
    // MÉTODOS ESTÁTICOS
    // ============================================

    /**
     * Obtener todas las configuraciones de un grupo
     * Retorna colección con clave => valor
     */
    public static function obtenerGrupo($grupo, $idioma = null)
    {
        $idioma = $idioma ?? app()->getLocale();
        
        return self::where('grupo', $grupo)
            ->where('idioma', $idioma)
            ->get()
            ->keyBy('clave');
    }

    /**
     * Obtener todas las configuraciones agrupadas
     */
    public static function obtenerTodas($idioma = null)
    {
        $idioma = $idioma ?? app()->getLocale();
        
        return self::where('idioma', $idioma)
            ->get()
            ->groupBy('grupo')
            ->map(function ($items) {
                return $items->keyBy('clave');
            });
    }

    /**
     * Obtener un valor específico
     */
    public static function obtenerValor($grupo, $clave, $default = null, $idioma = null)
    {
        $idioma = $idioma ?? app()->getLocale();
        
        $config = self::where('grupo', $grupo)
            ->where('clave', $clave)
            ->where('idioma', $idioma)
            ->first();

        return $config ? $config->valor : $default;
    }

    /**
     * Crear o actualizar una configuración
     */
    public static function guardar($grupo, $clave, $valor, $tipo = 'texto', $idioma = null, $etiqueta = null)
    {
        $idioma = $idioma ?? app()->getLocale();
        
        return self::updateOrCreate(
            [
                'grupo' => $grupo,
                'clave' => $clave,
                'idioma' => $idioma,
            ],
            [
                'tipo' => $tipo,
                'valor' => $valor,
                'etiqueta' => $etiqueta,
            ]
        );
    }

    // ============================================
    // HELPERS ESPECÍFICOS - Métodos útiles
    // ============================================

    /**
     * Obtener logo principal
     */
    public static function getLogo($idioma = null)
    {
        return self::obtenerValor('general', 'logo', '/images/logo.png', $idioma);
    }

    /**
     * Obtener todas las redes sociales
     */
    public static function getRedesSociales($idioma = null)
    {
        return self::obtenerGrupo('redes_sociales', $idioma);
    }

    /**
     * Obtener colores del tema
     */
    public static function getColores($idioma = null)
    {
        return self::obtenerGrupo('colores', $idioma);
    }

    /**
     * Obtener datos del footer
     */
    public static function getFooter($idioma = null)
    {
        return self::obtenerGrupo('footer', $idioma);
    }

    /**
     * Obtener configuración del CTA
     */
    public static function getCTA($idioma = null)
    {
        return self::obtenerGrupo('cta', $idioma);
    }

    // ============================================
    // MÉTODOS DE INSTANCIA
    // ============================================

    /**
     * Verificar si la configuración es una imagen
     */
    public function esImagen()
    {
        return $this->tipo === 'imagen';
    }

    /**
     * Verificar si la configuración es una URL
     */
    public function esUrl()
    {
        return $this->tipo === 'url';
    }

    /**
     * Verificar si la configuración es un color
     */
    public function esColor()
    {
        return $this->tipo === 'color';
    }

    /**
     * Obtener la URL completa del asset
     */
    public function getUrlCompleta()
    {
        if ($this->esImagen()) {
            return asset($this->valor);
        }
        return $this->valor;
    }
}