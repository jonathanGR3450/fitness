<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_items';

    protected $fillable = [
        'titulo',
        'ruta',
        'url',
        'orden',
        'activo',
        'idioma',
        'parent_id',
    ];

    protected $casts = [
        'orden' => 'integer',
        'activo' => 'boolean',
    ];

    // ============================================
    // RELACIONES
    // ============================================

    /**
     * Menú padre (para submenús)
     */
    public function padre()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    /**
     * Submenús (hijos)
     */
    public function hijos()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->ordenado()->activos();
    }

    // ============================================
    // SCOPES
    // ============================================

    /**
     * Filtrar items activos
     */
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
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

    /**
     * Obtener solo items principales (sin padre)
     */
    public function scopePrincipales($query)
    {
        return $query->whereNull('parent_id');
    }

    // ============================================
    // MÉTODOS ESTÁTICOS
    // ============================================

    /**
     * Obtener menú completo del idioma actual
     */
    public static function obtenerMenu($idioma = null)
    {
        $idioma = $idioma ?? app()->getLocale();
        
        return self::principales()
            ->activos()
            ->idioma($idioma)
            ->ordenado()
            ->with('hijos')
            ->get();
    }

    /**
     * Crear un item de menú
     */
    public static function crear($titulo, $ruta, $orden = 0, $idioma = null, $activo = true)
    {
        $idioma = $idioma ?? app()->getLocale();
        
        return self::create([
            'titulo' => $titulo,
            'ruta' => $ruta,
            'orden' => $orden,
            'activo' => $activo,
            'idioma' => $idioma,
        ]);
    }

    // ============================================
    // MÉTODOS DE INSTANCIA
    // ============================================

    /**
     * Verificar si tiene submenús
     */
    public function tieneHijos()
    {
        return $this->hijos()->exists();
    }

    /**
     * Verificar si es un submenú
     */
    public function esSubmenu()
    {
        return !is_null($this->parent_id);
    }

    /**
     * Obtener la URL completa del item
     */
    public function getUrlCompleta()
    {
        // Si tiene URL personalizada, usarla
        if ($this->url) {
            return $this->url;
        }
        
        // Si no, generar desde la ruta
        if ($this->ruta) {
            return route($this->ruta);
        }
        
        return '#';
    }

    /**
     * Verificar si el item está activo en la ruta actual
     */
    public function estaActivo()
    {
        return request()->routeIs($this->ruta);
    }
}