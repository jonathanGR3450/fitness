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
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver al Dashboard</a>
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
                                <input type="text" name="hero__titulo" id="hero_titulo" class="form-control" value="{{ $heroTitulo->valor ?? 'Transforma tu vida con el Move Challenge' }}">
                            </div>

                            <!-- Subtítulo -->
                            <div class="col-md-12">
                                <label for="hero_subtitulo" class="form-label d-flex align-items-center">
                                    <strong>Subtítulo</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <small class="text-muted d-block mb-2">Subtítulo descriptivo</small>
                                <textarea name="hero__subtitulo" id="hero_subtitulo" class="form-control" rows="3">{{ $heroSubtitulo->valor ?? '30 días de movimiento consciente, nutrición balanceada y conexión interior. Únete a nuestra comunidad y descubre tu mejor versión.' }}</textarea>
                            </div>

                            <!-- Texto del Botón -->
                            <div class="col-md-6">
                                <label for="hero_boton_texto" class="form-label d-flex align-items-center">
                                    <strong>Texto del Botón</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <small class="text-muted d-block mb-2">Texto del botón principal</small>
                                <input type="text" name="hero__boton_texto" id="hero_boton_texto" class="form-control" value="{{ $heroBotonTexto->valor ?? 'Quiero mi cupo' }}">
                            </div>

                            <!-- URL del Botón -->
                            <div class="col-md-6">
                                <label for="hero_boton_url" class="form-label d-flex align-items-center">
                                    <strong>URL del Botón</strong>
                                    <span class="badge bg-info ms-2">URL</span>
                                </label>
                                <small class="text-muted d-block mb-2">URL del botón (puede ser #seccion o URL completa)</small>
                                <input type="text" name="hero__boton_url" id="hero_boton_url" class="form-control" value="{{ $heroBotonUrl->valor ?? '#contact' }}" placeholder="https:// o #seccion">
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
                                        <input type="file" name="hero__imagen_file" id="hero_imagen_file" class="form-control mb-2" accept="image/*" onchange="previewImage(this, 'preview_hero_imagen')">
                                        <small class="text-muted">Formatos permitidos: JPG, PNG, GIF, WEBP (Máx. 2MB)</small>
                                    </div>

                                    <!-- Panel de URL manual -->
                                    <div class="tab-pane fade" id="url-panel" role="tabpanel">
                                        <input type="text" name="hero__imagen_url" id="hero_imagen_url" class="form-control" value="{{ $heroImagen->valor ?? 'images/sinfondo.png' }}" placeholder="images/ejemplo.jpg">
                                        <small class="text-muted">Ingresa la ruta de la imagen manualmente</small>
                                    </div>
                                </div>

                                <!-- Vista previa de la imagen actual -->
                                <div class="mt-3">
                                    <label class="form-label"><strong>Vista Previa:</strong></label>
                                    <div class="border rounded p-2 bg-light">
                                        <img id="preview_hero_imagen" src="{{ asset($heroImagen->valor ?? 'images/sinfondo.png') }}" alt="Preview" class="img-thumbnail" style="max-height: 200px; max-width: 100%;" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22200%22%3E%3Crect fill=%22%23ddd%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 fill=%22%23999%22 text-anchor=%22middle%22 dy=%22.3em%22%3ESin imagen%3C/text%3E%3C/svg%3E'">
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
            @php
                // $contenidos viene de InicioController@edit => groupBy('seccion')
                // Para features es una Collection de modelos (NO keyBy), por eso usamos firstWhere('clave', ...)
                $featuresItems = $contenidos['features'] ?? collect();

                // Helper: trae el valor por clave con fallback
                $fv = function (string $key, $default = null) use ($featuresItems) {
                    return optional($featuresItems->firstWhere('clave', $key))->valor ?? $default;
                };
                $defaults = [
                    1 => ['fas fa-dumbbell',  'Plan de entrenamiento semipersonalizado', 'Rutinas adaptadas para casa o gimnasio, diseñadas según tu nivel y objetivos específicos.'],
                    2 => ['fas fa-apple-alt', 'Plan de alimentación nutritivo',          'Menús balanceados adaptados a tus requerimientos y gustos, sin restricciones extremas.'],
                    3 => ['fas fa-utensils',  'Recetas fáciles y deliciosas',            'Preparaciones simples y nutritivas que se adaptan a tu rutina diaria.'],
                    4 => ['fas fa-spa',       'Meditación y respiración',                'Técnicas guiadas para conectar cuerpo y mente, reducir estrés y mejorar tu bienestar.'],
                    5 => ['fas fa-lightbulb', 'Tips de conexión interior',               'Herramientas prácticas para desarrollar consciencia y mantener la motivación.'],
                    6 => ['fas fa-users',     'Comunidad de apoyo',                      'Acompañamiento constante de profesionales y compañeros en tu journey.'],
                ];  
            @endphp
            <form action="{{ route('paginas.update.features') }}" method="POST" class="section-form" data-section="seccion-features" style="display:none;">
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
                                    value="{{ old('features__titulo_seccion', $fv('titulo_seccion', '¿Qué incluye el Move Challenge?')) }}"
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
                                >{{ old('features__subtitulo_seccion', $fv('subtitulo_seccion', 'Todo lo que necesitas para crear hábitos sostenibles y transformar tu bienestar')) }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <hr>
                            </div>

                            @for ($i = 1; $i <= 6; $i++)
                                @php
                                    [$defIcon, $defTitle, $defDesc] = $defaults[$i];
                                    $icon  = old("features__feature_{$i}_icono",       $fv("feature_{$i}_icono", $defIcon));
                                    $title = old("features__feature_{$i}_titulo",      $fv("feature_{$i}_titulo", $defTitle));
                                    $desc  = old("features__feature_{$i}_descripcion", $fv("feature_{$i}_descripcion", $defDesc));
                                @endphp

                                <div class="col-md-12"><h5 class="text-primary">🎯 Feature {{ $i }}</h5></div>

                                <div class="col-md-4">
                                    <label class="form-label d-flex align-items-center"><strong>Ícono</strong><span class="badge bg-primary ms-2">TEXTO</span></label>
                                    <small class="text-muted d-block mb-2">Clase Font Awesome</small>
                                    <input type="text" name="features__feature_{{ $i }}_icono" id="feature_{{ $i }}_icono" class="form-control" value="{{ $icon }}" placeholder="fas fa-icon">
                                </div>

                                <div class="col-md-8">
                                    <label class="form-label d-flex align-items-center"><strong>Título</strong><span class="badge bg-primary ms-2">TEXTO</span></label>
                                    <input type="text" name="features__feature_{{ $i }}_titulo" id="feature_{{ $i }}_titulo" class="form-control" value="{{ $title }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label d-flex align-items-center"><strong>Descripción</strong><span class="badge bg-primary ms-2">TEXTO</span></label>
                                    <textarea name="features__feature_{{ $i }}_descripcion" id="feature_{{ $i }}_descripcion" class="form-control" rows="2">{{ $desc }}</textarea>
                                </div>

                                <div class="col-md-12"><hr></div>
                            @endfor

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
            <form action="{{ route('paginas.update.about') }}" method="POST" enctype="multipart/form-data" class="section-form" data-section="seccion-about" style="display:none;">
                @csrf
                @method('PUT')

                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="about">

                @php
                    $aboutItems = $contenidos['about'] ?? collect();
                    $av = function (string $key, $default = null) use ($aboutItems) {
                        return optional($aboutItems->firstWhere('clave', $key))->valor ?? $default;
                    };
                    $posterVal = $av('poster', 'images/banner3.jpeg');
                    $videoVal  = $av('video_url', 'video/video-promocional.webm');
                @endphp

                <div class="card mb-4" id="seccion-about">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">📖 About / Video</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Título -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Título</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="about__titulo" class="form-control"
                                    value="{{ old('about__titulo', $av('titulo','¿Qué es el Move Challenge?')) }}">
                            </div>

                            <!-- Descripción 1 -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Descripción 1</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="about__descripcion_1" class="form-control" rows="3">{{ old('about__descripcion_1', $av('descripcion_1')) }}</textarea>
                            </div>

                            <!-- Descripción 2 -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Descripción 2</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="about__descripcion_2" class="form-control" rows="3">{{ old('about__descripcion_2', $av('descripcion_2')) }}</textarea>
                            </div>

                            <div class="col-md-12"><hr></div>

                            <!-- Poster (imagen) -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Poster del video (imagen)</strong>
                                    <span class="badge bg-success ms-2">IMAGEN</span>
                                </label>
                                <small class="text-muted d-block mb-2">Se usa en el atributo <code>poster</code> del &lt;video&gt;.</small>

                                <ul class="nav nav-tabs mb-3">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#about-poster-upload" type="button">📤 Subir</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#about-poster-url" type="button">🔗 URL</button>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="about-poster-upload">
                                        <input type="file" name="about__poster_file" class="form-control mb-2" accept="image/*">
                                        <small class="text-muted">Formatos: JPG, PNG, WEBP, SVG (máx ~2MB).</small>
                                    </div>
                                    <div class="tab-pane fade" id="about-poster-url">
                                        <input type="text" name="about__poster_url" class="form-control" value="{{ old('about__poster_url', $posterVal) }}" placeholder="images/mi-poster.jpg">
                                        <small class="text-muted">Ruta relativa (recomendada) o URL completa.</small>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label"><strong>Vista previa actual:</strong></label>
                                    <div class="border rounded p-2 bg-light">
                                        <img src="{{ asset($posterVal) }}" alt="Poster actual" class="img-thumbnail" style="max-height:200px;max-width:100%;"
                                            onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22120%22%3E%3Crect fill=%22%23eee%22 width=%22200%22 height=%22120%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 fill=%22%23999%22 text-anchor=%22middle%22 dy=%22.3em%22%3ESin%20poster%3C/text%3E%3C/svg%3E'">
                                    </div>
                                    <small class="text-muted">Ruta actual: <code>{{ $posterVal }}</code></small>
                                </div>
                            </div>

                            <div class="col-md-12"><hr></div>

                            <!-- Video (SOLO WEBM) -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Video (solo .webm)</strong>
                                    <span class="badge bg-info ms-2">VIDEO</span>
                                </label>

                                <ul class="nav nav-tabs mb-3">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#about-video-upload" type="button">📤 Subir .webm</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#about-video-url" type="button">🔗 URL .webm</button>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="about-video-upload">
                                        <input type="file" name="about__video_file" class="form-control mb-2" accept="video/webm">
                                        <small class="text-muted">Solo archivos .webm (tamaño recomendado &lt; 50MB).</small>
                                    </div>
                                    <div class="tab-pane fade" id="about-video-url">
                                        <input type="text" name="about__video_url" class="form-control" value="{{ old('about__video_url', $videoVal) }}" placeholder="video/mi-video.webm">
                                        <small class="text-muted">Ruta relativa o URL directa a un .webm.</small>
                                    </div>
                                </div>

                                <small class="text-muted d-block mt-1">Actual: <code>{{ $videoVal ?: '—' }}</code></small>
                            </div>

                            <div class="col-md-12"><hr></div>

                            <!-- Botón -->
                            <div class="col-md-6">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Texto del botón</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="about__boton_texto" class="form-control"
                                    value="{{ old('about__boton_texto', $av('boton_texto','Conoce más detalles')) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label d-flex align-items-center">
                                    <strong>URL del botón</strong>
                                    <span class="badge bg-info ms-2">URL</span>
                                </label>
                                <input type="text" name="about__boton_url" class="form-control"
                                    value="{{ old('about__boton_url', $av('boton_url','https://wa.link/nq2ezt')) }}"
                                    placeholder="https://...">
                            </div>

                            <div class="col-md-12"><hr></div>

                            <div class="col-md-12">
                                <h5 class="text-primary mb-2">✅ Beneficios (bullets)</h5>
                            </div>

                            @php
                                $defaults = [
                                    1 => ['fas fa-check', 'Guía de movilidad y estiramientos diarios'],
                                    2 => ['fas fa-check', 'Seguimiento personalizado de tu progreso'],
                                    3 => ['fas fa-check', 'Premios para los mejores resultados'],
                                ];
                            @endphp

                            @for ($i = 1; $i <= 3; $i++)
                                @php
                                    [$defIcon, $defText] = $defaults[$i];
                                    $icon = old("about__feature_{$i}_icono", $av("feature_{$i}_icono", $defIcon));
                                    $text = old("about__feature_{$i}_texto", $av("feature_{$i}_texto", $defText));
                                @endphp

                                <div class="col-md-12">
                                    <label class="form-label d-flex align-items-center">
                                        <strong>Bullet {{ $i }}</strong>
                                        <span class="badge bg-primary ms-2">TEXTO</span>
                                    </label>
                                </div>

                                <div class="col-md-4">
                                    <small class="text-muted d-block mb-2">Ícono (Font Awesome)</small>
                                    <input type="text" class="form-control"
                                        name="about__feature_{{ $i }}_icono"
                                        value="{{ $icon }}"
                                        placeholder="fas fa-check">
                                </div>

                                <div class="col-md-8">
                                    <small class="text-muted d-block mb-2">Texto</small>
                                    <input type="text" class="form-control"
                                        name="about__feature_{{ $i }}_texto"
                                        value="{{ $text }}"
                                        placeholder="Texto del beneficio">
                                </div>

                                <div class="col-md-12"><hr></div>
                            @endfor
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">
                                💾 Guardar Sección About
                            </button>
                        </div>
                    </div>
                </div>
            </form>


            <!-- ========================================= -->
            <!-- FORMULARIO 4: GALLERY (Placeholder) -->
            <!-- ========================================= -->
            <form action="{{ route('paginas.update.gallery') }}" method="POST" enctype="multipart/form-data" class="section-form" data-section="seccion-gallery" style="display:none;">
                @csrf
                @method('PUT')

                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="gallery">

                @php
                    $g = $contenidos['gallery'] ?? collect();
                    $gv = function (string $key, $default = null) use ($g) {
                        return optional($g->firstWhere('clave', $key))->valor ?? $default;
                    };
                @endphp

                <div class="card mb-4" id="seccion-gallery">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">🖼️ Galería</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">

                            <!-- Título -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Título de Sección</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="gallery__titulo_seccion" class="form-control"
                                    value="{{ old('gallery__titulo_seccion', $gv('titulo_seccion','Momentos del Move Challenge')) }}">
                            </div>

                            <!-- Subtítulo -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Subtítulo de Sección</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="gallery__subtitulo_seccion" rows="2" class="form-control">{{ old('gallery__subtitulo_seccion', $gv('subtitulo_seccion','Historias reales de transformación y superación personal')) }}</textarea>
                            </div>

                            <div class="col-md-12"><hr></div>

                            @for ($i = 1; $i <= 4; $i++)
                                @php
                                    $curr = $gv("imagen_{$i}", "images/move-{$i}.png");
                                    $currAlt = $gv("imagen_{$i}_alt", [
                                        1=>'Entrenamientos MOVE',
                                        2=>'Comunidad en acción',
                                        3=>'Hábitos y nutrición',
                                        4=>'Rutinas en casa',
                                    ][$i]);
                                @endphp

                                <div class="col-md-12">
                                    <h5 class="text-primary">📷 Imagen {{ $i }}</h5>
                                </div>

                                <div class="col-md-12">
                                    <ul class="nav nav-tabs mb-3">
                                        <li class="nav-item">
                                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#gal-{{ $i }}-upload" type="button">📤 Subir</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#gal-{{ $i }}-url" type="button">🔗 URL</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="gal-{{ $i }}-upload">
                                            <input type="file" name="gallery__imagen_{{ $i }}_file" class="form-control mb-2" accept="image/*">
                                            <small class="text-muted">JPG, PNG, WEBP, SVG (máx ~2–4MB).</small>
                                        </div>
                                        <div class="tab-pane fade" id="gal-{{ $i }}-url">
                                            <input type="text" name="gallery__imagen_{{ $i }}" class="form-control" value="{{ old("gallery__imagen_{$i}", $curr) }}" placeholder="images/mi-foto-{{ $i }}.jpg">
                                            <small class="text-muted">Ruta relativa recomendada.</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- ALT (opcional) -->
                                <div class="col-md-12">
                                    <label class="form-label d-flex align-items-center">
                                        <strong>Texto ALT {{ $i }}</strong>
                                        <span class="badge bg-primary ms-2">TEXTO</span>
                                    </label>
                                    <input type="text" name="gallery__imagen_{{ $i }}_alt" class="form-control"
                                        value="{{ old("gallery__imagen_{$i}_alt", $currAlt) }}" placeholder="Descripción de la imagen">
                                </div>

                                <!-- Preview -->
                                <div class="col-md-12">
                                    <div class="border rounded p-2 bg-light mt-2">
                                        <img src="{{ asset($curr) }}" alt="Preview" class="img-thumbnail" style="max-height: 200px; max-width: 100%;"
                                            onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22120%22%3E%3Crect fill=%22%23eee%22 width=%22200%22 height=%22120%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 fill=%22%23999%22 text-anchor=%22middle%22 dy=%22.3em%22%3ESin%20imagen%3C/text%3E%3C/svg%3E'">
                                    </div>
                                    <small class="text-muted">Ruta actual: <code>{{ $curr }}</code></small>
                                </div>

                                <div class="col-md-12"><hr></div>
                            @endfor

                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">💾 Guardar Sección Galería</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- ========================================= -->
            <!-- FORMULARIO 5: QUOTE (Placeholder) -->
            <!-- ========================================= -->
            <form action="{{ route('paginas.update.quote') }}" method="POST" class="section-form" data-section="seccion-quote" style="display:none;">
                @csrf
                @method('PUT')

                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="quote">

                @php
                    $quote = $contenidos['quote'] ?? collect();
                    $qv = function (string $key, $default = null) use ($quote) {
                        return optional($quote->firstWhere('clave', $key))->valor ?? $default;
                    };
                @endphp

                <div class="card mb-4" id="seccion-quote">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">💭 Frase Inspiracional</h4>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Texto de la frase -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Texto de la frase</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="quote__texto" rows="3" class="form-control">{{ old('quote__texto', $qv('texto', 'El movimiento es medicina. Cuando mueves tu cuerpo, transformas tu mente y elevas tu espíritu.')) }}</textarea>
                            </div>

                            <!-- Autor (opcional) -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Autor</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="quote__autor" class="form-control"
                                    value="{{ old('quote__autor', $qv('autor', 'Anabelle Ibalu')) }}"
                                    placeholder="Nombre del autor (opcional)">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">💾 Guardar Frase</button>
                        </div>
                    </div>
                </div>
            </form>


            <!-- ========================================= -->
            <!-- FORMULARIO 6: PRICING (Placeholder) -->
            <!-- ========================================= -->
            <form action="{{ route('paginas.update.pricing') }}" method="POST" class="section-form" data-section="seccion-pricing" style="display:none;">
                @csrf
                @method('PUT')

                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="pricing">

                @php
                    $pricing = $contenidos['pricing'] ?? collect();
                    $pv = fn($k,$d=null)=>optional($pricing->firstWhere('clave',$k))->valor ?? $d;
                @endphp

                <div class="card mb-4" id="seccion-pricing">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">💰 Precios</h4>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Título -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Título de Sección</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="pricing__titulo_seccion" class="form-control"
                                    value="{{ old('pricing__titulo_seccion', $pv('titulo_seccion','Elige tu plan de transformación')) }}">
                            </div>

                            <!-- Subtítulo -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Subtítulo de Sección</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="pricing__subtitulo_seccion" rows="2" class="form-control">{{ old('pricing__subtitulo_seccion', $pv('subtitulo_seccion','Inversión en tu bienestar con resultados garantizados')) }}</textarea>
                            </div>

                            <div class="col-md-12"><hr></div>

                            @for ($i = 1; $i <= 3; $i++)
                                @php
                                    $nombre  = old("pricing__plan_{$i}_nombre",  $pv("plan_{$i}_nombre"));
                                    $precio  = old("pricing__plan_{$i}_precio",  $pv("plan_{$i}_precio"));
                                    $periodo = old("pricing__plan_{$i}_periodo", $pv("plan_{$i}_periodo"));
                                    $ctaTxt  = old("pricing__plan_{$i}_cta_texto", $pv("plan_{$i}_cta_texto"));
                                    $ctaUrl  = old("pricing__plan_{$i}_cta_url",   $pv("plan_{$i}_cta_url", '#contact'));
                                    $featured= old("pricing__plan_{$i}_featured",  $pv("plan_{$i}_featured",'0')) == '1';
                                @endphp

                                <div class="col-md-12">
                                    <h5 class="text-primary">📦 Plan {{ $i }}</h5>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label"><strong>Nombre</strong></label>
                                    <input type="text" class="form-control" name="pricing__plan_{{ $i }}_nombre" value="{{ $nombre }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"><strong>Precio</strong></label>
                                    <input type="text" class="form-control" name="pricing__plan_{{ $i }}_precio" value="{{ $precio }}" placeholder="$99">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"><strong>Periodo</strong></label>
                                    <input type="text" class="form-control" name="pricing__plan_{{ $i }}_periodo" value="{{ $periodo }}" placeholder="Plan de 30 días">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label"><strong>CTA Texto</strong></label>
                                    <input type="text" class="form-control" name="pricing__plan_{{ $i }}_cta_texto" value="{{ $ctaTxt }}" placeholder="Comprar ahora">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><strong>CTA URL</strong></label>
                                    <input type="text" class="form-control" name="pricing__plan_{{ $i }}_cta_url" value="{{ $ctaUrl }}" placeholder="#contact">
                                </div>

                                <div class="col-md-12">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="plan_{{ $i }}_featured" name="pricing__plan_{{ $i }}_featured" value="1" {{ $featured ? 'checked' : '' }}>
                                        <label class="form-check-label" for="plan_{{ $i }}_featured">Destacar este plan</label>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label class="form-label d-flex align-items-center">
                                        <strong>Características (máx 7)</strong>
                                        <span class="badge bg-primary ms-2">TEXTO</span>
                                    </label>
                                </div>

                                @for ($j = 1; $j <= 7; $j++)
                                    @php $featVal = old("pricing__plan_{$i}_feature_{$j}", $pv("plan_{$i}_feature_{$j}")); @endphp
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-2"
                                            name="pricing__plan_{{ $i }}_feature_{{ $j }}"
                                            value="{{ $featVal }}" placeholder="Característica {{ $j }}">
                                    </div>
                                @endfor

                                <div class="col-md-12"><hr></div>
                            @endfor
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">💾 Guardar Precios</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- ========================================= -->
            <!-- FORMULARIO 7: CONTACT (Placeholder) -->
            <!-- ========================================= -->
            <form action="{{ route('paginas.update.contact') }}" method="POST" class="section-form" data-section="seccion-contact" style="display:none;">
                @csrf
                @method('PUT')

                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="contact">

                @php
                    $contact = $contenidos['contact'] ?? collect();
                    $cv = fn($k,$d=null)=>optional($contact->firstWhere('clave',$k))->valor ?? $d;
                @endphp

                <div class="card mb-4" id="seccion-contact">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">📧 Contacto</h4>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Título</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="contact__titulo" class="form-control"
                                    value="{{ old('contact__titulo', $cv('titulo','¿Lista/o para empezar tu transformación?')) }}">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Descripción</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="contact__descripcion" rows="3" class="form-control">{{ old('contact__descripcion', $cv('descripcion','Escríbeme y te comparto todos los detalles del programa, próximas fechas de inicio y cómo puedes reservar tu cupo.')) }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Email</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="email" name="contact__email" class="form-control"
                                    value="{{ old('contact__email', $cv('email','hola@anabelleibalu.com')) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Instagram</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="contact__instagram" class="form-control"
                                    value="{{ old('contact__instagram', $cv('instagram','@anabelleibalu')) }}" placeholder="@usuario">
                            </div>

                            <div class="col-md-8">
                                <label class="form-label d-flex align-items-center">
                                    <strong>WhatsApp URL</strong>
                                    <span class="badge bg-info ms-2">URL</span>
                                </label>
                                <input type="text" name="contact__whatsapp_url" class="form-control"
                                    value="{{ old('contact__whatsapp_url', $cv('whatsapp_url','https://wa.link/nq2ezt')) }}" placeholder="https://wa.me/xxxxxxxxxxx o wa.link/...">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Texto del botón</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="contact__whatsapp_texto" class="form-control"
                                    value="{{ old('contact__whatsapp_texto', $cv('whatsapp_texto','Habla conmigo por WhatsApp')) }}">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">💾 Guardar Contacto</button>
                        </div>
                    </div>
                </div>
            </form>


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
        font-weight: 600;
        background-color: #0d6efd
    }

    .card {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .25);
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
                    targetForm.scrollIntoView({
                        behavior: 'smooth'
                        , block: 'start'
                    });
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
