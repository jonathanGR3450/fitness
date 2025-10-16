<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Configuracion;

class MoveController extends Controller
{
    /**
     * Mostrar el formulario de edición de la página de inicio
     */
    public function edit()
    {
        $pagina = 'move';
        $idioma = 'es'; // O usar: app()->getLocale()
        
        // Obtener TODOS los contenidos de la página agrupados por sección
        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion');
        
        // Obtener secciones únicas para el menú lateral
        $secciones = $contenidos->keys();
        
        // Obtener configuraciones globales (por si las necesitas)
        $configuraciones = Configuracion::where('idioma', $idioma)
            ->get()
            ->groupBy('grupo');

        return view('pages.edit.move', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    /**
     * 🔥 MOVE HERO
     */
    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'idioma' => 'required|string',
            'pagina' => 'required|string|in:move',

            'move_hero__badge' => 'nullable|string|max:100',
            'move_hero__badge_icono' => 'nullable|string|max:100',
            'move_hero__titulo_1' => 'required|string|max:255',
            'move_hero__titulo_2' => 'required|string|max:255',
            'move_hero__descripcion' => 'nullable|string',

            'move_hero__stat_1_num' => 'nullable|string|max:50',
            'move_hero__stat_1_lbl' => 'nullable|string|max:100',
            'move_hero__stat_2_num' => 'nullable|string|max:50',
            'move_hero__stat_2_lbl' => 'nullable|string|max:100',
            'move_hero__stat_3_num' => 'nullable|string|max:50',
            'move_hero__stat_3_lbl' => 'nullable|string|max:100',

            'move_hero__boton_texto' => 'nullable|string|max:100',
            'move_hero__boton_url' => 'nullable|string|max:255',

            'move_hero__card_badge' => 'nullable|string|max:100',
            'move_hero__card_badge_icono' => 'nullable|string|max:100',
            'move_hero__card_titulo' => 'nullable|string|max:255',

            'move_hero__card_item_1' => 'nullable|string|max:255',
            'move_hero__card_item_2' => 'nullable|string|max:255',
            'move_hero__card_item_3' => 'nullable|string|max:255',
            'move_hero__card_item_4' => 'nullable|string|max:255',

            'move_hero__card_boton_texto' => 'nullable|string|max:100',
            'move_hero__card_boton_url' => 'nullable|string|max:255',
            'move_hero__card_footer' => 'nullable|string|max:255',
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden = 0;

        $pairs = [
            'badge'                 => ['texto', $request->input('move_hero__badge')],
            'badge_icono'           => ['texto', $request->input('move_hero__badge_icono')],
            'titulo_1'              => ['texto', $request->input('move_hero__titulo_1')],
            'titulo_2'              => ['texto', $request->input('move_hero__titulo_2')],
            'descripcion'           => ['texto', $request->input('move_hero__descripcion')],
            'stat_1_num'            => ['texto', $request->input('move_hero__stat_1_num')],
            'stat_1_lbl'            => ['texto', $request->input('move_hero__stat_1_lbl')],
            'stat_2_num'            => ['texto', $request->input('move_hero__stat_2_num')],
            'stat_2_lbl'            => ['texto', $request->input('move_hero__stat_2_lbl')],
            'stat_3_num'            => ['texto', $request->input('move_hero__stat_3_num')],
            'stat_3_lbl'            => ['texto', $request->input('move_hero__stat_3_lbl')],
            'boton_texto'           => ['texto', $request->input('move_hero__boton_texto')],
            'boton_url'             => ['url',   $request->input('move_hero__boton_url')],
            'card_badge'            => ['texto', $request->input('move_hero__card_badge')],
            'card_badge_icono'      => ['texto', $request->input('move_hero__card_badge_icono')],
            'card_titulo'           => ['texto', $request->input('move_hero__card_titulo')],
            'card_item_1'           => ['texto', $request->input('move_hero__card_item_1')],
            'card_item_2'           => ['texto', $request->input('move_hero__card_item_2')],
            'card_item_3'           => ['texto', $request->input('move_hero__card_item_3')],
            'card_item_4'           => ['texto', $request->input('move_hero__card_item_4')],
            'card_boton_texto'      => ['texto', $request->input('move_hero__card_boton_texto')],
            'card_boton_url'        => ['url',   $request->input('move_hero__card_boton_url')],
            'card_footer'           => ['texto', $request->input('move_hero__card_footer')],
        ];

        foreach ($pairs as $clave => [$tipo, $valor]) {
            $this->saveContenido($pagina, 'move_hero', $clave, $idioma, $tipo, $valor, ++$orden);
        }

        return back()->with('success', '✅ Move Hero actualizado correctamente');
    }

    /**
     * 🎥 ABOUT MOVE (video + textos + 4 valores)
     */
    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            // Poster (imagen)
            'about_move__poster_url'  => 'nullable|string|max:255',
            'about_move__poster_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',

            // Video (SOLO WEBM)
            'about_move__video_url'   => 'nullable|string|max:255',
            'about_move__video_file'  => 'nullable|mimetypes:video/webm|max:102400', // ~100MB

            // Textos
            'about_move__badge'       => 'nullable|string|max:100',
            'about_move__titulo'      => 'nullable|string|max:255',
            'about_move__parrafo_1'   => 'nullable|string',
            'about_move__parrafo_2'   => 'nullable|string',

            // Valores
            'about_move__value_1_icono' => 'nullable|string|max:100',
            'about_move__value_1_titulo'=> 'nullable|string|max:100',
            'about_move__value_2_icono' => 'nullable|string|max:100',
            'about_move__value_2_titulo'=> 'nullable|string|max:100',
            'about_move__value_3_icono' => 'nullable|string|max:100',
            'about_move__value_3_titulo'=> 'nullable|string|max:100',
            'about_move__value_4_icono' => 'nullable|string|max:100',
            'about_move__value_4_titulo'=> 'nullable|string|max:100',

            'idioma' => 'required|string',
            'pagina' => 'required|string', // 'move'
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden  = 0;

        // ===== Poster (imagen) =====
        $posterValor = null;
        if ($request->hasFile('about_move__poster_file')) {
            $file = $request->file('about_move__poster_file');
            $filename = 'about_move_poster_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $posterValor = 'images/' . $filename;

            // borrar anterior
            $prev = Contenido::where('pagina',$pagina)->where('seccion','about_move')
                    ->where('clave','video_poster')->where('idioma',$idioma)->first();
            if ($prev && $prev->valor) {
                $ruta = public_path($prev->valor);
                if (is_file($ruta)) @unlink($ruta);
            }
        } elseif ($request->filled('about_move__poster_url')) {
            $posterValor = $request->input('about_move__poster_url');
        } else {
            $posterValor = optional(
                Contenido::where('pagina',$pagina)->where('seccion','about_move')
                    ->where('clave','video_poster')->where('idioma',$idioma)->first()
            )->valor;
        }

        // ===== Video (SOLO WEBM) =====
        $videoValor = null;
        if ($request->hasFile('about_move__video_file')) {
            $file = $request->file('about_move__video_file');
            // forzamos .webm
            $filename = 'about_move_video_' . time() . '_' . uniqid() . '.webm';
            $file->move(public_path('video'), $filename);
            $videoValor = 'video/' . $filename;

            // borrar anterior
            $prev = Contenido::where('pagina',$pagina)->where('seccion','about_move')
                    ->where('clave','video_webm')->where('idioma',$idioma)->first();
            if ($prev && $prev->valor) {
                $ruta = public_path($prev->valor);
                if (is_file($ruta)) @unlink($ruta);
            }
        } elseif ($request->filled('about_move__video_url')) {
            // Si quieres, valida que termine en .webm
            $videoValor = $request->input('about_move__video_url');
        } else {
            $videoValor = optional(
                Contenido::where('pagina',$pagina)->where('seccion','about_move')
                    ->where('clave','video_webm')->where('idioma',$idioma)->first()
            )->valor;
        }

        // ===== Guardado =====
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about_move','clave'=>'video_poster','idioma'=>$idioma],
            ['tipo'=>'imagen','valor'=>$posterValor,'orden'=>++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about_move','clave'=>'video_webm','idioma'=>$idioma],
            ['tipo'=>'video','valor'=>$videoValor,'orden'=>++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about_move','clave'=>'badge','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('about_move__badge'),'orden'=>++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about_move','clave'=>'titulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('about_move__titulo'),'orden'=>++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about_move','clave'=>'parrafo_1','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('about_move__parrafo_1'),'orden'=>++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about_move','clave'=>'parrafo_2','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('about_move__parrafo_2'),'orden'=>++$orden]
        );

        for ($i=1;$i<=4;$i++){
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'about_move','clave'=>"value_{$i}_icono",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("about_move__value_{$i}_icono"),'orden'=>++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'about_move','clave'=>"value_{$i}_titulo",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("about_move__value_{$i}_titulo"),'orden'=>++$orden]
            );
        }

        return back()->with('success','✅ About Move actualizado (solo WEBM)');
    }

    /**
     * ⭐ INCLUDES (6 ítems)
     */
    public function updateIncludes(Request $request)
    {
        $validated = $request->validate([
            'idioma' => 'required|string',
            'pagina' => 'required|string|in:move',

            'includes__titulo_seccion'    => 'required|string|max:255',
            'includes__subtitulo_seccion' => 'nullable|string|max:500',
        ] + $this->rulesItems('includes__item_', 6));

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden = 0;

        $this->saveContenido($pagina, 'includes', 'titulo_seccion',    $idioma, 'texto', $request->input('includes__titulo_seccion'), ++$orden);
        $this->saveContenido($pagina, 'includes', 'subtitulo_seccion', $idioma, 'texto', $request->input('includes__subtitulo_seccion'), ++$orden);

        for ($i = 1; $i <= 6; $i++) {
            $this->saveContenido($pagina, 'includes', "item_{$i}_icono",      $idioma, 'texto', $request->input("includes__item_{$i}_icono"), ++$orden);
            $this->saveContenido($pagina, 'includes', "item_{$i}_titulo",     $idioma, 'texto', $request->input("includes__item_{$i}_titulo"), ++$orden);
            $this->saveContenido($pagina, 'includes', "item_{$i}_descripcion",$idioma, 'texto', $request->input("includes__item_{$i}_descripcion"), ++$orden);
        }

        return back()->with('success', '✅ Sección “¿Qué incluye?” actualizada correctamente');
    }

    /**
     * ⚙️ HOW IT WORKS (3 pasos)
     */
    public function updateHow(Request $request)
    {
        $validated = $request->validate([
            'idioma' => 'required|string',
            'pagina' => 'required|string|in:move',

            'how_works__titulo_seccion'    => 'required|string|max:255',
            'how_works__subtitulo_seccion' => 'nullable|string|max:500',

            'how_works__step_1_titulo'      => 'required|string|max:100',
            'how_works__step_1_descripcion' => 'required|string',
            'how_works__step_2_titulo'      => 'required|string|max:100',
            'how_works__step_2_descripcion' => 'required|string',
            'how_works__step_3_titulo'      => 'required|string|max:100',
            'how_works__step_3_descripcion' => 'required|string',
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden = 0;

        $this->saveContenido($pagina, 'how_works', 'titulo_seccion',    $idioma, 'texto', $request->input('how_works__titulo_seccion'), ++$orden);
        $this->saveContenido($pagina, 'how_works', 'subtitulo_seccion', $idioma, 'texto', $request->input('how_works__subtitulo_seccion'), ++$orden);

        for ($i = 1; $i <= 3; $i++) {
            $this->saveContenido($pagina, 'how_works', "step_{$i}_titulo",      $idioma, 'texto', $request->input("how_works__step_{$i}_titulo"), ++$orden);
            $this->saveContenido($pagina, 'how_works', "step_{$i}_descripcion", $idioma, 'texto', $request->input("how_works__step_{$i}_descripcion"), ++$orden);
        }

        return back()->with('success', '✅ Sección “Cómo funciona” actualizada correctamente');
    }

    /**
     * 🏆 BENEFICIOS + TESTIMONIAL
     */
    public function updateBenefits(Request $request)
    {
        $validated = $request->validate([
            // Beneficios
            'benefits__benefit_1_icono' => 'nullable|string|max:100',
            'benefits__benefit_1_titulo' => 'nullable|string|max:150',
            'benefits__benefit_1_descripcion' => 'nullable|string',
            'benefits__benefit_2_icono' => 'nullable|string|max:100',
            'benefits__benefit_2_titulo' => 'nullable|string|max:150',
            'benefits__benefit_2_descripcion' => 'nullable|string',
            'benefits__benefit_3_icono' => 'nullable|string|max:100',
            'benefits__benefit_3_titulo' => 'nullable|string|max:150',
            'benefits__benefit_3_descripcion' => 'nullable|string',

            // Testimonial
            'benefits__testimonial_texto'  => 'nullable|string',
            'benefits__testimonial_autor'  => 'nullable|string|max:150',
            'benefits__testimonial_detalle'=> 'nullable|string|max:150',

            // Avatar: archivo o URL
            'benefits__testimonial_avatar_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'benefits__testimonial_avatar_url'  => 'nullable|string|max:255',

            'idioma' => 'required|string',
            'pagina' => 'required|string', // 'move'
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden  = 0;

        // ===== Guardar beneficios (1..3)
        for ($i=1;$i<=3;$i++){
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'benefits','clave'=>"benefit_{$i}_icono",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("benefits__benefit_{$i}_icono"),'orden'=>++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'benefits','clave'=>"benefit_{$i}_titulo",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("benefits__benefit_{$i}_titulo"),'orden'=>++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'benefits','clave'=>"benefit_{$i}_descripcion",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("benefits__benefit_{$i}_descripcion"),'orden'=>++$orden]
            );
        }

        // ===== Testimonial (texto)
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'benefits','clave'=>'testimonial_texto','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('benefits__testimonial_texto'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'benefits','clave'=>'testimonial_autor','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('benefits__testimonial_autor'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'benefits','clave'=>'testimonial_detalle','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('benefits__testimonial_detalle'),'orden'=>++$orden]
        );

        // ===== Testimonial Avatar (imagen: archivo o URL)
        $avatarValor = null;

        if ($request->hasFile('benefits__testimonial_avatar_file')) {
            $file = $request->file('benefits__testimonial_avatar_file');
            $filename = 'benefit_avatar_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $avatarValor = 'images/' . $filename;

            // borrar anterior
            $prev = Contenido::where('pagina',$pagina)->where('seccion','benefits')
                    ->where('clave','testimonial_avatar')->where('idioma',$idioma)->first();
            if ($prev && $prev->valor) {
                $ruta = public_path($prev->valor);
                if (is_file($ruta)) @unlink($ruta);
            }
        } elseif ($request->filled('benefits__testimonial_avatar_url')) {
            $avatarValor = $request->input('benefits__testimonial_avatar_url');
        } else {
            // mantener el actual
            $avatarValor = optional(
                Contenido::where('pagina',$pagina)->where('seccion','benefits')
                    ->where('clave','testimonial_avatar')->where('idioma',$idioma)->first()
            )->valor;
        }

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'benefits','clave'=>'testimonial_avatar','idioma'=>$idioma],
            ['tipo'=>'imagen','valor'=>$avatarValor,'orden'=>++$orden]
        );

        return back()->with('success','✅ Beneficios & Testimonial actualizados correctamente');
    }


    /**
     * 🚀 CTA MOVE
     */
    public function updateCta(Request $request)
    {
        $validated = $request->validate([
            'idioma' => 'required|string',
            'pagina' => 'required|string|in:move',

            'cta_move__titulo'       => 'required|string|max:255',
            'cta_move__subtitulo'    => 'nullable|string|max:500',
            'cta_move__boton_texto'  => 'required|string|max:100',
            'cta_move__boton_url'    => 'nullable|string|max:255',
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden = 0;

        $this->saveContenido($pagina, 'cta_move', 'titulo',      $idioma, 'texto', $request->input('cta_move__titulo'), ++$orden);
        $this->saveContenido($pagina, 'cta_move', 'subtitulo',   $idioma, 'texto', $request->input('cta_move__subtitulo'), ++$orden);
        $this->saveContenido($pagina, 'cta_move', 'boton_texto', $idioma, 'texto', $request->input('cta_move__boton_texto'), ++$orden);
        $this->saveContenido($pagina, 'cta_move', 'boton_url',   $idioma, 'url',   $request->input('cta_move__boton_url'), ++$orden);

        return back()->with('success', '✅ CTA actualizada correctamente');
    }

    /* ============================================================
     * Helpers
     * ============================================================
     */

    /**
     * Crea reglas repetitivas para items (icono/titulo/descripcion).
     */
    private function rulesItems(string $prefix, int $count): array
    {
        $rules = [];
        for ($i = 1; $i <= $count; $i++) {
            $rules["{$prefix}{$i}_icono"]       = 'nullable|string|max:100';
            $rules["{$prefix}{$i}_titulo"]      = 'nullable|string|max:150';
            $rules["{$prefix}{$i}_descripcion"] = 'nullable|string';
        }
        return $rules;
    }

    /**
     * Guardado estándar en contenidos con updateOrCreate.
     */
    private function saveContenido(string $pagina, string $seccion, string $clave, string $idioma, string $tipo, $valor, int $orden): void
    {
        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => $seccion, 'clave' => $clave, 'idioma' => $idioma],
            ['tipo' => $tipo, 'valor' => $valor, 'orden' => $orden]
        );
    }
}