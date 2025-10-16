<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GlobalSetting;
use App\Models\Contenido;


class PageController extends Controller
{
  

     public function home()
    {
        $idioma = 'es'; // O puedes usar: app()->getLocale()
        $pagina = 'inicio';
        
        // Obtener contenidos desde la base de datos
        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion')
            ->map(function ($seccionItems) {
                return $seccionItems->keyBy('clave');
            });
        
        return view('welcome', compact('contenidos'));
    }

    public function about()
    {
        $idioma = 'es'; // O puedes usar: app()->getLocale()
        $pagina = 'sobre-mi';
        
        // Obtener contenidos desde la base de datos
        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion')
            ->map(function ($seccionItems) {
                return $seccionItems->keyBy('clave');
            });
        
        return view('pages.about', compact('contenidos'));
    }

    public function move()
    {
        $idioma = 'es'; // O puedes usar: app()->getLocale()
        $pagina = 'move';

        // Obtener contenidos desde la base de datos
        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion')
            ->map(function ($seccionItems) {
                return $seccionItems->keyBy('clave');
            });

        return view('pages.move', compact('contenidos'));
    }

    public function community()
    {
        $idioma = 'es'; // O puedes usar: app()->getLocale()
        $pagina = 'community';
        // Obtener contenidos desde la base de datos
        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion')
            ->map(function ($seccionItems) {
                return $seccionItems->keyBy('clave');
            });
        // Vista individual de “Comunidad”
        return view('pages.community', compact('contenidos'));
    }

    public function contact()
    {
        $idioma = 'es'; // O puedes usar: app()->getLocale()
        $pagina = 'contact';
        // Obtener contenidos desde la base de datos
        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion')
            ->map(function ($seccionItems) {
                return $seccionItems->keyBy('clave');
            });
        // Vista individual de “Contacto”
        return view('pages.contact', compact('contenidos'));
    }
    public function blog()
    {
        $idioma = 'es'; // O puedes usar: app()->getLocale()
        $pagina = 'blog';
        // Obtener contenidos desde la base de datos
        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion')
            ->map(function ($seccionItems) {
                return $seccionItems->keyBy('clave');
            });
        // Vista individual de “Blog”
        return view('pages.blog', compact('contenidos'));
    }
}