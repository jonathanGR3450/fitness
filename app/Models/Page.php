<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',       // ej: inicio, sobre-mi, move, community, contact, blog
        'title',      // ej: Inicio, Sobre mí, etc.
        'section',    // opcional (puedes usarlo para agrupar)
        'content',    // opcional
        'images',     // opcional
        'videos',     // opcional
        'is_active',  // bool
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // One-to-one SEO
    public function seo(): HasOne
    {
        return $this->hasOne(Seo::class);
    }

    // helpers legacy (tu ejemplo traía estos)
    public function getImagesArray(): array
    {
        if (empty($this->images)) return [];
        return explode(',', $this->images);
    }

    public function getVideosArray(): array
    {
        if (empty($this->videos)) return [];
        return explode(',', $this->videos);
    }

    public function setImagesArray($images): void
    {
        $this->images = empty($images) ? null : implode(',', $images);
    }

    public function setVideosArray($videos): void
    {
        $this->videos = empty($videos) ? null : implode(',', $videos);
    }
}
