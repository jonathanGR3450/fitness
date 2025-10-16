<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Configuracion;

class CommunityController extends Controller
{
    /**
     * Mostrar el formulario de edición de la página de inicio
     */
    public function edit()
    {
        $pagina = 'community';
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

        return view('pages.edit.community', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    public function updateProgramsHero(Request $request)
    {
        $validated = $request->validate([
            'programs_hero__badge'     => 'nullable|string|max:100',
            'programs_hero__titulo'    => 'required|string|max:255',
            'programs_hero__subtitulo' => 'nullable|string',
            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $idioma = $request->idioma; $pagina = $request->pagina; $orden=0;

        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'programs_hero','clave'=>'badge','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->programs_hero__badge,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'programs_hero','clave'=>'titulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->programs_hero__titulo,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'programs_hero','clave'=>'subtitulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->programs_hero__subtitulo,'orden'=>++$orden]);

        return back()->with('success','✅ Hero actualizado');
    }

    public function updateProgramsGrid(Request $request)
    {
        $validated = $request->validate([
            'idioma'=>'required|string','pagina'=>'required|string',
            // 6 tarjetas
            // imagen por archivo o url:
            // título, descripción, url
            // (no hacemos required para flexibilidad)
            // Validaciones por cada i
        ]);

        $idioma = $request->idioma; $pagina = $request->pagina; $orden=0;

        for($i=1;$i<=6;$i++){
            // IMAGEN
            $claveImg = "prog_{$i}_imagen";
            $fileKey  = "programs_grid__prog_{$i}_imagen_file";
            $urlKey   = "programs_grid__prog_{$i}_imagen_url";

            $imgValor = null;
            if($request->hasFile($fileKey)){
                $file = $request->file($fileKey);
                $ext = strtolower($file->getClientOriginalExtension());
                if(!in_array($ext,['jpg','jpeg','png','webp','svg'])) abort(422,'Formato de imagen no permitido');
                $filename = "community_prog_{$i}_".time().'_'.uniqid().'.'.$ext;
                $file->move(public_path('images'), $filename);
                $imgValor = 'images/'.$filename;

                // borrar anterior
                $anterior = Contenido::where(compact('pagina'))->where('seccion','programs_grid')
                    ->where('clave',$claveImg)->where('idioma',$idioma)->first();
                if($anterior && $anterior->valor){
                    $p = public_path($anterior->valor); if(is_file($p)) @unlink($p);
                }
            } elseif($request->filled($urlKey)){
                $imgValor = $request->input($urlKey);
            } else {
                $imgValor = optional(Contenido::where(compact('pagina'))
                    ->where(['seccion'=>'programs_grid','clave'=>$claveImg,'idioma'=>$idioma])->first())->valor;
            }

            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'programs_grid','clave'=>$claveImg,'idioma'=>$idioma],
                ['tipo'=>'imagen','valor'=>$imgValor,'orden'=>++$orden]
            );

            // TITULO
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'programs_grid','clave'=>"prog_{$i}_titulo",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("programs_grid__prog_{$i}_titulo"),'orden'=>++$orden]
            );
            // DESCRIPCION
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'programs_grid','clave'=>"prog_{$i}_descripcion",'idioma'=>$idioma],
                ['tipo'=>'texto','valor'=>$request->input("programs_grid__prog_{$i}_descripcion"),'orden'=>++$orden]
            );
            // URL
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'programs_grid','clave'=>"prog_{$i}_url",'idioma'=>$idioma],
                ['tipo'=>'url','valor'=>$request->input("programs_grid__prog_{$i}_url"),'orden'=>++$orden]
            );
        }

        return back()->with('success','✅ Grid de programas actualizado');
    }

    public function updateProgramsCta(Request $request)
    {
        $validated = $request->validate([
            'programs_cta__titulo'      => 'required|string|max:255',
            'programs_cta__subtitulo'   => 'nullable|string',
            'programs_cta__boton_texto' => 'required|string|max:100',
            'programs_cta__boton_url'   => 'required|string|max:255',
            'idioma'=>'required|string','pagina'=>'required|string',
        ]);

        $idioma=$request->idioma; $pagina=$request->pagina; $orden=0;

        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'programs_cta','clave'=>'titulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->programs_cta__titulo,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'programs_cta','clave'=>'subtitulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->programs_cta__subtitulo,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'programs_cta','clave'=>'boton_texto','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->programs_cta__boton_texto,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'programs_cta','clave'=>'boton_url','idioma'=>$idioma],
            ['tipo'=>'url','valor'=>$request->programs_cta__boton_url,'orden'=>++$orden]);

        return back()->with('success','✅ CTA actualizado');
    }
}