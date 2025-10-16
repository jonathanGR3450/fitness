@extends('layouts.admin')

@section('title', 'Editar Página - Sobre mí')

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
                    <a href="#seccion-about-hero" class="list-group-item list-group-item-action active" data-section="about-hero">
                        🙋‍♀️ About Hero
                    </a>
                    <a href="#seccion-story" class="list-group-item list-group-item-action" data-section="story">
                        📖 Mi historia
                    </a>
                    <a href="#seccion-values" class="list-group-item list-group-item-action" data-section="values">
                        🧭 Valores
                    </a>
                    <a href="#seccion-credentials" class="list-group-item list-group-item-action" data-section="credentials">
                        🎓 Certificaciones
                    </a>
                    <a href="#seccion-cta" class="list-group-item list-group-item-action" data-section="cta">
                        🚀 CTA final
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
                            <h2 class="mb-1">✏️ Editar “Sobre mí”</h2>
                        </div>
                        <div>
                            <a href="{{ route('about') }}" class="btn btn-outline-primary" target="_blank">
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
                        <button type="button" class="btn btn-outline-primary active" data-target="seccion-about-hero">🙋‍♀️ About Hero</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-story">📖 Historia</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-values">🧭 Valores</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-credentials">🎓 Certificaciones</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-cta">🚀 CTA</button>
                    </div>
                </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ✅ {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @php
            // $contenidos viene agrupado por 'seccion' desde el controlador (igual que en Inicio)
            // Helpers rápidos:
            $getSec = function($sec) use ($contenidos) { return $contenidos[$sec] ?? collect(); };
            $cv = function($sec, $key, $default = null) use ($getSec) {
            return optional($getSec($sec)->firstWhere('clave', $key))->valor ?? $default;
            };

            $idioma = $idioma ?? 'es';
            $pagina = $pagina ?? 'sobre-mi'; // clave de página para esta vista
            @endphp

            <!-- ========================================= -->
            <!-- FORM 1: ABOUT HERO -->
            <!-- ========================================= -->
            @php
            $sec = 'about_hero';
            $aboutHero = $contenidos[$sec] ?? collect();

            $v = fn($key,$def=null)=> optional($aboutHero->firstWhere('clave',$key))->valor ?? $def;
            @endphp

            <form action="{{ route('paginas.sobremi.update.hero') }}" method="POST" enctype="multipart/form-data" class="section-form" data-section="seccion-about-hero">
                @csrf
                @method('PUT')
                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="about_hero">

                <div class="card mb-4" id="seccion-about-hero">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">🙋‍♀️ About Hero</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Título (HTML permitido) -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Título (permite HTML)</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="about_hero__titulo" class="form-control" value="{{ $v('titulo','Hola, soy <span class=highlight>Anabelle Ibalu</span>') }}">
                            </div>

                            <!-- Subtítulo -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Subtítulo</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="about_hero__subtitulo" class="form-control" value="{{ $v('subtitulo','Coach de bienestar apasionada por el movimiento consciente') }}">
                            </div>

                            <!-- Imagen: subida/URL -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Imagen de perfil</strong>
                                    <span class="badge bg-success ms-2">IMAGEN</span>
                                </label>

                                <ul class="nav nav-tabs mb-3">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#abouthero-upload" type="button">📤 Subir</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#abouthero-url" type="button">🔗 URL</button>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="abouthero-upload">
                                        <input type="file" name="about_hero__imagen_file" class="form-control mb-2" accept="image/*">
                                        <small class="text-muted">JPG/PNG/WEBP/SVG máx. 2MB</small>
                                    </div>
                                    <div class="tab-pane fade" id="abouthero-url">
                                        <input type="text" name="about_hero__imagen_url" class="form-control" value="{{ $v('imagen','images/anabelle-profile.jpg') }}" placeholder="images/anabelle-profile.jpg">
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label"><strong>Vista previa:</strong></label>
                                    <div class="border rounded p-2 bg-light">
                                        <img src="{{ asset($v('imagen','images/anabelle-profile.jpg')) }}" class="img-thumbnail" style="max-height:200px;max-width:100%;" onerror="this.src='{{ asset('images/sinfondo.png') }}'">
                                    </div>
                                    <small class="text-muted">Ruta actual: <code>{{ $v('imagen','images/anabelle-profile.jpg') }}</code></small>
                                </div>
                            </div>

                            <!-- Descripción -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Descripción corta</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="about_hero__descripcion" rows="3" class="form-control">{{ $v('descripcion','Mi misión es ayudarte a descubrir tu mejor versión a través de hábitos sostenibles. Creo que el cambio real viene de adentro hacia afuera.') }}</textarea>
                            </div>

                            <!-- Stats -->
                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <label class="form-label"><strong>Stat 1 - Número</strong></label>
                                <input type="text" name="about_hero__stat_1_num" class="form-control" value="{{ $v('stat_1_num','500+') }}">
                                <label class="form-label mt-2"><strong>Stat 1 - Label</strong></label>
                                <input type="text" name="about_hero__stat_1_lbl" class="form-control" value="{{ $v('stat_1_lbl','Vidas transformadas') }}">
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <label class="form-label"><strong>Stat 2 - Número</strong></label>
                                <input type="text" name="about_hero__stat_2_num" class="form-control" value="{{ $v('stat_2_num','5+') }}">
                                <label class="form-label mt-2"><strong>Stat 2 - Label</strong></label>
                                <input type="text" name="about_hero__stat_2_lbl" class="form-control" value="{{ $v('stat_2_lbl','Años de experiencia') }}">
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <label class="form-label"><strong>Stat 3 - Número</strong></label>
                                <input type="text" name="about_hero__stat_3_num" class="form-control" value="{{ $v('stat_3_num','30+') }}">
                                <label class="form-label mt-2"><strong>Stat 3 - Label</strong></label>
                                <input type="text" name="about_hero__stat_3_lbl" class="form-control" value="{{ $v('stat_3_lbl','Challenges realizados') }}">
                            </div>

                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">💾 Guardar About Hero</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- ========================================= -->
            <!-- FORM 2: STORY (placeholder) -->
            <!-- ========================================= -->
            {{-- FORMULARIO: STORY (SOBRE-MI) --}}
            @php
                $sec = 'story';
                $story = $contenidos[$sec] ?? collect();
                // $v = fn($key,$def='') => optional($story->get($key))->valor ?? $def;

                $v = function (string $key, $default = null) use ($story) {
                    return optional($story->firstWhere('clave', $key))->valor ?? $default;
                };

            @endphp

            <form action="{{ route('paginas.sobremi.update.story') }}" method="POST"
                class="section-form" id="seccion-story" data-section="seccion-story" style="display:none;">
                @csrf
                @method('PUT')

                <input type="hidden" name="idioma" value="{{ $idioma ?? 'es' }}">
                <input type="hidden" name="pagina" value="sobre-mi">
                <input type="hidden" name="seccion" value="story">

                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">📖 Mi historia</h4>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Título -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Título</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="story__titulo" class="form-control"
                                    value="{{ $v('titulo','Mi historia') }}" placeholder="Mi historia">
                            </div>

                            <!-- Párrafo 1 -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Párrafo 1</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="story__parrafo_1" class="form-control" rows="3" placeholder="Primer párrafo">{{ $v('parrafo_1') }}</textarea>
                            </div>

                            <!-- Párrafo 2 -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Párrafo 2</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="story__parrafo_2" class="form-control" rows="3" placeholder="Segundo párrafo">{{ $v('parrafo_2') }}</textarea>
                            </div>

                            <!-- Párrafo 3 -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Párrafo 3</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="story__parrafo_3" class="form-control" rows="3" placeholder="Tercer párrafo">{{ $v('parrafo_3') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">
                                💾 Guardar Sección “Mi historia”
                            </button>
                        </div>
                    </div>
                </div>
            </form>


            <!-- ========================================= -->
            <!-- FORM 3: VALUES (placeholder) -->
            <!-- ========================================= -->
            @php
                $sec = 'values';
                $valuesSec = $contenidos[$sec] ?? collect();
                $v = function (string $key, $default = null) use ($valuesSec) {
                    return optional($valuesSec->firstWhere('clave', $key))->valor ?? $default;
                };
            @endphp

            <form action="{{ route('paginas.sobremi.update.values') }}" method="POST"
                class="section-form" id="seccion-values" data-section="seccion-values" style="display:none;">
                @csrf
                @method('PUT')

                <input type="hidden" name="idioma" value="{{ $idioma ?? 'es' }}">
                <input type="hidden" name="pagina" value="sobre-mi">
                <input type="hidden" name="seccion" value="values">

                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">🧭 Mis valores</h4>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Título de sección -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Título de Sección</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="values__titulo_seccion" class="form-control"
                                    value="{{ $v('titulo_seccion','Mis valores') }}" placeholder="Mis valores">
                            </div>

                            <!-- Subtítulo de sección -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Subtítulo de Sección</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="values__subtitulo_seccion" class="form-control" rows="2"
                                        placeholder="Estos son los principios que guían mi trabajo y mi filosofía de vida">{{ $v('subtitulo_seccion','Estos son los principios que guían mi trabajo y mi filosofía de vida') }}</textarea>
                            </div>

                            <div class="col-12"><hr></div>

                            @for($i=1; $i<=4; $i++)
                                <div class="col-12">
                                    <h5 class="text-primary">🧩 Valor {{ $i }}</h5>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label d-flex align-items-center">
                                        <strong>Ícono</strong>
                                        <span class="badge bg-primary ms-2">TEXTO</span>
                                    </label>
                                    <small class="text-muted d-block mb-2">Clase Font Awesome (ej: <code>fas fa-heart</code>)</small>
                                    <input type="text" name="values__value_{{ $i }}_icono" class="form-control"
                                        value="{{ $v("value_{$i}_icono", match($i){1=>'fas fa-heart',2=>'fas fa-balance-scale',3=>'fas fa-users',4=>'fas fa-seedling'}) }}">
                                </div>

                                <div class="col-md-8">
                                    <label class="form-label d-flex align-items-center">
                                        <strong>Título</strong>
                                        <span class="badge bg-primary ms-2">TEXTO</span>
                                    </label>
                                    <input type="text" name="values__value_{{ $i }}_titulo" class="form-control"
                                        value="{{ $v("value_{$i}_titulo", match($i){1=>'Autenticidad',2=>'Equilibrio',3=>'Comunidad',4=>'Crecimiento'}) }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label d-flex align-items-center">
                                        <strong>Descripción</strong>
                                        <span class="badge bg-primary ms-2">TEXTO</span>
                                    </label>
                                    <textarea name="values__value_{{ $i }}_descripcion" class="form-control" rows="2">{{ $v("value_{$i}_descripcion", match($i){
                                        1=>'Creo en ser real y transparente. No existen los cuerpos perfectos, existen cuerpos sanos y felices.',
                                        2=>'El bienestar no se trata de extremos. Se trata de encontrar tu punto medio sostenible.',
                                        3=>'Juntos somos más fuertes. Creo en el poder del apoyo mutuo y la motivación colectiva.',
                                        4=>'Cada día es una oportunidad para ser 1% mejor. El progreso, no la perfección.',
                                    }) }}</textarea>
                                </div>

                                @if($i<4)
                                    <div class="col-12"><hr></div>
                                @endif
                            @endfor
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">
                                💾 Guardar “Mis valores”
                            </button>
                        </div>
                    </div>
                </div>
            </form>


            <!-- ========================================= -->
            <!-- FORM 4: CREDENTIALS (placeholder) -->
            <!-- ========================================= -->
            @php
                $sec = 'credentials';
                $credSec = $contenidos[$sec] ?? collect();
                $v = function (string $key, $default = null) use ($credSec) {
                    return optional($credSec->firstWhere('clave',$key))->valor ?? $default;
                };
            @endphp

            <form action="{{ route('paginas.sobremi.update.credentials') }}" method="POST"
                class="section-form" id="seccion-credentials" data-section="seccion-credentials" style="display:none;">
                @csrf
                @method('PUT')

                <input type="hidden" name="idioma" value="{{ $idioma ?? 'es' }}">
                <input type="hidden" name="pagina" value="sobre-mi">
                <input type="hidden" name="seccion" value="credentials">

                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">🎓 Certificaciones y experiencia</h4>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Título -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Título de Sección</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="credentials__titulo_seccion" class="form-control"
                                    value="{{ $v('titulo_seccion','Certificaciones y experiencia') }}">
                            </div>

                            <!-- Subtítulo -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Subtítulo de Sección</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="credentials__subtitulo_seccion" class="form-control" rows="2">{{ $v('subtitulo_seccion','Mi formación continua me permite ofrecerte las mejores herramientas') }}</textarea>
                            </div>

                            <div class="col-12"><hr></div>

                            @for($i=1; $i<=4; $i++)
                                <div class="col-12">
                                    <h5 class="text-primary">🏅 Credencial {{ $i }}</h5>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label d-flex align-items-center">
                                        <strong>Ícono</strong>
                                        <span class="badge bg-primary ms-2">TEXTO</span>
                                    </label>
                                    <small class="text-muted d-block mb-2">Clase Font Awesome (ej.: <code>fas fa-certificate</code>)</small>
                                    <input type="text" name="credentials__item_{{ $i }}_icono" class="form-control"
                                        value="{{ $v("item_{$i}_icono", match($i){1=>'fas fa-certificate',2=>'fas fa-apple-alt',3=>'fas fa-spa',4=>'fas fa-dumbbell'}) }}">
                                </div>

                                <div class="col-md-8">
                                    <label class="form-label d-flex align-items-center">
                                        <strong>Título</strong>
                                        <span class="badge bg-primary ms-2">TEXTO</span>
                                    </label>
                                    <input type="text" name="credentials__item_{{ $i }}_titulo" class="form-control"
                                        value="{{ $v("item_{$i}_titulo", match($i){
                                            1=>'Entrenadora Personal Certificada',
                                            2=>'Certificación en Nutrición Deportiva',
                                            3=>'Instructora de Yoga & Mindfulness',
                                            4=>'Especialización en Entrenamiento Funcional',
                                        }) }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label d-flex align-items-center">
                                        <strong>Descripción</strong>
                                        <span class="badge bg-primary ms-2">TEXTO</span>
                                    </label>
                                    <textarea name="credentials__item_{{ $i }}_descripcion" class="form-control" rows="2">{{ $v("item_{$i}_descripcion", match($i){
                                        1=>'ISSA - International Sports Sciences Association',
                                        2=>'Especializada en planes alimenticios personalizados',
                                        3=>'200h Yoga Alliance RYT',
                                        4=>'Movimientos naturales y eficientes',
                                    }) }}</textarea>
                                </div>

                                @if($i<4)
                                    <div class="col-12"><hr></div>
                                @endif
                            @endfor
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">💾 Guardar certificaciones</button>
                        </div>
                    </div>
                </div>
            </form>


            <!-- ========================================= -->
            <!-- FORM 5: CTA (placeholder) -->
            <!-- ========================================= -->
            @php
                $sec = 'cta_about';
                $ctaSec = $contenidos[$sec] ?? collect();
                $v = function (string $key, $default = null) use ($ctaSec) {
                    return optional($ctaSec->firstWhere('clave',$key))->valor ?? $default;
                };
            @endphp

            <form action="{{ route('paginas.sobremi.update.cta') }}" method="POST"
                class="section-form" id="seccion-cta" data-section="seccion-cta" style="display:none;">
                @csrf
                @method('PUT')

                <input type="hidden" name="idioma" value="{{ $idioma ?? 'es' }}">
                <input type="hidden" name="pagina" value="sobre-mi">
                <input type="hidden" name="seccion" value="cta_about">

                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">📣 CTA About</h4>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Título -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Título</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="cta_about__titulo" class="form-control"
                                    value="{{ $v('titulo','¿Lista/o para comenzar tu transformación?') }}">
                            </div>

                            <!-- Subtítulo -->
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Subtítulo</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <textarea name="cta_about__subtitulo" rows="2" class="form-control">{{ $v('subtitulo','Únete al próximo Move Challenge y descubre todo lo que puedes lograr') }}</textarea>
                            </div>

                            <!-- Botón: texto y URL -->
                            <div class="col-md-6">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Texto del botón</strong>
                                    <span class="badge bg-primary ms-2">TEXTO</span>
                                </label>
                                <input type="text" name="cta_about__boton_texto" class="form-control"
                                    value="{{ $v('boton_texto','Hablemos') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label d-flex align-items-center">
                                    <strong>URL del botón</strong>
                                    <span class="badge bg-info ms-2">URL</span>
                                </label>
                                <input type="text" name="cta_about__boton_url" class="form-control"
                                    value="{{ $v('boton_url', Route::has('contact') ? route('contact') : '#contacto') }}"
                                    placeholder="https://... o #ancla">
                                <small class="text-muted d-block">Puedes usar una URL absoluta o un ancla (#contacto).</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">💾 Guardar CTA About</button>
                        </div>
                    </div>
                </div>
            </form>


            <!-- Volver -->
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver al Dashboard</a>
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
        showSection('seccion-about-hero');
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
