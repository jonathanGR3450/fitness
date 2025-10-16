<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['slug' => 'inicio',    'title' => 'Inicio'],
            ['slug' => 'sobre-mi',  'title' => 'Sobre mí'],
            ['slug' => 'move',      'title' => 'MOVE Challenge'],
            ['slug' => 'community', 'title' => 'Comunidad'],
            ['slug' => 'contact',   'title' => 'Contacto'],
            ['slug' => 'blog',      'title' => 'Blog'],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug' => $p['slug']], $p + ['is_active' => true]);
        }
    }
}
