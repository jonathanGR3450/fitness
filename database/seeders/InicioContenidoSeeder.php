<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class InicioContenidoSeeder extends Seeder
{
    public function run(): void
    {
        $pagina = 'inicio';
        $idioma = 'es';
        $now = Carbon::now();

        // Helper para mantener el orden y evitar duplicados
        $insert = function (string $seccion, string $clave, string $tipo, $valor, int $orden, ?string $descripcion = null) use ($pagina, $idioma, $now) {
            DB::table('contenidos')->updateOrInsert(
                [
                    'pagina'  => $pagina,
                    'seccion' => $seccion,
                    'clave'   => $clave,
                    'idioma'  => $idioma,
                ],
                [
                    'tipo'        => $tipo,
                    'valor'       => $valor,
                    'orden'       => $orden,
                    'descripcion' => $descripcion,
                    'updated_at'  => $now,
                    'created_at'  => $now,
                ]
            );
        };

        /* =========================
         * HERO
         * ========================= */
        $o = 0;
        $insert('hero', 'titulo',      'texto',  'Transforma tu vida con el Move Challenge', ++$o);
        $insert('hero', 'subtitulo',   'texto',  '30 días de movimiento consciente, nutrición balanceada y conexión interior. Únete a nuestra comunidad y descubre tu mejor versión.', ++$o);
        $insert('hero', 'boton_texto', 'texto',  'Quiero mi cupo', ++$o);
        $insert('hero', 'boton_url',   'url',    '#contact', ++$o);
        // Usa una imagen por defecto que exista en /public/images
        $insert('hero', 'imagen',      'imagen', 'images/sinfondo.png', ++$o);

        /* =========================
         * FEATURES
         * ========================= */
        $o = 0;
        $insert('features', 'titulo_seccion',    'texto', '¿Qué incluye el Move Challenge?', ++$o);
        $insert('features', 'subtitulo_seccion', 'texto', 'Todo lo que necesitas para crear hábitos sostenibles y transformar tu bienestar', ++$o);

        $features = [
            ['fas fa-dumbbell',  'Plan de entrenamiento semipersonalizado', 'Rutinas adaptadas para casa o gimnasio, diseñadas según tu nivel y objetivos específicos.'],
            ['fas fa-apple-alt', 'Plan de alimentación nutritivo',          'Menús balanceados adaptados a tus requerimientos y gustos, sin restricciones extremas.'],
            ['fas fa-utensils',  'Recetas fáciles y deliciosas',            'Preparaciones simples y nutritivas que se adaptan a tu rutina diaria.'],
            ['fas fa-spa',       'Meditación y respiración',                'Técnicas guiadas para conectar cuerpo y mente, reducir estrés y mejorar tu bienestar.'],
            ['fas fa-lightbulb', 'Tips de conexión interior',               'Herramientas prácticas para desarrollar consciencia y mantener la motivación.'],
            ['fas fa-users',     'Comunidad de apoyo',                      'Acompañamiento constante de profesionales y compañeros en tu journey.'],
        ];

        foreach ($features as $i => [$icono, $titulo, $descripcion]) {
            $idx = $i + 1;
            $insert('features', "feature_{$idx}_icono",       'texto', $icono,       ++$o);
            $insert('features', "feature_{$idx}_titulo",      'texto', $titulo,      ++$o);
            $insert('features', "feature_{$idx}_descripcion", 'texto', $descripcion, ++$o);
        }

        /* =========================
         * ABOUT
         * ========================= */
        $o = 0;
        $insert('about', 'titulo',        'texto', '¿Qué es el Move Challenge?', ++$o);
        $insert('about', 'descripcion_1', 'texto', 'El Move Challenge es un programa integral de 30 días diseñado para transformar tu vida a través del movimiento consciente y hábitos saludables sostenibles.', ++$o);
        $insert('about', 'descripcion_2', 'texto', 'No es solo un reto fitness, es una experiencia completa que integra entrenamiento físico, nutrición balanceada, mindfulness y el poder de una comunidad comprometida.', ++$o);
        // Si usas <video> con archivos locales, este campo puede quedar vacío (lo usas como opcional)
        $insert('about', 'video_url',     'video', '', ++$o);
        $insert('about', 'boton_texto',   'texto', 'Conoce más detalles', ++$o);
        $insert('about', 'boton_url',     'url',   'https://wa.link/nq2ezt', ++$o);

        /* =========================
         * GALLERY
         * ========================= */
        $o = 0;
        $insert('gallery', 'titulo_seccion',    'texto', 'Momentos del Move Challenge', ++$o);
        $insert('gallery', 'subtitulo_seccion', 'texto', 'Historias reales de transformación y superación personal', ++$o);
        $insert('gallery', 'imagen_1',          'imagen', 'images/move-1.png', ++$o);
        $insert('gallery', 'imagen_2',          'imagen', 'images/move-2.png', ++$o);
        $insert('gallery', 'imagen_3',          'imagen', 'images/move-3.png', ++$o);
        $insert('gallery', 'imagen_4',          'imagen', 'images/move-4.png', ++$o);

        /* =========================
         * QUOTE
         * ========================= */
        $o = 0;
        $insert('quote', 'texto', 'texto', 'El movimiento es medicina. Cuando mueves tu cuerpo, transformas tu mente y elevas tu espíritu.', ++$o);
        $insert('quote', 'autor', 'texto', 'Anabelle Ibalu', ++$o);

        /* =========================
         * PRICING
         * ========================= */
        $o = 0;
        $insert('pricing', 'titulo_seccion',    'texto', 'Elige tu plan de transformación', ++$o);
        $insert('pricing', 'subtitulo_seccion', 'texto', 'Inversión en tu bienestar con resultados garantizados', ++$o);

        // Plan 1 - Starter
        $insert('pricing', 'plan_1_nombre',   'texto', 'Starter', ++$o);
        $insert('pricing', 'plan_1_precio',   'texto', '$49',     ++$o);
        $insert('pricing', 'plan_1_periodo',  'texto', 'Plan de 30 días', ++$o);

        // Plan 2 - Premium (featured)
        $insert('pricing', 'plan_2_nombre',   'texto', 'Premium', ++$o);
        $insert('pricing', 'plan_2_precio',   'texto', '$99',     ++$o);
        $insert('pricing', 'plan_2_periodo',  'texto', 'Plan de 30 días', ++$o);

        // Plan 3 - Elite
        $insert('pricing', 'plan_3_nombre',   'texto', 'Elite', ++$o);
        $insert('pricing', 'plan_3_precio',   'texto', '$199', ++$o);
        $insert('pricing', 'plan_3_periodo',  'texto', 'Plan de 90 días', ++$o);

        /* =========================
         * CONTACT
         * ========================= */
        $o = 0;
        $insert('contact', 'titulo',          'texto', '¿Lista/o para empezar tu transformación?', ++$o);
        $insert('contact', 'descripcion',     'texto', 'Escríbeme y te comparto todos los detalles del programa, próximas fechas de inicio y cómo puedes reservar tu cupo.', ++$o);
        $insert('contact', 'email',           'texto', 'hola@anabelleibalu.com', ++$o);
        $insert('contact', 'instagram',       'texto', '@anabelleibalu', ++$o);
        $insert('contact', 'whatsapp_url',    'url',   'https://wa.link/nq2ezt', ++$o);
        $insert('contact', 'whatsapp_texto',  'texto', 'Habla conmigo por WhatsApp', ++$o);
    }
}
