<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Configuracion;

class AboutController extends Controller
{
    /**
     * Mostrar el formulario de edición de la página de inicio
     */
    public function edit()
    {
        $pagina = 'sobre-mi';
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

        return view('pages.edit.about', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    /**
     * Actualizar sección HERO
     */
    public function updateHero(Request $request)
    {
        $request->validate([
            'about_hero__titulo'      => 'required|string|max:255',
            'about_hero__subtitulo'   => 'nullable|string|max:255',
            'about_hero__descripcion' => 'nullable|string',
            'about_hero__stat_1_num'  => 'nullable|string|max:20',
            'about_hero__stat_1_lbl'  => 'nullable|string|max:255',
            'about_hero__stat_2_num'  => 'nullable|string|max:20',
            'about_hero__stat_2_lbl'  => 'nullable|string|max:255',
            'about_hero__stat_3_num'  => 'nullable|string|max:20',
            'about_hero__stat_3_lbl'  => 'nullable|string|max:255',
            'about_hero__imagen_url'  => 'nullable|string|max:255',
            'about_hero__imagen_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'idioma'  => 'required|string',
            'pagina'  => 'required|string',
        ]);

        $idioma  = $request->input('idioma');
        $pagina  = $request->input('pagina');
        $seccion = 'about_hero';
        $orden   = 0;

        // Imagen (mismo patrón que tu InicioController@updateHero)
        $imagenValor = null;

        if ($request->hasFile('about_hero__imagen_file')) {
            $file = $request->file('about_hero__imagen_file');
            $filename = 'about_hero_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $imagenValor = 'images/' . $filename;

            // Borrar anterior si existía
            $imgAnterior = Contenido::where('pagina', $pagina)
                ->where('seccion', $seccion)
                ->where('clave', 'imagen')
                ->where('idioma', $idioma)
                ->first();

            if ($imgAnterior && $imgAnterior->valor) {
                $rutaAnterior = public_path($imgAnterior->valor);
                if (file_exists($rutaAnterior) && is_file($rutaAnterior)) {
                    @unlink($rutaAnterior);
                }
            }
        } elseif ($request->filled('about_hero__imagen_url')) {
            $imagenValor = $request->input('about_hero__imagen_url');
        } else {
            $imagenActual = Contenido::where('pagina', $pagina)
                ->where('seccion', $seccion)
                ->where('clave', 'imagen')
                ->where('idioma', $idioma)
                ->first();
            $imagenValor = $imagenActual?->valor;
        }

        // Guardar campos
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>$seccion,'clave'=>'titulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('about_hero__titulo'),'orden'=>++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>$seccion,'clave'=>'subtitulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('about_hero__subtitulo'),'orden'=>++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>$seccion,'clave'=>'imagen','idioma'=>$idioma],
            ['tipo'=>'imagen','valor'=>$imagenValor,'orden'=>++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>$seccion,'clave'=>'descripcion','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('about_hero__descripcion'),'orden'=>++$orden]
        );

        for ($i = 1; $i <= 3; $i++) {
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>$seccion,'clave'=>"stat_{$i}_num",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("about_hero__stat_{$i}_num"),'orden'=>++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>$seccion,'clave'=>"stat_{$i}_lbl",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("about_hero__stat_{$i}_lbl"),'orden'=>++$orden]
            );
        }

        return back()->with('success','✅ About Hero actualizado correctamente');
    }

    /**
     * Actualizar sección STORY
     */
    public function updateStory(Request $request)
    {
        $validated = $request->validate([
            'story__titulo'     => 'required|string|max:255',
            'story__parrafo_1'  => 'required|string',
            'story__parrafo_2'  => 'nullable|string',
            'story__parrafo_3'  => 'nullable|string',
            'idioma'            => 'required|string',
            'pagina'            => 'required|string', // debe ser 'sobre-mi'
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden = 0;

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'story', 'clave' => 'titulo', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('story__titulo'), 'orden' => ++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'story', 'clave' => 'parrafo_1', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('story__parrafo_1'), 'orden' => ++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'story', 'clave' => 'parrafo_2', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('story__parrafo_2'), 'orden' => ++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina' => $pagina, 'seccion' => 'story', 'clave' => 'parrafo_3', 'idioma' => $idioma],
            ['tipo' => 'texto', 'valor' => $request->input('story__parrafo_3'), 'orden' => ++$orden]
        );

        return back()->with('success', '✅ Sección “Mi historia” actualizada correctamente');
    }

    /**
     * Actualizar sección ABOUT
     */
    public function updateValues(Request $request)
    {
        $validated = $request->validate([
            'values__titulo_seccion'     => 'required|string|max:255',
            'values__subtitulo_seccion'  => 'nullable|string|max:500',
            'idioma'                     => 'required|string',
            'pagina'                     => 'required|string', // 'sobre-mi'

            // 4 ítems
            'values__value_1_icono'      => 'required|string|max:100',
            'values__value_1_titulo'     => 'required|string|max:255',
            'values__value_1_descripcion'=> 'required|string|max:500',

            'values__value_2_icono'      => 'required|string|max:100',
            'values__value_2_titulo'     => 'required|string|max:255',
            'values__value_2_descripcion'=> 'required|string|max:500',

            'values__value_3_icono'      => 'required|string|max:100',
            'values__value_3_titulo'     => 'required|string|max:255',
            'values__value_3_descripcion'=> 'required|string|max:500',

            'values__value_4_icono'      => 'required|string|max:100',
            'values__value_4_titulo'     => 'required|string|max:255',
            'values__value_4_descripcion'=> 'required|string|max:500',
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden  = 0;

        // Título y subtítulo sección
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'values','clave'=>'titulo_seccion','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('values__titulo_seccion'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'values','clave'=>'subtitulo_seccion','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('values__subtitulo_seccion'),'orden'=>++$orden]
        );

        // 4 valores
        for ($i=1; $i<=4; $i++) {
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'values','clave'=>"value_{$i}_icono",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("values__value_{$i}_icono"),'orden'=>++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'values','clave'=>"value_{$i}_titulo",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("values__value_{$i}_titulo"),'orden'=>++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'values','clave'=>"value_{$i}_descripcion",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("values__value_{$i}_descripcion"),'orden'=>++$orden]
            );
        }

        return back()->with('success','✅ Sección “Mis valores” actualizada correctamente');
    }


    /**
     * Actualizar sección CREDENTIALS
     */
    public function updateCredentials(Request $request)
    {
        $validated = $request->validate([
            'credentials__titulo_seccion'       => 'required|string|max:255',
            'credentials__subtitulo_seccion'    => 'nullable|string|max:500',
            'idioma'                            => 'required|string',
            'pagina'                            => 'required|string', // 'sobre-mi'

            // 4 ítems
            'credentials__item_1_icono'         => 'required|string|max:100',
            'credentials__item_1_titulo'        => 'required|string|max:255',
            'credentials__item_1_descripcion'   => 'required|string|max:500',

            'credentials__item_2_icono'         => 'required|string|max:100',
            'credentials__item_2_titulo'        => 'required|string|max:255',
            'credentials__item_2_descripcion'   => 'required|string|max:500',

            'credentials__item_3_icono'         => 'required|string|max:100',
            'credentials__item_3_titulo'        => 'required|string|max:255',
            'credentials__item_3_descripcion'   => 'required|string|max:500',

            'credentials__item_4_icono'         => 'required|string|max:100',
            'credentials__item_4_titulo'        => 'required|string|max:255',
            'credentials__item_4_descripcion'   => 'required|string|max:500',
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden  = 0;

        // Título y subtítulo
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'credentials','clave'=>'titulo_seccion','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('credentials__titulo_seccion'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'credentials','clave'=>'subtitulo_seccion','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('credentials__subtitulo_seccion'),'orden'=>++$orden]
        );

        // Ítems
        for ($i=1; $i<=4; $i++) {
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'credentials','clave'=>"item_{$i}_icono",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("credentials__item_{$i}_icono"),'orden'=>++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'credentials','clave'=>"item_{$i}_titulo",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("credentials__item_{$i}_titulo"),'orden'=>++$orden]
            );
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'credentials','clave'=>"item_{$i}_descripcion",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("credentials__item_{$i}_descripcion"),'orden'=>++$orden]
            );
        }

        return back()->with('success','✅ Sección “Certificaciones y experiencia” actualizada correctamente');
    }



    /**
     * Actualizar sección CTA (Call to Action)
     */
    public function updateCta(Request $request)
    {
        $validated = $request->validate([
            'cta_about__titulo'       => 'required|string|max:255',
            'cta_about__subtitulo'    => 'nullable|string|max:500',
            'cta_about__boton_texto'  => 'required|string|max:100',
            'cta_about__boton_url'    => 'nullable|string|max:255',
            'idioma'                  => 'required|string',
            'pagina'                  => 'required|string', // 'sobre-mi'
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina');
        $orden  = 0;

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'cta_about','clave'=>'titulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('cta_about__titulo'),'orden'=>++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'cta_about','clave'=>'subtitulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('cta_about__subtitulo'),'orden'=>++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'cta_about','clave'=>'boton_texto','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('cta_about__boton_texto'),'orden'=>++$orden]
        );

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'cta_about','clave'=>'boton_url','idioma'=>$idioma],
            ['tipo'=>'url','valor'=>$request->input('cta_about__boton_url'),'orden'=>++$orden]
        );

        return back()->with('success','✅ CTA About actualizada correctamente');
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