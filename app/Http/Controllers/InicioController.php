<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Configuracion;

class InicioController extends Controller
{
    /**
     * Mostrar el formulario de edición de la página de inicio
     */
    public function edit()
    {
        $pagina = 'inicio';
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
        
        return view('pages.edit.inicio', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    /**
     * Actualizar sección HERO
     */
public function updateHero(Request $request)
{
    $validated = $request->validate([
        'hero__titulo' => 'required|string|max:255',
        'hero__subtitulo' => 'required|string|max:500',
        'hero__boton_texto' => 'required|string|max:100',
        'hero__boton_url' => 'required|string|max:255',
        'hero__imagen_url' => 'nullable|string|max:255',
        'hero__imagen_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048', // Máx 2MB
        'idioma' => 'required|string',
        'pagina' => 'required|string',
    ]);

    $idioma = $request->input('idioma');
    $pagina = $request->input('pagina');
    
    // ========================================
    // MANEJAR LA IMAGEN
    // ========================================
    $imagenValor = null;
    
    // Prioridad 1: Si subió un archivo nuevo
    if ($request->hasFile('hero__imagen_file')) {
        $file = $request->file('hero__imagen_file');
        
        // Generar nombre único para el archivo
        $filename = 'hero_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Guardar en public/images
        $file->move(public_path('images'), $filename);
        
        $imagenValor = 'images/' . $filename;
        
        // Opcional: Eliminar imagen anterior si existe
        $imagenAnterior = Contenido::where('pagina', $pagina)
            ->where('seccion', 'hero')
            ->where('clave', 'imagen')
            ->where('idioma', $idioma)
            ->first();
            
        if ($imagenAnterior && $imagenAnterior->valor) {
            $rutaAnterior = public_path($imagenAnterior->valor);
            if (file_exists($rutaAnterior) && is_file($rutaAnterior)) {
                @unlink($rutaAnterior);
            }
        }
    }
    // Prioridad 2: Si ingresó URL manual
    elseif ($request->filled('hero__imagen_url')) {
        $imagenValor = $request->input('hero__imagen_url');
    }
    // Prioridad 3: Mantener la imagen actual si no cambió nada
    else {
        $imagenActual = Contenido::where('pagina', $pagina)
            ->where('seccion', 'hero')
            ->where('clave', 'imagen')
            ->where('idioma', $idioma)
            ->first();
            
        if ($imagenActual) {
            $imagenValor = $imagenActual->valor;
        }
    }

    // ========================================
    // GUARDAR TODOS LOS CAMPOS
    // ========================================
    
    // Guardar título
    Contenido::updateOrCreate(
        ['pagina' => $pagina, 'seccion' => 'hero', 'clave' => 'titulo', 'idioma' => $idioma],
        ['tipo' => 'texto', 'valor' => $request->input('hero__titulo'), 'orden' => 1]
    );

    // Guardar subtítulo
    Contenido::updateOrCreate(
        ['pagina' => $pagina, 'seccion' => 'hero', 'clave' => 'subtitulo', 'idioma' => $idioma],
        ['tipo' => 'texto', 'valor' => $request->input('hero__subtitulo'), 'orden' => 2]
    );

    // Guardar botón texto
    Contenido::updateOrCreate(
        ['pagina' => $pagina, 'seccion' => 'hero', 'clave' => 'boton_texto', 'idioma' => $idioma],
        ['tipo' => 'texto', 'valor' => $request->input('hero__boton_texto'), 'orden' => 3]
    );

    // Guardar botón URL
    Contenido::updateOrCreate(
        ['pagina' => $pagina, 'seccion' => 'hero', 'clave' => 'boton_url', 'idioma' => $idioma],
        ['tipo' => 'url', 'valor' => $request->input('hero__boton_url'), 'orden' => 4]
    );

    // Guardar imagen
    Contenido::updateOrCreate(
        ['pagina' => $pagina, 'seccion' => 'hero', 'clave' => 'imagen', 'idioma' => $idioma],
        ['tipo' => 'imagen', 'valor' => $imagenValor, 'orden' => 5]
    );

    return redirect()->back()->with('success', '✅ Sección Hero actualizada correctamente');
}

    /**
     * Actualizar sección FEATURES
     */
    public function updateFeatures(Request $request)
    {
        $validated = $request->validate([
            'features__titulo_seccion' => 'required|string|max:255',
            'features__subtitulo_seccion' => 'required|string|max:500',
            'features__feature_1_icono' => 'required|string|max:100',
            'features__feature_1_titulo' => 'required|string|max:255',
            'features__feature_1_descripcion' => 'required|string|max:500',
            'features__feature_2_icono' => 'required|string|max:100',
            'features__feature_2_titulo' => 'required|string|max:255',
            'features__feature_2_descripcion' => 'required|string|max:500',
            'features__feature_3_icono' => 'required|string|max:100',
            'features__feature_3_titulo' => 'required|string|max:255',
            'features__feature_3_descripcion' => 'required|string|max:500',
            'features__feature_4_icono' => 'required|string|max:100',
            'features__feature_4_titulo' => 'required|string|max:255',
            'features__feature_4_descripcion' => 'required|string|max:500',
            'features__feature_5_icono' => 'required|string|max:100',
            'features__feature_5_titulo' => 'required|string|max:255',
            'features__feature_5_descripcion' => 'required|string|max:500',
            'features__feature_6_icono' => 'required|string|max:100',
            'features__feature_6_titulo' => 'required|string|max:255',
            'features__feature_6_descripcion' => 'required|string|max:500',
            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden = 0;

        // Guardar títulos de sección
        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'features', 'clave' => 'titulo_seccion', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('features__titulo_seccion'), 'orden' => ++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'features', 'clave' => 'subtitulo_seccion', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('features__subtitulo_seccion'), 'orden' => ++$orden]
        );

        // Guardar cada feature
        for ($i = 1; $i <= 6; $i++) {
            Contenido::updateOrCreate(
                ['pagina' => $pagina, 'seccion' => 'features', 'clave' => "feature_{$i}_icono", 'idioma' => $idioma],
                ['tipo' => 'texto', 'valor' => $request->input("features__feature_{$i}_icono"), 'orden' => ++$orden]
            );

            Contenido::updateOrCreate(
                ['pagina' => $pagina, 'seccion' => 'features', 'clave' => "feature_{$i}_titulo", 'idioma' => $idioma],
                ['tipo' => 'texto', 'valor' => $request->input("features__feature_{$i}_titulo"), 'orden' => ++$orden]
            );

            Contenido::updateOrCreate(
                ['pagina' => $pagina, 'seccion' => 'features', 'clave' => "feature_{$i}_descripcion", 'idioma' => $idioma],
                ['tipo' => 'texto', 'valor' => $request->input("features__feature_{$i}_descripcion"), 'orden' => ++$orden]
            );
        }

        return redirect()->back()->with('success', '✅ Sección Features actualizada correctamente');
    }

    /**
     * Actualizar sección ABOUT
     */
    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'about__titulo'         => 'required|string|max:255',
            'about__descripcion_1'  => 'required|string',
            'about__descripcion_2'  => 'nullable|string',
            // Poster (imagen)
            'about__poster_url'     => 'nullable|string|max:255',
            'about__poster_file'    => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            // Video (solo webm)
            'about__video_url'      => 'nullable|string|max:255',
            'about__video_file'     => 'nullable|mimetypes:video/webm|max:51200', // ~50MB
            'about__boton_texto'    => 'nullable|string|max:100',
            'about__boton_url'      => 'nullable|string|max:255',
            'idioma'                => 'required|string',
            'pagina'                => 'required|string',

            'about__feature_1_icono' => 'nullable|string|max:100',
            'about__feature_1_texto' => 'nullable|string|max:255',
            'about__feature_2_icono' => 'nullable|string|max:100',
            'about__feature_2_texto' => 'nullable|string|max:255',
            'about__feature_3_icono' => 'nullable|string|max:100',
            'about__feature_3_texto' => 'nullable|string|max:255',
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');

        // ======================
        // POSTER (imagen)
        // ======================
        $posterValor = null;

        if ($request->hasFile('about__poster_file')) {
            $file = $request->file('about__poster_file');
            $filename = 'about_poster_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $posterValor = 'images/' . $filename;

            // eliminar anterior
            $anterior = Contenido::where('pagina',$pagina)->where('seccion','about')->where('clave','poster')->where('idioma',$idioma)->first();
            if ($anterior && $anterior->valor) {
                $ruta = public_path($anterior->valor);
                if (is_file($ruta)) @unlink($ruta);
            }
        } elseif ($request->filled('about__poster_url')) {
            $posterValor = $request->input('about__poster_url');
        } else {
            $actual = Contenido::where('pagina',$pagina)->where('seccion','about')->where('clave','poster')->where('idioma',$idioma)->first();
            $posterValor = $actual?->valor; // mantener
        }

        // ======================
        // VIDEO (solo webm)
        // ======================
        $videoValor = null;

        if ($request->hasFile('about__video_file')) {
            $file = $request->file('about__video_file');
            // forzar .webm
            $filename = 'about_video_' . time() . '_' . uniqid() . '.webm';
            $file->move(public_path('video'), $filename);
            $videoValor = 'video/' . $filename;

            // eliminar anterior
            $anterior = Contenido::where('pagina',$pagina)->where('seccion','about')->where('clave','video_url')->where('idioma',$idioma)->first();
            if ($anterior && $anterior->valor) {
                $ruta = public_path($anterior->valor);
                if (is_file($ruta)) @unlink($ruta);
            }
        } elseif ($request->filled('about__video_url')) {
            // puedes validar extensión .webm si quieres
            $videoValor = $request->input('about__video_url');
        } else {
            $actual = Contenido::where('pagina',$pagina)->where('seccion','about')->where('clave','video_url')->where('idioma',$idioma)->first();
            $videoValor = $actual?->valor; // mantener
        }

        // ======================
        // GUARDAR
        // ======================
        $orden = 0;

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about','clave'=>'titulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('about__titulo'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about','clave'=>'descripcion_1','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('about__descripcion_1'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about','clave'=>'descripcion_2','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('about__descripcion_2'),'orden'=>++$orden]
        );
        // Poster
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about','clave'=>'poster','idioma'=>$idioma],
            ['tipo'=>'imagen','valor'=>$posterValor,'orden'=>++$orden]
        );
        // Video webm
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about','clave'=>'video_url','idioma'=>$idioma],
            ['tipo'=>'video','valor'=>$videoValor,'orden'=>++$orden]
        );
        // Botón
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about','clave'=>'boton_texto','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('about__boton_texto'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'about','clave'=>'boton_url','idioma'=>$idioma],
            ['tipo'=>'url','valor'=>$request->input('about__boton_url'),'orden'=>++$orden]
        );

        // Features (3)
        for ($i = 1; $i <= 3; $i++) {
            Contenido::updateOrCreate(
                ['pagina' => $pagina, 'seccion' => 'about', 'clave' => "feature_{$i}_icono", 'idioma' => $idioma],
                ['tipo' => 'texto', 'valor' => $request->input("about__feature_{$i}_icono"), 'orden' => ++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina' => $pagina, 'seccion' => 'about', 'clave' => "feature_{$i}_texto", 'idioma' => $idioma],
                ['tipo' => 'texto', 'valor' => $request->input("about__feature_{$i}_texto"), 'orden' => ++$orden]
            );
        }

        return redirect()->back()->with('success','✅ Sección About actualizada correctamente');
    }

    /**
     * Actualizar sección GALLERY
     */
    public function updateGallery(Request $request)
    {
        $validated = $request->validate([
            'gallery__titulo_seccion'   => 'required|string|max:255',
            'gallery__subtitulo_seccion'=> 'nullable|string|max:500',

            // 4 imágenes: archivo ó URL; ambas opcionales
            'gallery__imagen_1'         => 'nullable|string|max:255',
            'gallery__imagen_1_file'    => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'gallery__imagen_2'         => 'nullable|string|max:255',
            'gallery__imagen_2_file'    => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'gallery__imagen_3'         => 'nullable|string|max:255',
            'gallery__imagen_3_file'    => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'gallery__imagen_4'         => 'nullable|string|max:255',
            'gallery__imagen_4_file'    => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',

            // ALT (opcional)
            'gallery__imagen_1_alt'     => 'nullable|string|max:255',
            'gallery__imagen_2_alt'     => 'nullable|string|max:255',
            'gallery__imagen_3_alt'     => 'nullable|string|max:255',
            'gallery__imagen_4_alt'     => 'nullable|string|max:255',

            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden = 0;

        // Título / subtítulo
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'gallery','clave'=>'titulo_seccion','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('gallery__titulo_seccion'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'gallery','clave'=>'subtitulo_seccion','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('gallery__subtitulo_seccion'),'orden'=>++$orden]
        );

        // 4 imágenes
        for ($i = 1; $i <= 4; $i++) {
            $valor = null;

            // 1) si sube archivo
            if ($request->hasFile("gallery__imagen_{$i}_file")) {
                $file = $request->file("gallery__imagen_{$i}_file");
                $filename = "gallery_{$i}_" . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/gallery'), $filename);
                $valor = 'images/gallery/' . $filename;

                // eliminar anterior
                $anterior = Contenido::where('pagina',$pagina)->where('seccion','gallery')->where('clave',"imagen_{$i}")->where('idioma',$idioma)->first();
                if ($anterior && $anterior->valor) {
                    $ruta = public_path($anterior->valor);
                    if (is_file($ruta)) @unlink($ruta);
                }
            }
            // 2) si viene URL manual
            elseif ($request->filled("gallery__imagen_{$i}")) {
                $valor = $request->input("gallery__imagen_{$i}");
            }
            // 3) mantener la actual
            else {
                $actual = Contenido::where('pagina',$pagina)->where('seccion','gallery')->where('clave',"imagen_{$i}")->where('idioma',$idioma)->first();
                $valor = $actual?->valor;
            }

            // guardar imagen
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'gallery','clave'=>"imagen_{$i}",'idioma'=>$idioma],
                ['tipo'=>'imagen','valor'=>$valor,'orden'=>++$orden]
            );

            // guardar ALT (opcional)
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'gallery','clave'=>"imagen_{$i}_alt",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("gallery__imagen_{$i}_alt"),'orden'=>++$orden]
            );
        }

        return redirect()->back()->with('success', '✅ Sección Galería actualizada correctamente');
    }


    /**
     * Actualizar sección QUOTE
     */
    public function updateQuote(Request $request)
    {
        $validated = $request->validate([
            'quote__texto' => 'required|string',
            'quote__autor' => 'nullable|string|max:255',
            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'quote', 'clave' => 'texto', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('quote__texto'), 'orden' => 1]
        );

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'quote', 'clave' => 'autor', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('quote__autor'), 'orden' => 2]
        );

        return redirect()->back()->with('success', '✅ Frase Inspiracional actualizada correctamente');
    }

    /**
     * Actualizar sección PRICING
     */
    public function updatePricing(Request $request)
    {
        $validated = $request->validate([
            'pricing__titulo_seccion'    => 'required|string|max:255',
            'pricing__subtitulo_seccion' => 'nullable|string|max:500',

            // 3 planes base
            'pricing__plan_1_nombre' => 'required|string|max:100',
            'pricing__plan_1_precio' => 'required|string|max:50',
            'pricing__plan_1_periodo'=> 'nullable|string|max:100',
            'pricing__plan_2_nombre' => 'required|string|max:100',
            'pricing__plan_2_precio' => 'required|string|max:50',
            'pricing__plan_2_periodo'=> 'nullable|string|max:100',
            'pricing__plan_3_nombre' => 'required|string|max:100',
            'pricing__plan_3_precio' => 'required|string|max:50',
            'pricing__plan_3_periodo'=> 'nullable|string|max:100',

            // CTA + featured
            'pricing__plan_1_cta_texto' => 'nullable|string|max:100',
            'pricing__plan_1_cta_url'   => 'nullable|string|max:255',
            'pricing__plan_2_cta_texto' => 'nullable|string|max:100',
            'pricing__plan_2_cta_url'   => 'nullable|string|max:255',
            'pricing__plan_3_cta_texto' => 'nullable|string|max:100',
            'pricing__plan_3_cta_url'   => 'nullable|string|max:255',

            'pricing__plan_1_featured' => 'nullable|in:1',
            'pricing__plan_2_featured' => 'nullable|in:1',
            'pricing__plan_3_featured' => 'nullable|in:1',

            // Features (hasta 7 por plan)
            'pricing__plan_1_feature_1' => 'nullable|string|max:255',
            'pricing__plan_1_feature_2' => 'nullable|string|max:255',
            'pricing__plan_1_feature_3' => 'nullable|string|max:255',
            'pricing__plan_1_feature_4' => 'nullable|string|max:255',
            'pricing__plan_1_feature_5' => 'nullable|string|max:255',
            'pricing__plan_1_feature_6' => 'nullable|string|max:255',
            'pricing__plan_1_feature_7' => 'nullable|string|max:255',

            'pricing__plan_2_feature_1' => 'nullable|string|max:255',
            'pricing__plan_2_feature_2' => 'nullable|string|max:255',
            'pricing__plan_2_feature_3' => 'nullable|string|max:255',
            'pricing__plan_2_feature_4' => 'nullable|string|max:255',
            'pricing__plan_2_feature_5' => 'nullable|string|max:255',
            'pricing__plan_2_feature_6' => 'nullable|string|max:255',
            'pricing__plan_2_feature_7' => 'nullable|string|max:255',

            'pricing__plan_3_feature_1' => 'nullable|string|max:255',
            'pricing__plan_3_feature_2' => 'nullable|string|max:255',
            'pricing__plan_3_feature_3' => 'nullable|string|max:255',
            'pricing__plan_3_feature_4' => 'nullable|string|max:255',
            'pricing__plan_3_feature_5' => 'nullable|string|max:255',
            'pricing__plan_3_feature_6' => 'nullable|string|max:255',
            'pricing__plan_3_feature_7' => 'nullable|string|max:255',

            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden = 0;

        // Títulos
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'pricing','clave'=>'titulo_seccion','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('pricing__titulo_seccion'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'pricing','clave'=>'subtitulo_seccion','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('pricing__subtitulo_seccion'),'orden'=>++$orden]
        );

        // 3 planes
        for ($i = 1; $i <= 3; $i++) {
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'pricing','clave'=>"plan_{$i}_nombre",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("pricing__plan_{$i}_nombre"),'orden'=>++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'pricing','clave'=>"plan_{$i}_precio",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("pricing__plan_{$i}_precio"),'orden'=>++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'pricing','clave'=>"plan_{$i}_periodo",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("pricing__plan_{$i}_periodo"),'orden'=>++$orden]
            );

            // CTA
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'pricing','clave'=>"plan_{$i}_cta_texto",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("pricing__plan_{$i}_cta_texto"),'orden'=>++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'pricing','clave'=>"plan_{$i}_cta_url",'idioma'=>$idioma],
                ['tipo'=>'url','valor'=>$request->input("pricing__plan_{$i}_cta_url"),'orden'=>++$orden]
            );

            // Featured (checkbox)
            $isFeatured = $request->boolean("pricing__plan_{$i}_featured") ? '1' : '0';
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'pricing','clave'=>"plan_{$i}_featured",'idioma'=>$idioma],
                ['tipo'=>'bool','valor'=>$isFeatured,'orden'=>++$orden]
            );

            // Features 1..7
            for ($j = 1; $j <= 7; $j++) {
                Contenido::updateOrCreate(
                    ['pagina'=>$pagina,'seccion'=>'pricing','clave'=>"plan_{$i}_feature_{$j}",'idioma'=>$idioma],
                    ['tipo'=>'texto','valor'=>$request->input("pricing__plan_{$i}_feature_{$j}"),'orden'=>++$orden]
                );
            }
        }

        return redirect()->back()->with('success','✅ Sección Precios actualizada correctamente');
    }

    /**
     * Actualizar sección CONTACT
     */
    public function updateContact(Request $request)
    {
        $validated = $request->validate([
            'contact__titulo' => 'required|string|max:255',
            'contact__descripcion' => 'nullable|string',
            'contact__email' => 'nullable|email|max:255',
            'contact__instagram' => 'nullable|string|max:255',
            'contact__whatsapp_url' => 'nullable|string|max:255',
            'contact__whatsapp_texto' => 'nullable|string|max:255',
            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden = 0;

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'contact', 'clave' => 'titulo', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('contact__titulo'), 'orden' => ++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'contact', 'clave' => 'descripcion', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('contact__descripcion'), 'orden' => ++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'contact', 'clave' => 'email', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('contact__email'), 'orden' => ++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'contact', 'clave' => 'instagram', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('contact__instagram'), 'orden' => ++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'contact', 'clave' => 'whatsapp_url', 'idioma' => $idioma],
            ['tipo' => 'url', 'valor' => $request->input('contact__whatsapp_url'), 'orden' => ++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'contact', 'clave' => 'whatsapp_texto', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('contact__whatsapp_texto'), 'orden' => ++$orden]
        );

        return redirect()->back()->with('success', '✅ Sección Contacto actualizada correctamente');
    }
}