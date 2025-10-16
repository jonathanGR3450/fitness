<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Configuracion;

class ConfiguracionController extends Controller
{
    /**
     * Mostrar el formulario de edición de la página de inicio
     */
    public function edit()
    {
        $pagina = 'configuracion';
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

        return view('pages.edit.configuracion', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    public function updateHeader(Request $request)
    {
        $validated = $request->validate([
            'header__logo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'header__logo_url'  => 'nullable|string|max:255',
            'header__cta_texto' => 'nullable|string|max:100',
            'header__cta_url'   => 'nullable|string|max:255',
            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $pagina = $request->pagina; // layout
        $idioma = $request->idioma;
        $orden  = 0;

        // Logo
        $logoValor = null;
        if ($request->hasFile('header__logo_file')) {
            $file = $request->file('header__logo_file');
            $filename = 'header_logo_'.time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $logoValor = 'images/'.$filename;

            // opcional: eliminar anterior
            $old = Contenido::where('pagina',$pagina)->where('seccion','header')->where('clave','logo')->where('idioma',$idioma)->first();
            if ($old && $old->valor) {
                $path = public_path($old->valor);
                if (is_file($path)) @unlink($path);
            }
        } elseif ($request->filled('header__logo_url')) {
            $logoValor = $request->input('header__logo_url');
        } else {
            $logoValor = optional(Contenido::where('pagina',$pagina)->where('seccion','header')->where('clave','logo')->where('idioma',$idioma)->first())->valor;
        }

        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'header','clave'=>'logo','idioma'=>$idioma],
            ['tipo'=>'imagen','valor'=>$logoValor,'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'header','clave'=>'cta_texto','idioma'=>$idioma],
            ['tipo'=>'texto','valor'=>$request->input('header__cta_texto','ÚNETE AL CHALLENGE'),'orden'=>++$orden]
        );
        Contenido::updateOrCreate(
            ['pagina'=>$pagina,'seccion'=>'header','clave'=>'cta_url','idioma'=>$idioma],
            ['tipo'=>'url','valor'=>$request->input('header__cta_url',route('contact')),'orden'=>++$orden]
        );

        return back()->with('success','✅ Header actualizado correctamente');
    }

    public function updateFooter(Request $request)
    {
        $validated = $request->validate([
            'footer__logo_file'   => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'footer__logo_url'    => 'nullable|string|max:255',
            'footer__descripcion' => 'nullable|string',
            'footer__facebook_url'=> 'nullable|string|max:255',
            'footer__instagram_url'=> 'nullable|string|max:255',
            'footer__whatsapp_url'=> 'nullable|string|max:255',
            'footer__privacy_url' => 'nullable|string|max:255',
            'footer__terms_url'   => 'nullable|string|max:255',
            'footer__copyright'   => 'nullable|string|max:255',
            'idioma' => 'required|string',
            'pagina' => 'required|string',
        ]);

        $pagina = $request->pagina; // layout
        $idioma = $request->idioma;
        $orden  = 0;

        // logo footer
        $logoValor = null;
        if ($request->hasFile('footer__logo_file')) {
            $file = $request->file('footer__logo_file');
            $filename = 'footer_logo_'.time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $logoValor = 'images/'.$filename;

            $old = Contenido::where('pagina',$pagina)->where('seccion','footer')->where('clave','logo')->where('idioma',$idioma)->first();
            if ($old && $old->valor) {
                $path = public_path($old->valor);
                if (is_file($path)) @unlink($path);
            }
        } elseif ($request->filled('footer__logo_url')) {
            $logoValor = $request->footer__logo_url;
        } else {
            $logoValor = optional(Contenido::where('pagina',$pagina)->where('seccion','footer')->where('clave','logo')->where('idioma',$idioma)->first())->valor;
        }

        $pairs = [
            ['logo','imagen',$logoValor],
            ['descripcion','texto',$request->footer__descripcion],
            ['facebook_url','url',$request->footer__facebook_url],
            ['instagram_url','url',$request->footer__instagram_url],
            ['whatsapp_url','url',$request->footer__whatsapp_url],
            ['privacy_url','url',$request->footer__privacy_url],
            ['terms_url','url',$request->footer__terms_url],
            ['copyright','texto',$request->footer__copyright],
        ];

        foreach($pairs as [$clave,$tipo,$valor]){
            Contenido::updateOrCreate(
                ['pagina'=>$pagina,'seccion'=>'footer','clave'=>$clave,'idioma'=>$idioma],
                ['tipo'=>$tipo,'valor'=>$valor,'orden'=>++$orden]
            );
        }

        return back()->with('success','✅ Footer actualizado correctamente');
    }

}