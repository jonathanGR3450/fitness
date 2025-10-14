<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Configuracion;
use App\Models\MenuItem;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Dashboard principal del admin
     */
    public function dashboard()
    {
        // Contar estadísticas
        $stats = [
            'total_contenidos' => Contenido::count(),
            'total_configuraciones' => Configuracion::count(),
            'total_menu_items' => MenuItem::count(),
            'paginas' => Contenido::select('pagina')->distinct()->count(),
        ];

        // Obtener lista de todas las páginas
        $paginas = Contenido::select('pagina')
            ->distinct()
            ->orderBy('pagina')
            ->pluck('pagina');

        return view('dashboard', compact('stats', 'paginas'));
    }

    /**
     * Editar página de INICIO (welcome)
     */
public function edit()
{
    $pagina = 'inicio';
    $idioma = 'es';
    
    // Obtener TODOS los contenidos de la página agrupados por sección
    $contenidos = Contenido::where('pagina', $pagina)
        ->where('idioma', $idioma)
        ->orderBy('seccion')
        ->orderBy('orden')
        ->get()
        ->groupBy('seccion')
        ->map(function ($items) {
            return $items->keyBy('clave');  // ✅ AGREGAR ESTA LÍNEA
        });
    
    // Obtener secciones únicas para el menú lateral
    $secciones = $contenidos->keys();
    
    // Obtener configuraciones globales (por si las necesitas)
    $configuraciones = Configuracion::where('idioma', $idioma)
        ->get()
        ->groupBy('grupo');
    
    return view('pages.edit.inicio', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
}

    /**
     * Guardar cambios de página de INICIO
     */
    public function updateInicio(Request $request)
    {
        $pagina = 'welcome';
        $idioma = $request->input('idioma', 'es');

        // Obtener todos los campos enviados
        $campos = $request->except(['_token', '_method', 'idioma', 'pagina']);

        foreach ($campos as $key => $valor) {
            // El formato del campo es: seccion__clave
            // Ejemplo: hero_slide_1__titulo_h1
            if (strpos($key, '__') !== false) {
                list($seccion, $clave) = explode('__', $key, 2);

                // Buscar el contenido existente
                $contenido = Contenido::where('pagina', $pagina)
                    ->where('seccion', $seccion)
                    ->where('clave', $clave)
                    ->where('idioma', $idioma)
                    ->first();

                if ($contenido) {
                    // Actualizar
                    $contenido->valor = $valor;
                    $contenido->save();
                }
            }
        }

        return redirect()->back()->with('success', '✅ Página de inicio actualizada correctamente');
    }

    /**
     * Editar página SOBRE MÍ (about)
     */
    public function editAbout()
    {
        $pagina = 'about';
        $idioma = 'es';

        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion');

        $secciones = $contenidos->keys();
        $configuraciones = Configuracion::where('idioma', $idioma)->get()->groupBy('grupo');

        return view('pages.edit.about', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    /**
     * Editar página MOVE CHALLENGE (move)
     */
    public function editMove()
    {
        $pagina = 'move';
        $idioma = 'es';

        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion');

        $secciones = $contenidos->keys();
        $configuraciones = Configuracion::where('idioma', $idioma)->get()->groupBy('grupo');

        return view('pages.edit.move', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    /**
     * Editar página PROGRAMAS (community)
     */
    public function editCommunity()
    {
        $pagina = 'community';
        $idioma = 'es';

        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion');

        $secciones = $contenidos->keys();
        $configuraciones = Configuracion::where('idioma', $idioma)->get()->groupBy('grupo');

        return view('pages.edit.community', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    /**
     * Editar página BLOG (blog)
     */
    public function editBlog()
    {
        $pagina = 'blog';
        $idioma = 'es';

        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion');

        $secciones = $contenidos->keys();
        $configuraciones = Configuracion::where('idioma', $idioma)->get()->groupBy('grupo');

        return view('pages.edit.blog', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    /**
     * Editar página CONTACTO (contact)
     */
    public function editContact()
    {
        $pagina = 'contact';
        $idioma = 'es';

        $contenidos = Contenido::where('pagina', $pagina)
            ->where('idioma', $idioma)
            ->orderBy('seccion')
            ->orderBy('orden')
            ->get()
            ->groupBy('seccion');

        $secciones = $contenidos->keys();
        $configuraciones = Configuracion::where('idioma', $idioma)->get()->groupBy('grupo');

        return view('pages.edit.contact', compact('contenidos', 'secciones', 'configuraciones', 'pagina', 'idioma'));
    }

    /**
     * Guardar cambios de cualquier página (método genérico)
     */
    public function updatePagina(Request $request, $pagina)
    {
        $idioma = $request->input('idioma', 'es');
        $campos = $request->except(['_token', '_method', 'idioma', 'pagina']);

        foreach ($campos as $key => $valor) {
            if (strpos($key, '__') !== false) {
                list($seccion, $clave) = explode('__', $key, 2);

                $contenido = Contenido::where('pagina', $pagina)
                    ->where('seccion', $seccion)
                    ->where('clave', $clave)
                    ->where('idioma', $idioma)
                    ->first();

                if ($contenido) {
                    $contenido->valor = $valor;
                    $contenido->save();
                }
            }
        }

        return redirect()->back()->with('success', '✅ Página actualizada correctamente');
    }

    /**
     * Editar configuraciones globales
     */
    public function editConfiguraciones()
    {
        $idioma = 'es';
        $configuraciones = Configuracion::where('idioma', $idioma)
            ->get()
            ->groupBy('grupo');

        return view('admin.configuraciones', compact('configuraciones', 'idioma'));
    }

    /**
     * Guardar configuraciones globales
     */
    public function updateConfiguraciones(Request $request)
    {
        $idioma = $request->input('idioma', 'es');
        $campos = $request->except(['_token', '_method', 'idioma']);

        foreach ($campos as $key => $valor) {
            if (strpos($key, '__') !== false) {
                list($grupo, $clave) = explode('__', $key, 2);

                $config = Configuracion::where('grupo', $grupo)
                    ->where('clave', $clave)
                    ->where('idioma', $idioma)
                    ->first();

                if ($config) {
                    $config->valor = $valor;
                    $config->save();
                }
            }
        }

        return redirect()->back()->with('success', '✅ Configuraciones actualizadas correctamente');
    }

    /**
     * Editar menú de navegación
     */
    public function editMenu()
    {
        $idioma = 'es';
        $menuItems = MenuItem::where('idioma', $idioma)
            ->orderBy('orden')
            ->get();

        return view('admin.menu', compact('menuItems', 'idioma'));
    }

    /**
     * Guardar cambios del menú
     */
    public function updateMenu(Request $request)
    {
        $idioma = $request->input('idioma', 'es');
        $items = $request->input('items', []);

        foreach ($items as $id => $data) {
            $menuItem = MenuItem::find($id);
            if ($menuItem) {
                $menuItem->titulo = $data['titulo'];
                $menuItem->ruta = $data['ruta'];
                $menuItem->orden = $data['orden'];
                $menuItem->activo = isset($data['activo']) ? true : false;
                $menuItem->save();
            }
        }

        return redirect()->back()->with('success', '✅ Menú actualizado correctamente');
    }
}