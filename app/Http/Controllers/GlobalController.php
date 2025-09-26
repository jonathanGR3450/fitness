<?php

namespace App\Http\Controllers;

use App\Models\GlobalSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GlobalController extends Controller
{
    /**
     * Mostrar el formulario de configuración global
     */
    public function index()
    {
        $global = GlobalSetting::getSettings();
        
        // Cambiar a tu vista real - ajusta el nombre según tu estructura
        return view('admin.paginas.editar-es', compact('global'));
    }

    /**
     * Actualizar la configuración global
     */
 public function update(Request $request)
{
    try {
        // Debug inicial
        \Log::info('🚀 INICIO - GlobalController update');
        \Log::info('📄 Request data:', $request->all());
        
        // Limpiar sesión para evitar problemas
        session()->forget('_old_input');

        // Obtener configuración actual
        $global = GlobalSetting::getSettings();
        
        // Preparar datos
        $data = [];
        
        // Procesar campos de texto (sin cambios)
        if ($request->has('site_name')) {
            $data['site_name'] = $request->input('site_name');
        }
        if ($request->has('site_slogan')) {
            $data['site_slogan'] = $request->input('site_slogan');
        }
        if ($request->has('link_facebook')) {
            $data['link_facebook'] = $request->input('link_facebook');
        }
        if ($request->has('link_instagram')) {
            $data['link_instagram'] = $request->input('link_instagram');
        }
        if ($request->has('link_pinterest')) {
            $data['link_pinterest'] = $request->input('link_pinterest');
        }
        if ($request->has('meta_title')) {
            $data['meta_title'] = $request->input('meta_title');
        }
        if ($request->has('meta_description')) {
            $data['meta_description'] = $request->input('meta_description');
        }
        if ($request->has('meta_keywords')) {
            $data['meta_keywords'] = $request->input('meta_keywords');
        }
        if ($request->has('meta_author')) {
            $data['meta_author'] = $request->input('meta_author');
        }
        if ($request->has('meta_robots')) {
            $data['meta_robots'] = $request->input('meta_robots');
        }
        if ($request->has('canonical_url')) {
            $data['canonical_url'] = $request->input('canonical_url');
        }
        if ($request->has('google_analytics')) {
            $data['google_analytics'] = $request->input('google_analytics');
        }

        // LOGO - VERSIÓN ESPECÍFICA PARA TU HOSTING
        if ($request->hasFile('logo')) {
            \Log::info('📁 Logo file detected');
            
            $file = $request->file('logo');
            \Log::info('📄 File info:', [
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'type' => $file->getMimeType()
            ]);
            
            $filename = time() . "_logo." . $file->getClientOriginalExtension();
            
            // RUTA ESPECÍFICA PARA TU HOSTING - CAMBIO CRÍTICO
$destinationPath = base_path('../public_html/storage/global/logos');
            \Log::info('🎯 Destination path: ' . $destinationPath);
            
            // Verificar/crear directorio
            if (!is_dir($destinationPath)) {
                \Log::info('📁 Creating directory...');
                mkdir($destinationPath, 0755, true);
            }
            
            // Eliminar archivo anterior
            if ($global->logo) {
                $oldFile = base_path('../public_html/storage/global/logos' . $global->logo);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                    \Log::info('🗑️ Old logo deleted: ' . $oldFile);
                }
            }
            
            // Mover archivo
            \Log::info('📤 Moving file to: ' . $destinationPath . '/' . $filename);
            
            if ($file->move($destinationPath, $filename)) {
                $data['logo'] = 'global/logos/' . $filename;
                
                // Dar permisos
                $fullPath = $destinationPath . '/' . $filename;
                chmod($fullPath, 0644);
                
                \Log::info('✅ SUCCESS - Logo saved: ' . $fullPath);
                \Log::info('📝 DB value: ' . $data['logo']);
            } else {
                \Log::error('❌ FAILED to move logo file');
                throw new \Exception('Error moving logo file');
            }
        }

        // FAVICON - MISMA LÓGICA
        if ($request->hasFile('favicon')) {
            \Log::info('🖼️ Favicon file detected');
            
            $file = $request->file('favicon');
            $filename = time() . "_favicon." . $file->getClientOriginalExtension();
            
            $destinationPath = base_path('../public_html/storage/global/favicons');
            
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            if ($global->favicon) {
                $oldFile = base_path('../public_html/storage/' . $global->favicon);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            
            if ($file->move($destinationPath, $filename)) {
                $data['favicon'] = 'global/favicons/' . $filename;
                chmod($destinationPath . '/' . $filename, 0644);
                \Log::info('✅ Favicon saved: ' . $destinationPath . '/' . $filename);
            } else {
                \Log::error('❌ FAILED to move favicon file');
                throw new \Exception('Error moving favicon file');
            }
        }

        // Guardar en base de datos
        \Log::info('💾 Data to save:', $data);
        
        $data['updated_at'] = now();

        if ($global->exists) {
            $global->update($data);
            \Log::info('✅ Database updated for ID: ' . $global->id);
            $message = 'Configuración global actualizada exitosamente.';
        } else {
            $data['created_at'] = now();
            $newGlobal = GlobalSetting::create($data);
            \Log::info('✅ New record created with ID: ' . $newGlobal->id);
            $message = 'Configuración global creada exitosamente.';
        }

        return redirect()->route('global.index')->with('success', $message);

    } catch (\Exception $e) {
        \Log::error('❌ EXCEPTION in GlobalController@update: ' . $e->getMessage());
        \Log::error('📍 Stack trace: ' . $e->getTraceAsString());
        return redirect()->back()->with('error', 'Error al guardar: ' . $e->getMessage());
    }
}
}