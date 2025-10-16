<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Configuracion;

class ContactController extends Controller
{
    /**
     * Mostrar el formulario de edición de la página de inicio
     */
    public function edit()
    {
        $pagina = 'contact';
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

        return view('pages.edit.contact', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    /* ========== UPDATE: CONTACT HERO ========== */
    public function updateContactHero(Request $request)
    {
        $validated = $request->validate([
            'contact_hero__titulo'       => 'required|string|max:255',
            'contact_hero__subtitulo'    => 'nullable|string',
            'contact_hero__instagram_url'=> 'nullable|string|max:255',
            'contact_hero__tiktok_url'   => 'nullable|string|max:255',
            'contact_hero__facebook_url' => 'nullable|string|max:255',
            'contact_hero__threads_url'  => 'nullable|string|max:255',
            'idioma' => 'required|string',
            'pagina' => 'required|string', // contact
        ]);

        $idioma = $request->idioma;
        $pagina = $request->pagina;
        $orden = 0;

        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'contact_hero','clave'=>'titulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->contact_hero__titulo,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'contact_hero','clave'=>'subtitulo','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->contact_hero__subtitulo,'orden'=>++$orden]);

        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'contact_hero','clave'=>'instagram_url','idioma'=>$idioma],
            ['tipo'=>'url','valor'=>$request->contact_hero__instagram_url,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'contact_hero','clave'=>'tiktok_url','idioma'=>$idioma],
            ['tipo'=>'url','valor'=>$request->contact_hero__tiktok_url,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'contact_hero','clave'=>'facebook_url','idioma'=>$idioma],
            ['tipo'=>'url','valor'=>$request->contact_hero__facebook_url,'orden'=>++$orden]);
        Contenido::updateOrCreate(['pagina'=>$pagina,'seccion'=>'contact_hero','clave'=>'threads_url','idioma'=>$idioma],
            ['tipo'=>'url','valor'=>$request->contact_hero__threads_url,'orden'=>++$orden]);

        return back()->with('success','✅ Contact Hero actualizado correctamente');
    }

    /* ========== UPDATE: CONTACT FORM ========== */
    public function updateContactForm(Request $request)
    {
        $validated = $request->validate([
            'contact_form__badge'               => 'nullable|string|max:100',
            'contact_form__titulo'              => 'required|string|max:255',
            'contact_form__subtitulo'           => 'nullable|string',
            'contact_form__whatsapp_url'        => 'nullable|string|max:255',
            'contact_form__whatsapp_texto'      => 'nullable|string|max:100',
            'contact_form__form_action'         => 'nullable|string|max:255',
            'contact_form__placeholder_nombre'  => 'nullable|string|max:255',
            'contact_form__placeholder_email'   => 'nullable|string|max:255',
            'contact_form__placeholder_telefono'=> 'nullable|string|max:255',
            'contact_form__placeholder_mensaje' => 'nullable|string|max:255',
            'contact_form__boton_enviar'        => 'nullable|string|max:100',
            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $idioma = $request->idioma;
        $pagina = $request->pagina;
        $orden = 0;

        $pairs = [
            ['badge','texto',$request->contact_form__badge],
            ['titulo','texto',$request->contact_form__titulo],
            ['subtitulo','texto',$request->contact_form__subtitulo],
            ['whatsapp_url','url',$request->contact_form__whatsapp_url],
            ['whatsapp_texto','texto',$request->contact_form__whatsapp_texto],
            ['form_action','url',$request->contact_form__form_action],
            ['placeholder_nombre','texto',$request->contact_form__placeholder_nombre],
            ['placeholder_email','texto',$request->contact_form__placeholder_email],
            ['placeholder_telefono','texto',$request->contact_form__placeholder_telefono],
            ['placeholder_mensaje','texto',$request->contact_form__placeholder_mensaje],
            ['boton_enviar','texto',$request->contact_form__boton_enviar],
        ];

        foreach($pairs as [$clave,$tipo,$valor]){
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'contact_form','clave'=>$clave,'idioma'=>$idioma],
                ['tipo'=>$tipo,'valor'=>$valor,'orden'=>++$orden]
            );
        }

        return back()->with('success','✅ Formulario de Contacto actualizado correctamente');
    }

    /* ========== UPDATE: CONTACT INFO ========== */
    public function updateContactInfo(Request $request)
    {
        $validated = $request->validate([
            'contact_info__email'            => 'nullable|email|max:255',
            'contact_info__instagram_handle' => 'nullable|string|max:255',
            'contact_info__instagram_url'    => 'nullable|string|max:255',
            'contact_info__tiempo_respuesta' => 'nullable|string|max:255',
            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $idioma = $request->idioma;
        $pagina = $request->pagina;
        $orden = 0;

        $pairs = [
            ['email','texto',$request->contact_info__email],
            ['instagram_handle','texto',$request->contact_info__instagram_handle],
            ['instagram_url','url',$request->contact_info__instagram_url],
            ['tiempo_respuesta','texto',$request->contact_info__tiempo_respuesta],
        ];

        foreach($pairs as [$clave,$tipo,$valor]){
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'contact_info','clave'=>$clave,'idioma'=>$idioma],
                ['tipo'=>$tipo,'valor'=>$valor,'orden'=>++$orden]
            );
        }

        return back()->with('success','✅ Info de contacto actualizada correctamente');
    }

}