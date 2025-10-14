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
        // Vista individual de “Sobre mí”
        return view('pages.about');
    }

    public function move()
    {
        // Vista individual de “MOVE Challenge”
        return view('pages.move');
    }

    public function community()
    {
        // Vista individual de “Comunidad”
        return view('pages.community');
    }

    public function contact()
    {
        // Vista individual de “Contacto”
        return view('pages.contact');
    }
    public function blog()
    {
        // Vista individual de “Blog”
        return view('pages.blog');
    }
}