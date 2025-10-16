<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MoveController;

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
        
        Route::get('/sobre-mi', [AboutController::class, 'edit'])->name('paginas.sobre-mi.edit');
        Route::put('/sobre-mi/hero',        [AboutController::class, 'updateHero'])->name('paginas.sobremi.update.hero');
        Route::put('/sobre-mi/story',       [AboutController::class, 'updateStory'])->name('paginas.sobremi.update.story');
        Route::put('/sobre-mi/values',      [AboutController::class, 'updateValues'])->name('paginas.sobremi.update.values');
        Route::put('/sobre-mi/credentials', [AboutController::class, 'updateCredentials'])->name('paginas.sobremi.update.credentials');
        Route::put('/sobre-mi/cta',         [AboutController::class, 'updateCta'])->name('paginas.sobremi.update.cta');


        Route::get('/move-challenge', [MoveController::class, 'edit'])->name('paginas.move-challenge.edit');
        Route::prefix('admin/move')->name('paginas.move.')->group(function () {
            Route::put('/hero',      [MoveController::class, 'updateHero'])->name('update.hero');
            Route::put('/about',     [MoveController::class, 'updateAbout'])->name('update.about');
            Route::put('/includes',  [MoveController::class, 'updateIncludes'])->name('update.includes');
            Route::put('/how',       [MoveController::class, 'updateHow'])->name('update.how');
            Route::put('/benefits',  [MoveController::class, 'updateBenefits'])->name('update.benefits');
            Route::put('/cta',       [MoveController::class, 'updateCta'])->name('update.cta');
        });


        Route::get('/programas', [CommunityController::class, 'edit'])->name('paginas.programas.edit');
        Route::put('/hero',[CommunityController::class,'updateProgramsHero'])->name('paginas.community.update.hero');
        Route::put('/grid',[CommunityController::class,'updateProgramsGrid'])->name('paginas.community.update.grid');
        Route::put('/cta',[CommunityController::class,'updateProgramsCta'])->name('paginas.community.update.cta');

        Route::get('/blog', [BlogController::class, 'edit'])->name('paginas.blog.edit');
        Route::put('/admin/blog/hero',[BlogController::class,'updateHero'])->name('paginas.blog.update.hero');
        Route::put('/admin/blog/posts',[BlogController::class,'updatePosts'])->name('paginas.blog.update.posts');
        Route::put('/newsletter', [BlogController::class,'updateBlogNewsletter'])->name('paginas.blog.update.newsletter');

        Route::get('/contacto', [ContactController::class, 'edit'])->name('paginas.contacto.edit');
        Route::put('/contact/hero', [ContactController::class,'updateContactHero'])->name('paginas.contact.update.hero');
        Route::put('/contact/form', [ContactController::class,'updateContactForm'])->name('paginas.contact.update.form');
        Route::put('/contact/info', [ContactController::class,'updateContactInfo'])->name('paginas.contact.update.info');

        Route::get('/configuracion', [ConfiguracionController::class, 'edit'])->name('admin.configuracion');
        Route::put('/configuracion/header', [ConfiguracionController::class,'updateHeader'])->name('layout.update.header');
        Route::put('/configuracion/footer', [ConfiguracionController::class,'updateFooter'])->name('layout.update.footer');


    });
});

require __DIR__.'/auth.php';