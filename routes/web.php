<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InicioController;

// ========================================
// RUTAS PÚBLICAS
// ========================================

Route::get('/',               [PageController::class, 'home'])->name('welcome');
Route::get('/sobre-mi',       [PageController::class, 'about'])->name('about');
Route::get('/move-challenge', [PageController::class, 'move'])->name('move');
Route::get('/comunidad',      [PageController::class, 'community'])->name('community');
Route::get('/contacto',       [PageController::class, 'contact'])->name('contact');
Route::get('/blog',           [PageController::class, 'blog'])->name('blog');

// Rutas de idioma
Route::get('/showEnglish', [PageController::class, 'showEnglish'])->name('home');
Route::get('/home-english', [PageController::class, 'showEnglish'])->name('home-english');

Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

// ========================================
// RUTAS DE AUTENTICACIÓN
// ========================================

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ========================================
// RUTAS DE ADMINISTRACIÓN
// ========================================

Route::prefix('admin')->middleware(['auth'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Configuración global
    Route::get('/global', [GlobalController::class, 'index'])->name('global.index');
    Route::post('/global/update', [GlobalController::class, 'update'])->name('global.update');
    
    Route::get('/configuracion', [AdminController::class, 'configuracion'])->name('admin.configuracion');
    
    // ========================================
    // PÁGINAS - Edición por idioma
    // ========================================
    
    Route::prefix('paginas')->group(function () {
        // Edición de idiomas (EN/ES)
        Route::get('/en', [PaginaController::class, 'editarEn'])->name('paginas.editar.en');
        Route::get('/es', [PaginaController::class, 'editarglobal'])->name('paginas.editar.es');
        Route::post('/en', [PaginaController::class, 'updateEn'])->name('contenido-ingles.update');
        
        // ========================================
        // PÁGINA DE INICIO - InicioController
        // ========================================
        
        // Mostrar formulario de edición
        Route::get('/inicio', [InicioController::class, 'edit'])->name('paginas.inicio.edit');
        
        // Actualizar secciones de inicio
        Route::put('/inicio/hero', [InicioController::class, 'updateHero'])->name('paginas.update.hero');
        Route::put('/inicio/features', [InicioController::class, 'updateFeatures'])->name('paginas.update.features');
        Route::put('/inicio/about', [InicioController::class, 'updateAbout'])->name('paginas.update.about');
        Route::put('/inicio/gallery', [InicioController::class, 'updateGallery'])->name('paginas.update.gallery');
        Route::put('/inicio/quote', [InicioController::class, 'updateQuote'])->name('paginas.update.quote');
        Route::put('/inicio/pricing', [InicioController::class, 'updatePricing'])->name('paginas.update.pricing');
        Route::put('/inicio/contact', [InicioController::class, 'updateContact'])->name('paginas.update.contact');
        
        // ========================================
        // OTRAS PÁGINAS - AdminController
        // ========================================
        
        Route::get('/sobre-mi', [AdminController::class, 'editSobreMi'])->name('paginas.sobre-mi.edit');
        Route::get('/move-challenge', [AdminController::class, 'editMoveChallenge'])->name('paginas.move-challenge.edit');
        Route::get('/programas', [AdminController::class, 'editProgramas'])->name('paginas.programas.edit');
        Route::get('/blog', [AdminController::class, 'editBlog'])->name('paginas.blog.edit');
        Route::get('/contacto', [AdminController::class, 'editContacto'])->name('paginas.contacto.edit');
    });
});

require __DIR__.'/auth.php';