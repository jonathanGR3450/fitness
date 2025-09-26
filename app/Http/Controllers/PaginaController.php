<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\GlobalSetting;




class PaginaController extends Controller
{
public function updateEn(Request $request)
{
    try {
        // Evita que Laravel reinyecte entradas pesadas (archivos) al fallar
        session()->forget('_old_input');

        // Sección a actualizar (viene desde cada <form> parcial)
        $section  = $request->input('section', 'all'); // hero|about|services|portfolio|testimonials|cta|contact|all
        $allowed  = ['hero','about','services','portfolio','testimonials','cta','contact','all'];
        if (!in_array($section, $allowed, true)) {
            return back()->with('warning', 'Sección no válida.');
        }

        // Reglas de validación por sección
        $rules = [];
        switch ($section) {
            case 'hero':
            case 'all':
                for ($i=1; $i<=4; $i++) {
                    $rules["h1_hero_carrusel_$i"] = 'nullable|string|max:150';
                    $rules["p_hero_carrusel_$i"]  = 'nullable|string|max:600';
                    $rules["a_hero_carrusel_$i"]  = 'nullable|url|max:255';
                    $rules["img_hero_carrusel_$i"]= 'nullable|image|max:5120'; // 5MB
                }
                if ($section !== 'all') break; // evita duplicar reglas al ser 'all'
            case 'about':
                $rules['h2_about_us'] = 'nullable|string|max:150';
                $rules['p_about_us']  = 'nullable|string|max:2000';
                $rules['img_about_us']= 'nullable|image|max:5120';
                for ($i=1; $i<=4; $i++) {
                    $rules["i__about_us_$i"]  = 'nullable|string|max:100';
                    $rules["h5__about_us_$i"] = 'nullable|string|max:200';
                }
                if ($section !== 'all') break;
            case 'services':
                $rules['h2_services'] = 'nullable|string|max:150';
                for ($i=1; $i<=4; $i++) {
                    $rules["i_services_$i"]   = 'nullable|string|max:100';
                    $rules["h4__services_$i"] = 'nullable|string|max:150';
                    $rules["p__services_$i"]  = 'nullable|string|max:600';
                }
                if ($section !== 'all') break;
            case 'portfolio':
                $rules['h2_portfolio'] = 'nullable|string|max:150';
                for ($i=1; $i<=6; $i++) {
                    $rules["img_portfolio_$i"] = 'nullable|image|max:8192'; // 8MB
                }
                if ($section !== 'all') break;
            case 'testimonials':
                $rules['h2_testimonials'] = 'nullable|string|max:150';
                for ($i=1; $i<=3; $i++) {
                    $rules["img_testimonials_$i"]     = 'nullable|image|max:5120';
                    $rules["h5_testimonials_$i"]      = 'nullable|string|max:120';
                    $rules["p_testimonials_city_$i"]  = 'nullable|string|max:120';
                    $rules["p_testimonials_$i"]       = 'nullable|string|max:600';
                }
                if ($section !== 'all') break;
            case 'cta':
                $rules['h2_call'] = 'nullable|string|max:150';
                $rules['btn_call']= 'nullable|string|max:80';
                if ($section !== 'all') break;
            case 'contact':
                $rules['h2_contact_title']   = 'nullable|string|max:120';
                $rules['p_contact_title']    = 'nullable|string|max:255';
                $rules['h4_contact_1']       = 'nullable|string|max:120';
                $rules['p_contact_1']        = 'nullable|string|max:180';
                $rules['h4_contact_email_1'] = 'nullable|string|max:120';
                // Acepta correo o texto (por si usas alias)
                $rules['p_contact_email_1']  = 'nullable|string|max:150';
                break;
        }

        $request->validate($rules);

        // Carga registro actual
        $contenido = DB::table('contenido_ingles')->first();

        $data = [];
        $oldFilesToDelete = []; // borraremos tras éxito en BD

        // === HERO ===
        if ($section === 'hero' || $section === 'all') {
            for ($i=1; $i<=4; $i++) {
                if ($request->filled("h1_hero_carrusel_$i")) $data["h1_hero_carrusel_$i"] = $request->input("h1_hero_carrusel_$i");
                if ($request->filled("p_hero_carrusel_$i"))  $data["p_hero_carrusel_$i"]  = $request->input("p_hero_carrusel_$i");
                if ($request->has("a_hero_carrusel_$i"))     $data["a_hero_carrusel_$i"]  = $request->input("a_hero_carrusel_$i"); // puede venir vacío (para limpiar)

                if ($request->hasFile("img_hero_carrusel_$i")) {
                    $file = $request->file("img_hero_carrusel_$i");
                    $filename = time() . "_hero_$i." . $file->getClientOriginalExtension();
                    $path = $file->storeAs('contenido_ingles/hero', $filename, 'public');
                    $data["img_hero_carrusel_$i"] = $path;

                    if ($contenido && !empty($contenido->{"img_hero_carrusel_$i"})) {
                        $oldFilesToDelete[] = $contenido->{"img_hero_carrusel_$i"};
                    }
                }
            }
        }

        // === ABOUT ===
        if ($section === 'about' || $section === 'all') {
            if ($request->has('h2_about_us')) $data['h2_about_us'] = $request->input('h2_about_us');
            if ($request->has('p_about_us'))  $data['p_about_us']  = $request->input('p_about_us');

            if ($request->hasFile('img_about_us')) {
                $file = $request->file('img_about_us');
                $filename = time() . "_about." . $file->getClientOriginalExtension();
                $path = $file->storeAs('contenido_ingles/about', $filename, 'public');
                $data['img_about_us'] = $path;

                if ($contenido && !empty($contenido->img_about_us)) {
                    $oldFilesToDelete[] = $contenido->img_about_us;
                }
            }

            for ($i=1; $i<=4; $i++) {
                if ($request->has("i__about_us_$i"))  $data["i__about_us_$i"]  = $request->input("i__about_us_$i");
                if ($request->has("h5__about_us_$i")) $data["h5__about_us_$i"] = $request->input("h5__about_us_$i");
            }
        }

        // === SERVICES ===
        if ($section === 'services' || $section === 'all') {
            if ($request->has('h2_services')) $data['h2_services'] = $request->input('h2_services');
            for ($i=1; $i<=4; $i++) {
                if ($request->has("i_services_$i"))   $data["i_services_$i"]   = $request->input("i_services_$i");
                if ($request->has("h4__services_$i")) $data["h4__services_$i"] = $request->input("h4__services_$i");
                if ($request->has("p__services_$i"))  $data["p__services_$i"]  = $request->input("p__services_$i");
            }
        }

        // === PORTFOLIO ===
        if ($section === 'portfolio' || $section === 'all') {
            if ($request->has('h2_portfolio')) $data['h2_portfolio'] = $request->input('h2_portfolio');

            for ($i=1; $i<=6; $i++) {
                if ($request->hasFile("img_portfolio_$i")) {
                    $file = $request->file("img_portfolio_$i");
                    $filename = time() . "_portfolio_$i." . $file->getClientOriginalExtension();
                    $path = $file->storeAs('contenido_ingles/portfolio', $filename, 'public');
                    $data["img_portfolio_$i"] = $path;

                    if ($contenido && !empty($contenido->{"img_portfolio_$i"})) {
                        $oldFilesToDelete[] = $contenido->{"img_portfolio_$i"};
                    }
                }
            }
        }

        // === TESTIMONIALS ===
        if ($section === 'testimonials' || $section === 'all') {
            if ($request->has('h2_testimonials')) $data['h2_testimonials'] = $request->input('h2_testimonials');

            for ($i=1; $i<=3; $i++) {
                if ($request->hasFile("img_testimonials_$i")) {
                    $file = $request->file("img_testimonials_$i");
                    $filename = time() . "_testimonial_$i." . $file->getClientOriginalExtension();
                    $path = $file->storeAs('contenido_ingles/testimonials', $filename, 'public');
                    $data["img_testimonials_$i"] = $path;

                    if ($contenido && !empty($contenido->{"img_testimonials_$i"})) {
                        $oldFilesToDelete[] = $contenido->{"img_testimonials_$i"};
                    }
                }
                if ($request->has("h5_testimonials_$i"))       $data["h5_testimonials_$i"]      = $request->input("h5_testimonials_$i");
                if ($request->has("p_testimonials_city_$i"))   $data["p_testimonials_city_$i"]  = $request->input("p_testimonials_city_$i");
                if ($request->has("p_testimonials_$i"))        $data["p_testimonials_$i"]       = $request->input("p_testimonials_$i");
            }
        }

        // === CTA ===
        if ($section === 'cta' || $section === 'all') {
            if ($request->has('h2_call')) $data['h2_call'] = $request->input('h2_call');
            if ($request->has('btn_call')) $data['btn_call'] = $request->input('btn_call');
        }

        // === CONTACT ===
        if ($section === 'contact' || $section === 'all') {
            if ($request->has('h2_contact_title'))   $data['h2_contact_title']   = $request->input('h2_contact_title');
            if ($request->has('p_contact_title'))    $data['p_contact_title']    = $request->input('p_contact_title');
            if ($request->has('h4_contact_1'))       $data['h4_contact_1']       = $request->input('h4_contact_1');
            if ($request->has('p_contact_1'))        $data['p_contact_1']        = $request->input('p_contact_1');
            if ($request->has('h4_contact_email_1')) $data['h4_contact_email_1'] = $request->input('h4_contact_email_1');
            if ($request->has('p_contact_email_1'))  $data['p_contact_email_1']  = $request->input('p_contact_email_1');
        }

        if (empty($data)) {
            return back()->with('warning', 'No se detectaron cambios para guardar.');
        }

        $data['updated_at'] = now();

        DB::beginTransaction();

        if ($contenido) {
            DB::table('contenido_ingles')->where('id', $contenido->id)->update($data);
        } else {
            $data['created_at'] = now();
            DB::table('contenido_ingles')->insert($data);
        }

        DB::commit();

        // Borra archivos antiguos SOLO después de éxito en BD
        foreach ($oldFilesToDelete as $old) {
            try {
                if ($old && Storage::disk('public')->exists($old)) {
                    Storage::disk('public')->delete($old);
                }
            } catch (\Throwable $e) {
                Log::warning('No se pudo borrar archivo antiguo: '.$old, ['err'=>$e->getMessage()]);
            }
        }

        $label = strtoupper($section) === 'ALL' ? 'todo' : $section;
        return back()->with('success', "Se guardaron los cambios de la sección: {$label}.");

    } catch (\Throwable $e) {
        Log::error('Error en updateEn', [
            'message' => $e->getMessage(),
            'line'    => $e->getLine(),
            'section' => $request->input('section'),
        ]);
        // No withInput() para evitar reinyectar payload grande
        return back()->with('error', 'Error al guardar: '.$e->getMessage());
    }
}

  public function editarEn()
    {
        // return view('admin.paginas.editar-en');

            $contenido = DB::table('contenido_ingles')->first();
            return view('admin.paginas.editar-en', compact('contenido'));
    }

    public function editarglobal()

    {
                     $global = GlobalSetting::getSettings();

     return view('admin.paginas.editar-es', compact('global'));

        // return view('admin.paginas.editar-es');
    }

    
}
