<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $table = 'contenidos';

    protected $fillable = [
        'pagina',
        'seccion',
        'clave',
        'tipo',
        'valor',
        'idioma',
        'orden',
        'descripcion',
    ];

    protected $casts = [
        'orden' => 'integer',
    ];

    // ============================================
    // SCOPES - Para consultas más fáciles
    // ============================================

    /**
     * Filtrar por página
     */
    public function scopePagina($query, $pagina)
    {
        return $query->where('pagina', $pagina);
    }

    /**
     * Filtrar por sección
     */
    public function scopeSeccion($query, $seccion)
    {
        return $query->where('seccion', $seccion);
    }

    /**
     * Filtrar por idioma
     */
    public function scopeIdioma($query, $idioma = null)
    {
        $idioma = $idioma ?? app()->getLocale();
        return $query->where('idioma', $idioma);
    }

    /**
     * Ordenar por el campo orden
     */
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden', 'asc');
    }

    // ============================================
    // MÉTODOS ESTÁTICOS - Para consultas rápidas
    // ============================================

    /**
     * Obtener todo el contenido de una página y sección específica
     * Retorna una colección con clave => valor
     */
    public static function obtenerSeccion($pagina, $seccion, $idioma = null)
    {
        $idioma = $idioma ?? app()->getLocale();
        
        return self::where('pagina', $pagina)
            ->where('seccion', $seccion)
            ->where('idioma', $idioma)
            ->orderBy('orden')
            ->get()
            ->keyBy('clave');
    }

    /**
     * Obtener todas las secciones de una página
     * Retorna un array agrupado por sección
     */
    public static function obtenerPagina($pagina, $idioma = null)
    {
        $idioma = $idioma ?? app()->getLocale();
        
        return self::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion')
            ->map(function ($items) {
                return $items->keyBy('clave');
            });
    }

    /**
     * Obtener un valor específico
     */
    public static function obtenerValor($pagina, $seccion, $clave, $default = null, $idioma = null)
    {
        $idioma = $idioma ?? app()->getLocale();
        
        $contenido = self::where('pagina', $pagina)
            ->where('seccion', $seccion)
            ->where('clave', $clave)
            ->where('idioma', $idioma)
            ->first();

        return $contenido ? $contenido->valor : $default;
    }

    /**
     * Crear o actualizar un contenido
     */
    public static function guardar($pagina, $seccion, $clave, $valor, $tipo = 'texto', $idioma = null, $orden = 0)
    {
        $idioma = $idioma ?? app()->getLocale();
        
        return self::updateOrCreate(
            [
                'pagina' => $pagina,
                'seccion' => $seccion,
                'clave' => $clave,
                'idioma' => $idioma,
            ],
            [
                'tipo' => $tipo,
                'valor' => $valor,
                'orden' => $orden,
            ]
        );
    }

    // ============================================
    // MÉTODOS DE INSTANCIA
    // ============================================

    /**
     * Verificar si el contenido es de tipo imagen
     */
    public function esImagen()
    {
        return $this->tipo === 'imagen';
    }

    /**
     * Verificar si el contenido es de tipo video
     */
    public function esVideo()
    {
        return $this->tipo === 'video';
    }

    /**
     * Verificar si el contenido es de tipo URL
     */
    public function esUrl()
    {
        return $this->tipo === 'url';
    }

    /**
     * Obtener la URL completa del asset (para imágenes/videos)
     */
    public function getUrlCompleta()
    {
        if ($this->esImagen() || $this->esVideo()) {
            return asset($this->valor);
        }
        return $this->valor;
    }
}