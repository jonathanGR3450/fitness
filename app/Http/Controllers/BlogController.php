<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Configuracion;

class BlogController extends Controller
{
    /**
     * Mostrar el formulario de edición de la página de inicio
     */
    public function edit()
    {
        $pagina = 'blog';
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

        return view('pages.edit.blog', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'blog_hero__badge'    => 'nullable|string|max:50',
            'blog_hero__titulo_1' => 'required|string|max:255',
            'blog_hero__titulo_2' => 'required|string|max:255',
            'blog_hero__subtitulo'=> 'nullable|string',
            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $idioma = $request->idioma; $pagina = $request->pagina; $orden=0;

        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_hero','clave'=>'badge','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->blog_hero__badge,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_hero','clave'=>'titulo_1','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->blog_hero__titulo_1,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_hero','clave'=>'titulo_2','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->blog_hero__titulo_2,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_hero','clave'=>'subtitulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->blog_hero__subtitulo,'orden'=>++$orden]);

        // categorías 1..5
        for($i=1;$i<=5;$i++){
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'blog_hero','clave'=>"cat_{$i}",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("blog_hero__cat_{$i}"),'orden'=>++$orden]
            );
        }

        return back()->with('success','✅ Hero del blog actualizado');
    }

    public function updatePosts(Request $request)
    {
        $validated = $request->validate([
            // featured
            'blog_posts__featured_imagen_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'blog_posts__featured_imagen_url'  => 'nullable|string|max:255',
            'blog_posts__featured_fecha'       => 'nullable|string|max:100',
            'blog_posts__featured_autor'       => 'nullable|string|max:100',
            'blog_posts__featured_lectura'     => 'nullable|string|max:10',
            'blog_posts__featured_titulo'      => 'required|string|max:255',
            'blog_posts__featured_extracto'    => 'nullable|string',
            'blog_posts__featured_contenido'   => 'nullable|string',
            'blog_posts__featured_url'         => 'nullable|string|max:255',
            // posts 1..6 imágenes
            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $idioma = $request->idioma; $pagina = $request->pagina; $orden=0;

        // ===== Featured image (upload/url/mantener) =====
        $featValor = null;
        if($request->hasFile('blog_posts__featured_imagen_file')){
            $f = $request->file('blog_posts__featured_imagen_file');
            $ext = strtolower($f->getClientOriginalExtension());
            $filename = 'blog_featured_'.time().'_'.uniqid().'.'.$ext;
            $f->move(public_path('images'), $filename);
            $featValor = 'images/'.$filename;

            $anterior = Contenido::where('pagina',$pagina)->where('seccion','blog_posts')
                ->where('clave','featured_imagen')->where('idioma',$idioma)->first();
            if($anterior && $anterior->valor){ $p=public_path($anterior->valor); if(is_file($p)) @unlink($p); }
        } elseif($request->filled('blog_posts__featured_imagen_url')){
            $featValor = $request->input('blog_posts__featured_imagen_url');
        } else {
            $featValor = optional(Contenido::where('pagina',$pagina)->where('seccion','blog_posts')
                ->where('clave','featured_imagen')->where('idioma',$idioma)->first())->valor;
        }

        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_posts','clave'=>'featured_imagen','idioma'=>$idioma],
            ['tipo'=>'imagen','valor'=>$featValor,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_posts','clave'=>'featured_fecha','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->blog_posts__featured_fecha,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_posts','clave'=>'featured_autor','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->blog_posts__featured_autor,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_posts','clave'=>'featured_lectura','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->blog_posts__featured_lectura,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_posts','clave'=>'featured_titulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->blog_posts__featured_titulo,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_posts','clave'=>'featured_extracto','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->blog_posts__featured_extracto,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_posts','clave'=>'featured_contenido','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->blog_posts__featured_contenido,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_posts','clave'=>'featured_url','idioma'=>$idioma],
            ['tipo'=>'url','valor'=>$request->blog_posts__featured_url,'orden'=>++$orden]);

        // ===== Grid posts 1..6 =====
        for($i=1;$i<=6;$i++){
            // imagen
            $keyFile = "blog_posts__post_{$i}_imagen_file";
            $keyUrl  = "blog_posts__post_{$i}_imagen_url";
            $claveImg= "post_{$i}_imagen";

            $imgVal = null;
            if($request->hasFile($keyFile)){
                $f = $request->file($keyFile);
                $ext = strtolower($f->getClientOriginalExtension());
                $filename = "blog_post_{$i}_".time().'_'.uniqid().'.'.$ext;
                $f->move(public_path('images'), $filename);
                $imgVal = 'images/'.$filename;

                $anterior = Contenido::where('pagina',$pagina)->where('seccion','blog_posts')
                    ->where('clave',$claveImg)->where('idioma',$idioma)->first();
                if($anterior && $anterior->valor){ $p=public_path($anterior->valor); if(is_file($p)) @unlink($p); }
            } elseif($request->filled($keyUrl)){
                $imgVal = $request->input($keyUrl);
            } else {
                $imgVal = optional(Contenido::where('pagina',$pagina)->where('seccion','blog_posts')
                    ->where('clave',$claveImg)->where('idioma',$idioma)->first())->valor;
            }

            Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'blog_posts','clave'=>$claveImg,'idioma'=>$idioma],
                ['tipo'=>'imagen','valor'=>$imgVal,'orden'=>++$orden]);

            foreach (['categoria','fecha','lectura','titulo','extracto','contenido','url'] as $campo){
                Contenido::updateOrCreate(
                    ['pagina'=>$pagina,'seccion'=>'blog_posts','clave'=>"post_{$i}_{$campo}",'idioma'=>$idioma],
                    ['tipo'=> ($campo==='url'?'url':'texto'), 'valor'=>$request->input("blog_posts__post_{$i}_{$campo}"), 'orden'=>++$orden]
                );
            }
        }

        return back()->with('success','✅ Posts del blog actualizados');
    }

    public function updateBlogNewsletter(Request $request)
    {
        $validated = $request->validate([
            'newsletter__titulo'       => 'required|string|max:255',
            'newsletter__subtitulo'    => 'nullable|string',
            'newsletter__placeholder'  => 'nullable|string|max:255',
            'newsletter__boton_texto'  => 'nullable|string|max:100',
            'newsletter__form_action'  => 'nullable|string|max:255',
            'idioma'                   => 'required|string',
            'pagina'                   => 'required|string', // 'blog'
        ]);

        $idioma = $request->input('idioma');
        $pagina = $request->input('pagina'); // blog
        $orden  = 0;

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'newsletter_cta','clave'=>'titulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('newsletter__titulo'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'newsletter_cta','clave'=>'subtitulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('newsletter__subtitulo'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'newsletter_cta','clave'=>'placeholder','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('newsletter__placeholder'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'newsletter_cta','clave'=>'boton_texto','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('newsletter__boton_texto'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'newsletter_cta','clave'=>'form_action','idioma'=>$idioma],
            ['tipo'=>'url','valor'=>$request->input('newsletter__form_action'),'orden'=>++$orden]
        );

        return back()->with('success','✅ Newsletter CTA actualizada correctamente');
    }

    /**
     * Mostrar un post individual del blog
     */
    public function show($tipo, $id)
    {
        $pagina = 'blog';
        $idioma = 'es'; // O usar: app()->getLocale()

        // Obtener TODOS los contenidos de la página de blog
        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion');

        // Determinar qué post mostrar (featured o post_1, post_2, etc.)
        $postData = [];

        if ($tipo === 'featured') {
            // Post destacado
            $sec = $contenidos['blog_posts'] ?? collect();
            $postData = [
                'titulo' => optional($sec->firstWhere('clave', 'featured_titulo'))->valor ?? 'Sin título',
                'imagen' => optional($sec->firstWhere('clave', 'featured_imagen'))->valor ?? 'images/blog-featured.jpg',
                'fecha' => optional($sec->firstWhere('clave', 'featured_fecha'))->valor ?? date('d F Y'),
                'autor' => optional($sec->firstWhere('clave', 'featured_autor'))->valor ?? 'Anabelle Ibalu',
                'lectura' => optional($sec->firstWhere('clave', 'featured_lectura'))->valor ?? '5',
                'extracto' => optional($sec->firstWhere('clave', 'featured_extracto'))->valor ?? '',
                'contenido' => optional($sec->firstWhere('clave', 'featured_contenido'))->valor ?? '<p>Contenido no disponible.</p>',
                'categoria' => 'Destacado',
            ];
        } else {
            // Posts del grid (post_1, post_2, etc.)
            $postNum = $id;
            $sec = $contenidos['blog_posts'] ?? collect();
            $postData = [
                'titulo' => optional($sec->firstWhere('clave', "post_{$postNum}_titulo"))->valor ?? 'Sin título',
                'imagen' => optional($sec->firstWhere('clave', "post_{$postNum}_imagen"))->valor ?? "images/blog-{$postNum}.jpg",
                'fecha' => optional($sec->firstWhere('clave', "post_{$postNum}_fecha"))->valor ?? date('d F Y'),
                'lectura' => optional($sec->firstWhere('clave', "post_{$postNum}_lectura"))->valor ?? '5',
                'extracto' => optional($sec->firstWhere('clave', "post_{$postNum}_extracto"))->valor ?? '',
                'contenido' => optional($sec->firstWhere('clave', "post_{$postNum}_contenido"))->valor ?? '<p>Contenido no disponible.</p>',
                'categoria' => optional($sec->firstWhere('clave', "post_{$postNum}_categoria"))->valor ?? 'Fitness',
            ];
        }

        return view('pages.blog-single', compact('postData', 'contenidos', 'pagina', 'idioma'));
    }

}