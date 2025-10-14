@extends('layouts.admin')

@section('title', 'Editar Página de Inicio')


@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Sidebar con Secciones -->
        <div class="col-md-3">
            <div class="card" style="position: sticky; top: 80px;">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">📋 Secciones</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#seccion-hero" class="list-group-item list-group-item-action active" data-section="hero">
                        🎯 Hero
                    </a>
                    <a href="#seccion-features" class="list-group-item list-group-item-action" data-section="features">
                        ⭐ Features
                    </a>
                    <a href="#seccion-about" class="list-group-item list-group-item-action" data-section="about">
                        📖 About / Video
                    </a>
                    <a href="#seccion-gallery" class="list-group-item list-group-item-action" data-section="gallery">
                        🖼️ Galería
                    </a>
                    <a href="#seccion-quote" class="list-group-item list-group-item-action" data-section="quote">
                        💭 Frase Inspiracional
                    </a>
                    <a href="#seccion-pricing" class="list-group-item list-group-item-action" data-section="pricing">
                        💰 Precios
                    </a>
                    <a href="#seccion-contact" class="list-group-item list-group-item-action" data-section="contact">
                        📧 Contacto
                    </a>
                </div>
            </div>
        </div>

        <!-- Formularios de Edición -->
        <div class="col-md-9">
            <!-- Header -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-1">✏️ Editar Página de Inicio</h2>
                        </div>
                        <div>
                            <a href="{{ route('welcome') }}" class="btn btn-outline-primary" target="_blank">
                                👁️ Ver Página
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navegación por Pestañas -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="btn-group w-100 section-tabs" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-target="seccion-hero">
                            🎯 Hero
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-features">
                            ⭐ Features
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-about">
                            📖 About
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-gallery">
                            🖼️ Galería
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-quote">
                            💭 Frase
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-pricing">
                            💰 Precios
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-contact">
                            📧 Contacto
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mensajes de éxito -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ✅ {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- ========================================= -->
            <!-- FORMULARIO 1: HERO -->
            <!-- ========================================= -->
  <form action="{{ route('paginas.update.hero') }}" method="POST" enctype="multipart/form-data" class="section-form" data-section="seccion-hero">
    @csrf
    @method('PUT')
    
    <input type="hidden" name="idioma" value="{{ $idioma }}">
    <input type="hidden" name="pagina" value="{{ $pagina }}">
    <input type="hidden" name="seccion" value="hero">

    <div class="card mb-4" id="seccion-hero">
        <div class="card-header bg-light">
            <h4 class="mb-0">🎯 Hero</h4>
        </div>
        <div class="card-body">
            <div class="row g-3">
                
                @php
                    // Buscar por clave en la colección
                    $heroTitulo = $contenidos['hero']->firstWhere('clave', 'titulo');
                    $heroSubtitulo = $contenidos['hero']->firstWhere('clave', 'subtitulo');
                    $heroBotonTexto = $contenidos['hero']->firstWhere('clave', 'boton_texto');
                    $heroBotonUrl = $contenidos['hero']->firstWhere('clave', 'boton_url');
                    $heroImagen = $contenidos['hero']->firstWhere('clave', 'imagen');
                @endphp
                
                <!-- Título Principal -->
                <div class="col-md-12">
                    <label for="hero_titulo" class="form-label d-flex align-items-center">
                        <strong>Título Principal</strong>
                        <span class="badge bg-primary ms-2">TEXTO</span>
                    </label>
                    <small class="text-muted d-block mb-2">Título principal del hero</small>
                    <input 
                        type="text" 
                        name="hero__titulo" 
                        id="hero_titulo"
                        class="form-control" 
                        value="{{ $heroTitulo->valor ?? 'Transforma tu vida con el Move Challenge' }}"
                    >
                </div>

                <!-- Subtítulo -->
                <div class="col-md-12">
                    <label for="hero_subtitulo" class="form-label d-flex align-items-center">
                        <strong>Subtítulo</strong>
                        <span class="badge bg-primary ms-2">TEXTO</span>
                    </label>
                    <small class="text-muted d-block mb-2">Subtítulo descriptivo</small>
                    <textarea 
                        name="hero__subtitulo" 
                        id="hero_subtitulo"
                        class="form-control" 
                        rows="3"
                    >{{ $heroSubtitulo->valor ?? '30 días de movimiento consciente, nutrición balanceada y conexión interior. Únete a nuestra comunidad y descubre tu mejor versión.' }}</textarea>
                </div>

                <!-- Texto del Botón -->
                <div class="col-md-6">
                    <label for="hero_boton_texto" class="form-label d-flex align-items-center">
                        <strong>Texto del Botón</strong>
                        <span class="badge bg-primary ms-2">TEXTO</span>
                    </label>
                    <small class="text-muted d-block mb-2">Texto del botón principal</small>
                    <input 
                        type="text" 
                        name="hero__boton_texto" 
                        id="hero_boton_texto"
                        class="form-control" 
                        value="{{ $heroBotonTexto->valor ?? 'Quiero mi cupo' }}"
                    >
                </div>

                <!-- URL del Botón -->
                <div class="col-md-6">
                    <label for="hero_boton_url" class="form-label d-flex align-items-center">
                        <strong>URL del Botón</strong>
                        <span class="badge bg-info ms-2">URL</span>
                    </label>
                    <small class="text-muted d-block mb-2">URL del botón (puede ser #seccion o URL completa)</small>
                    <input 
                        type="text" 
                        name="hero__boton_url" 
                        id="hero_boton_url"
                        class="form-control" 
                        value="{{ $heroBotonUrl->valor ?? '#contact' }}"
                        placeholder="https:// o #seccion"
                    >
                </div>

                <!-- Imagen Principal -->
               <div class="col-md-12">
    <label for="hero_imagen" class="form-label d-flex align-items-center">
        <strong>Imagen Principal</strong>
        <span class="badge bg-success ms-2">IMAGEN</span>
    </label>
    <small class="text-muted d-block mb-2">Imagen principal del hero</small>
    
    <!-- Tabs para elegir método de carga -->
    <ul class="nav nav-tabs mb-3" id="imageTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="upload-tab" data-bs-toggle="tab" data-bs-target="#upload-panel" type="button">
                📤 Subir Imagen
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="url-tab" data-bs-toggle="tab" data-bs-target="#url-panel" type="button">
                🔗 URL Manual
            </button>
        </li>
    </ul>
    
    <div class="tab-content" id="imageTabContent">
        <!-- Panel de subida de archivo -->
        <div class="tab-pane fade show active" id="upload-panel" role="tabpanel">
            <input 
                type="file" 
                name="hero__imagen_file" 
                id="hero_imagen_file"
                class="form-control mb-2" 
                accept="image/*"
                onchange="previewImage(this, 'preview_hero_imagen')"
            >
            <small class="text-muted">Formatos permitidos: JPG, PNG, GIF, WEBP (Máx. 2MB)</small>
        </div>
        
        <!-- Panel de URL manual -->
        <div class="tab-pane fade" id="url-panel" role="tabpanel">
            <input 
                type="text" 
                name="hero__imagen_url" 
                id="hero_imagen_url"
                class="form-control" 
                value="{{ $heroImagen->valor ?? 'images/sinfondo.png' }}"
                placeholder="images/ejemplo.jpg"
            >
            <small class="text-muted">Ingresa la ruta de la imagen manualmente</small>
        </div>
    </div>
    
    <!-- Vista previa de la imagen actual -->
    <div class="mt-3">
        <label class="form-label"><strong>Vista Previa:</strong></label>
        <div class="border rounded p-2 bg-light">
            <img 
                id="preview_hero_imagen"
                src="{{ asset($heroImagen->valor ?? 'images/sinfondo.png') }}" 
                alt="Preview" 
                class="img-thumbnail" 
                style="max-height: 200px; max-width: 100%;"
                onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22200%22%3E%3Crect fill=%22%23ddd%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 fill=%22%23999%22 text-anchor=%22middle%22 dy=%22.3em%22%3ESin imagen%3C/text%3E%3C/svg%3E'"
            >
        </div>
        <small class="text-muted">Ruta actual: <code>{{ $heroImagen->valor ?? 'images/sinfondo.png' }}</code></small>
    </div>
</div>


            </div>
        </div>
        <div class="card-footer bg-light">
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg">
                    💾 Guardar Sección Hero
                </button>
            </div>
        </div>
    </div>
</form>

            <!-- ========================================= -->
            <!-- FORMULARIO 2: FEATURES -->
            <!-- ========================================= -->
            <form action="" method="POST" enctype="multipart/form-data" class="section-form" data-section="seccion-features" style="display: none;">
                @csrf
                @method('PUT')
                
                <input type="hidden" name="idioma" value="es">
                <input type="hidden" name="pagina" value="inicio">
                <input type="hidden" name="seccion" value="features">

                <div class="card mb-4" id="seccion-features">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">⭐ Features</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            
                            <!-- Título de Sección -->
                            <div class="col-md-12">
                                <label for="features_titulo" class="form-label d-flex align-items-center">
                                    <strong>Título de Sección</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <small class="text-muted d-block mb-2">Título de la sección de características</small>
                                <input 
                                    type="text" 
                                    name="features__titulo_seccion" 
                                    id="features_titulo"
                                    class="form-control" 
                                    value="¿Qué incluye el Move Challenge?"
                                >
                            </div>

                            <!-- Subtítulo de Sección -->
                            <div class="col-md-12">
                                <label for="features_subtitulo" class="form-label d-flex align-items-center">
                                    <strong>Subtítulo de Sección</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <small class="text-muted d-block mb-2">Subtítulo de la sección</small>
                                <textarea 
                                    name="features__subtitulo_seccion" 
                                    id="features_subtitulo"
                                    class="form-control" 
                                    rows="2"
                                >Todo lo que necesitas para crear hábitos sostenibles y transformar tu bienestar</textarea>
                            </div>

                            <div class="col-md-12"><hr></div>

                            <!-- ============ FEATURE 1 ============ -->
                            <div class="col-md-12">
                                <h5 class="text-primary">🎯 Feature 1</h5>
                            </div>

                            <div class="col-md-4">
                                <label for="feature_1_icono" class="form-label d-flex align-items-center">
                                    <strong>Ícono</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <small class="text-muted d-block mb-2">Clase Font Awesome</small>
                                <input 
                                    type="text" 
                                    name="features__feature_1_icono" 
                                    id="feature_1_icono"
                                    class="form-control" 
                                    value="fas fa-dumbbell"
                                    placeholder="fas fa-icon"
                                >
                            </div>

                            <div class="col-md-8">
                                <label for="feature_1_titulo" class="form-label d-flex align-items-center">
                                    <strong>Título</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="features__feature_1_titulo" 
                                    id="feature_1_titulo"
                                    class="form-control" 
                                    value="Plan de entrenamiento semipersonalizado"
                                >
                            </div>

                            <div class="col-md-12">
                                <label for="feature_1_descripcion" class="form-label d-flex align-items-center">
                                    <strong>Descripción</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea 
                                    name="features__feature_1_descripcion" 
                                    id="feature_1_descripcion"
                                    class="form-control" 
                                    rows="2"
                                >Rutinas adaptadas para casa o gimnasio, diseñadas según tu nivel y objetivos específicos.</textarea>
                            </div>

                            <div class="col-md-12"><hr></div>

                            <!-- ============ FEATURE 2 ============ -->
                            <div class="col-md-12">
                                <h5 class="text-primary">🎯 Feature 2</h5>
                            </div>

                            <div class="col-md-4">
                                <label for="feature_2_icono" class="form-label d-flex align-items-center">
                                    <strong>Ícono</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="features__feature_2_icono" 
                                    id="feature_2_icono"
                                    class="form-control" 
                                    value="fas fa-apple-alt"
                                >
                            </div>

                            <div class="col-md-8">
                                <label for="feature_2_titulo" class="form-label d-flex align-items-center">
                                    <strong>Título</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="features__feature_2_titulo" 
                                    id="feature_2_titulo"
                                    class="form-control" 
                                    value="Plan de alimentación nutritivo"
                                >
                            </div>

                            <div class="col-md-12">
                                <label for="feature_2_descripcion" class="form-label d-flex align-items-center">
                                    <strong>Descripción</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea 
                                    name="features__feature_2_descripcion" 
                                    id="feature_2_descripcion"
                                    class="form-control" 
                                    rows="2"
                                >Menús balanceados adaptados a tus requerimientos y gustos, sin restricciones extremas.</textarea>
                            </div>

                            <div class="col-md-12"><hr></div>

                            <!-- ============ FEATURE 3 ============ -->
                            <div class="col-md-12">
                                <h5 class="text-primary">🎯 Feature 3</h5>
                            </div>

                            <div class="col-md-4">
                                <label for="feature_3_icono" class="form-label d-flex align-items-center">
                                    <strong>Ícono</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="features__feature_3_icono" 
                                    id="feature_3_icono"
                                    class="form-control" 
                                    value="fas fa-utensils"
                                >
                            </div>

                            <div class="col-md-8">
                                <label for="feature_3_titulo" class="form-label d-flex align-items-center">
                                    <strong>Título</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="features__feature_3_titulo" 
                                    id="feature_3_titulo"
                                    class="form-control" 
                                    value="Recetas fáciles y deliciosas"
                                >
                            </div>

                            <div class="col-md-12">
                                <label for="feature_3_descripcion" class="form-label d-flex align-items-center">
                                    <strong>Descripción</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea 
                                    name="features__feature_3_descripcion" 
                                    id="feature_3_descripcion"
                                    class="form-control" 
                                    rows="2"
                                >Preparaciones simples y nutritivas que se adaptan a tu rutina diaria.</textarea>
                            </div>

                            <div class="col-md-12"><hr></div>

                            <!-- ============ FEATURE 4 ============ -->
                            <div class="col-md-12">
                                <h5 class="text-primary">🎯 Feature 4</h5>
                            </div>

                            <div class="col-md-4">
                                <label for="feature_4_icono" class="form-label d-flex align-items-center">
                                    <strong>Ícono</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="features__feature_4_icono" 
                                    id="feature_4_icono"
                                    class="form-control" 
                                    value="fas fa-spa"
                                >
                            </div>

                            <div class="col-md-8">
                                <label for="feature_4_titulo" class="form-label d-flex align-items-center">
                                    <strong>Título</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="features__feature_4_titulo" 
                                    id="feature_4_titulo"
                                    class="form-control" 
                                    value="Meditación y respiración"
                                >
                            </div>

                            <div class="col-md-12">
                                <label for="feature_4_descripcion" class="form-label d-flex align-items-center">
                                    <strong>Descripción</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea 
                                    name="features__feature_4_descripcion" 
                                    id="feature_4_descripcion"
                                    class="form-control" 
                                    rows="2"
                                >Técnicas guiadas para conectar cuerpo y mente, reducir estrés y mejorar tu bienestar.</textarea>
                            </div>

                            <div class="col-md-12"><hr></div>

                            <!-- ============ FEATURE 5 ============ -->
                            <div class="col-md-12">
                                <h5 class="text-primary">🎯 Feature 5</h5>
                            </div>

                            <div class="col-md-4">
                                <label for="feature_5_icono" class="form-label d-flex align-items-center">
                                    <strong>Ícono</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="features__feature_5_icono" 
                                    id="feature_5_icono"
                                    class="form-control" 
                                    value="fas fa-lightbulb"
                                >
                            </div>

                            <div class="col-md-8">
                                <label for="feature_5_titulo" class="form-label d-flex align-items-center">
                                    <strong>Título</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="features__feature_5_titulo" 
                                    id="feature_5_titulo"
                                    class="form-control" 
                                    value="Tips de conexión interior"
                                >
                            </div>

                            <div class="col-md-12">
                                <label for="feature_5_descripcion" class="form-label d-flex align-items-center">
                                    <strong>Descripción</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea 
                                    name="features__feature_5_descripcion" 
                                    id="feature_5_descripcion"
                                    class="form-control" 
                                    rows="2"
                                >Herramientas prácticas para desarrollar consciencia y mantener la motivación.</textarea>
                            </div>

                            <div class="col-md-12"><hr></div>

                            <!-- ============ FEATURE 6 ============ -->
                            <div class="col-md-12">
                                <h5 class="text-primary">🎯 Feature 6</h5>
                            </div>

                            <div class="col-md-4">
                                <label for="feature_6_icono" class="form-label d-flex align-items-center">
                                    <strong>Ícono</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="features__feature_6_icono" 
                                    id="feature_6_icono"
                                    class="form-control" 
                                    value="fas fa-users"
                                >
                            </div>

                            <div class="col-md-8">
                                <label for="feature_6_titulo" class="form-label d-flex align-items-center">
                                    <strong>Título</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="features__feature_6_titulo" 
                                    id="feature_6_titulo"
                                    class="form-control" 
                                    value="Comunidad de apoyo"
                                >
                            </div>

                            <div class="col-md-12">
                                <label for="feature_6_descripcion" class="form-label d-flex align-items-center">
                                    <strong>Descripción</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea 
                                    name="features__feature_6_descripcion" 
                                    id="feature_6_descripcion"
                                    class="form-control" 
                                    rows="2"
                                >Acompañamiento constante de profesionales y compañeros en tu journey.</textarea>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">
                                💾 Guardar Sección Features
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- ========================================= -->
            <!-- FORMULARIO 3: ABOUT (Placeholder) -->
            <!-- ========================================= -->
            <div class="section-form" data-section="seccion-about" style="display: none;">
                <div class="card mb-4" id="seccion-about">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">📖 About / Video</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            <strong>Próximamente:</strong> Formulario para editar la sección About
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================= -->
            <!-- FORMULARIO 4: GALLERY (Placeholder) -->
            <!-- ========================================= -->
            <div class="section-form" data-section="seccion-gallery" style="display: none;">
                <div class="card mb-4" id="seccion-gallery">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">🖼️ Galería</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            <strong>Próximamente:</strong> Formulario para editar la galería
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================= -->
            <!-- FORMULARIO 5: QUOTE (Placeholder) -->
            <!-- ========================================= -->
            <div class="section-form" data-section="seccion-quote" style="display: none;">
                <div class="card mb-4" id="seccion-quote">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">💭 Frase Inspiracional</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            <strong>Próximamente:</strong> Formulario para editar la frase
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================= -->
            <!-- FORMULARIO 6: PRICING (Placeholder) -->
            <!-- ========================================= -->
            <div class="section-form" data-section="seccion-pricing" style="display: none;">
                <div class="card mb-4" id="seccion-pricing">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">💰 Precios</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            <strong>Próximamente:</strong> Formulario para editar los planes de precios
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================= -->
            <!-- FORMULARIO 7: CONTACT (Placeholder) -->
            <!-- ========================================= -->
            <div class="section-form" data-section="seccion-contact" style="display: none;">
                <div class="card mb-4" id="seccion-contact">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">📧 Contacto</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            <strong>Próximamente:</strong> Formulario para editar la sección de contacto
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón volver al Dashboard -->
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        ← Volver al Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .list-group-item {
        border-left: 3px solid transparent;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .list-group-item:hover,
    .list-group-item.active {
        border-left-color: #0d6efd;
        background-color: #f8f9fa;
        font-weight: 600;
    }
    
    .card {
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13,110,253,.25);
    }
    
    textarea.form-control {
        resize: vertical;
    }

    /* Botones de pestañas */
    .section-tabs {
        flex-wrap: wrap;
    }

    .section-tabs .btn {
        flex: 1 1 auto;
        min-width: 100px;
        margin-bottom: 5px;
    }

    .section-tabs .btn.active {
        background-color: #0d6efd;
        color: white;
        font-weight: bold;
    }

    /* Transiciones suaves */
    .section-form {
        animation: fadeIn 0.3s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elementos
        const sidebarLinks = document.querySelectorAll('.list-group-item[data-section]');
        const tabButtons = document.querySelectorAll('.section-tabs .btn');
        const sectionForms = document.querySelectorAll('.section-form');

        // Función para mostrar una sección
        function showSection(sectionId) {
            // Ocultar todas las secciones
            sectionForms.forEach(form => {
                form.style.display = 'none';
            });

            // Mostrar la sección seleccionada
            const targetForm = document.querySelector(`.section-form[data-section="${sectionId}"]`);
            if (targetForm) {
                targetForm.style.display = 'block';
                
                // Scroll suave a la sección
                setTimeout(() => {
                    targetForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            }

            // Actualizar estados activos en sidebar
            sidebarLinks.forEach(link => {
                link.classList.remove('active');
                if (link.dataset.section === sectionId.replace('seccion-', '')) {
                    link.classList.add('active');
                }
            });

            // Actualizar estados activos en tabs
            tabButtons.forEach(btn => {
                btn.classList.remove('active');
                if (btn.dataset.target === sectionId) {
                    btn.classList.add('active');
                }
            });
        }

        // Event listeners para sidebar
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const sectionId = 'seccion-' + this.dataset.section;
                showSection(sectionId);
            });
        });

        // Event listeners para tabs
        tabButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const sectionId = this.dataset.target;
                showSection(sectionId);
            });
        });

        // Mostrar la primera sección por defecto
        showSection('seccion-hero');
    });

       function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection