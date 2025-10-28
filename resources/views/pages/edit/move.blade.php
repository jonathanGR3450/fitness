@extends('layouts.admin')

@section('title', 'Editar Página - Move')

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
                    <a href="#seccion-move-hero" class="list-group-item list-group-item-action active" data-section="move-hero">🔥 Move Hero</a>
                    <a href="#seccion-about-move" class="list-group-item list-group-item-action" data-section="about-move">🎥 About Move</a>
                    <a href="#seccion-includes" class="list-group-item list-group-item-action" data-section="includes">⭐ ¿Qué incluye?</a>
                    <a href="#seccion-how-works" class="list-group-item list-group-item-action" data-section="how-works">⚙️ Cómo Funciona</a>
                    <a href="#seccion-benefits" class="list-group-item list-group-item-action" data-section="benefits">🏆 Beneficios & Testimonial</a>
                    <a href="#seccion-cta-move" class="list-group-item list-group-item-action" data-section="cta-move">🚀 CTA final</a>
                </div>
            </div>
        </div>

        <!-- Formularios -->
        <div class="col-md-9">
            <!-- Header -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-1">✏️ Editar “Move Challenge”</h2>
                        </div>
                        <div>
                            <a href="{{ route('move') }}" class="btn btn-outline-primary" target="_blank">
                                👁️ Ver Página
                            </a>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver al Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="btn-group w-100 section-tabs" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-target="seccion-move-hero">🔥 Move Hero</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-about-move">🎥 About Move</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-includes">⭐ ¿Qué incluye?</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-how-works">⚙️ Cómo Funciona</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-benefits">🏆 Beneficios</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-cta-move">🚀 CTA</button>
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
                $idioma = $idioma ?? 'es';
                $pagina = $pagina ?? 'move';

                $getSec = function($sec) use ($contenidos) { return $contenidos[$sec] ?? collect(); };
                $cv = function($sec, $key, $default = null) use ($getSec) {
                    return optional($getSec($sec)->firstWhere('clave', $key))->valor ?? $default;
                };
            @endphp

            <!-- ===================================================== -->
            <!-- FORM 1: MOVE HERO                                    -->
            <!-- ===================================================== -->
            @php $sec = 'move_hero'; @endphp
            <form action="{{ route('paginas.move.update.hero') }}" method="POST" class="section-form" data-section="seccion-move-hero">
                @csrf
                @method('PUT')
                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="move_hero">

                <div class="card mb-4" id="seccion-move-hero">
                    <div class="card-header bg-light"><h4 class="mb-0">🔥 Move Hero</h4></div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"><strong>Badge</strong> <span class="badge bg-primary ms-2">TEXTO</span></label>
                                <input type="text" name="move_hero__badge" class="form-control" value="{{ $cv($sec,'badge','30 Días de Transformación') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Ícono de badge (FA)</strong></label>
                                <input type="text" name="move_hero__badge_icono" class="form-control" value="{{ $cv($sec,'badge_icono','fas fa-fire') }}">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label"><strong>Título (línea 1)</strong></label>
                                <input type="text" name="move_hero__titulo_1" class="form-control" value="{{ $cv($sec,'titulo_1','Descubre el poder del') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><strong>Título (línea 2 destacada)</strong></label>
                                <input type="text" name="move_hero__titulo_2" class="form-control" value="{{ $cv($sec,'titulo_2','Move Challenge') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><strong>Descripción</strong></label>
                                <textarea name="move_hero__descripcion" rows="3" class="form-control">{{ $cv($sec,'descripcion','Un programa integral diseñado para transformar tu vida a través del movimiento consciente, nutrición balanceada y conexión interior.') }}</textarea>
                            </div>

                            <div class="col-12"><hr></div>
                            <div class="col-12"><h5 class="text-primary">📊 Stats inline</h5></div>

                            @for($i=1;$i<=3;$i++)
                                <div class="col-md-3">
                                    <label class="form-label"><strong>Stat {{ $i }} - Número</strong></label>
                                    <input type="text" name="move_hero__stat_{{ $i }}_num" class="form-control" value="{{ $cv($sec,"stat_{$i}_num", match($i){1=>'500+',2=>'30',3=>'100%'}) }}">
                                </div>
                                <div class="col-md-9">
                                    <label class="form-label"><strong>Stat {{ $i }} - Label</strong></label>
                                    <input type="text" name="move_hero__stat_{{ $i }}_lbl" class="form-control" value="{{ $cv($sec,"stat_{$i}_lbl", match($i){1=>'Participantes',2=>'Días de Reto',3=>'Resultados'}) }}">
                                </div>
                            @endfor

                            <div class="col-12"><hr></div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Botón - Texto</strong></label>
                                <input type="text" name="move_hero__boton_texto" class="form-control" value="{{ $cv($sec,'boton_texto','Conoce Más Detalles') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Botón - URL</strong></label>
                                <input type="text" name="move_hero__boton_url" class="form-control" value="{{ $cv($sec,'boton_url','#nosotros') }}">
                            </div>

                            <div class="col-12"><hr></div>
                            <div class="col-12"><h5 class="text-primary">🪧 Tarjeta Lateral (floating-info-card)</h5></div>

                            <div class="col-md-6">
                                <label class="form-label"><strong>Badge tarjeta</strong></label>
                                <input type="text" name="move_hero__card_badge" class="form-control" value="{{ $cv($sec,'card_badge','Próximo Reto') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Ícono badge tarjeta (FA)</strong></label>
                                <input type="text" name="move_hero__card_badge_icono" class="form-control" value="{{ $cv($sec,'card_badge_icono','fas fa-star') }}">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label"><strong>Título tarjeta</strong></label>
                                <input type="text" name="move_hero__card_titulo" class="form-control" value="{{ $cv($sec,'card_titulo','¿Lista/o para el cambio?') }}">
                            </div>

                            @for($i=1;$i<=4;$i++)
                                <div class="col-md-6">
                                    <label class="form-label"><strong>Ítem {{ $i }} (con check)</strong></label>
                                    <input type="text" name="move_hero__card_item_{{ $i }}" class="form-control" value="{{ $cv($sec,"card_item_{$i}", match($i){
                                        1=>'Rutinas personalizadas',
                                        2=>'Plan de nutrición completo',
                                        3=>'Comunidad de apoyo',
                                        4=>'Premios y reconocimientos'
                                    }) }}">
                                </div>
                            @endfor

                            <div class="col-md-6">
                                <label class="form-label"><strong>Botón tarjeta - Texto</strong></label>
                                <input type="text" name="move_hero__card_boton_texto" class="form-control" value="{{ $cv($sec,'card_boton_texto','Inscríbete Ahora') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Botón tarjeta - URL</strong></label>
                                <input type="text" name="move_hero__card_boton_url" class="form-control" value="{{ $cv($sec,'card_boton_url', route('contact')) }}">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label"><strong>Footer tarjeta</strong></label>
                                <input type="text" name="move_hero__card_footer" class="form-control" value="{{ $cv($sec,'card_footer','12 personas se inscribieron hoy') }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-lg">💾 Guardar Move Hero</button>
                    </div>
                </div>
            </form>

            <!-- ===================================================== -->
            <!-- FORM 2: ABOUT MOVE (video + textos + valores mini)    -->
            <!-- ===================================================== -->
            @php $sec = 'about_move'; @endphp
            <form action="{{ route('paginas.move.update.about') }}" method="POST" enctype="multipart/form-data"
                class="section-form" id="seccion-about-move" data-section="seccion-about-move" style="display:none;">
                @csrf
                @method('PUT')
                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="about_move">

                @php
                    $posterVal = $cv($sec,'video_poster','images/banner3.jpeg');
                    $videoVal  = $cv($sec,'video_webm','video/video-promocional.webm'); // SOLO webm
                @endphp

                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">🎥 About Move (solo WEBM)</h4>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">

                            {{-- Poster (IMAGEN) --}}
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Poster del video (imagen)</strong>
                                    <span class="badge bg-success ms-2">IMAGEN</span>
                                </label>
                                <small class="text-muted d-block mb-2">Atributo <code>poster</code> del &lt;video&gt;.</small>

                                <ul class="nav nav-tabs mb-3">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#am-poster-upload" type="button">📤 Subir</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#am-poster-url" type="button">🔗 URL</button>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="am-poster-upload">
                                        <input type="file" name="about_move__poster_file" class="form-control mb-2" accept="image/*">
                                        <small class="text-muted">JPG/PNG/WEBP/SVG (máx. ~2MB)</small>
                                    </div>
                                    <div class="tab-pane fade" id="am-poster-url">
                                        <input type="text" name="about_move__poster_url" class="form-control"
                                            value="{{ old('about_move__poster_url', $posterVal) }}" placeholder="images/banner3.jpeg">
                                        <small class="text-muted">Ruta relativa o URL absoluta.</small>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label"><strong>Vista previa actual:</strong></label>
                                    <div class="border rounded p-2 bg-light">
                                        <img src="{{ asset($posterVal) }}" alt="Poster actual" class="img-thumbnail"
                                            style="max-height:200px;max-width:100%;"
                                            onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22120%22%3E%3Crect fill=%22%23eee%22 width=%22200%22 height=%22120%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 fill=%22%23999%22 text-anchor=%22middle%22 dy=%22.3em%22%3ESin%20poster%3C/text%3E%3C/svg%3E'">
                                    </div>
                                    <small class="text-muted">Ruta actual: <code>{{ $posterVal }}</code></small>
                                </div>
                            </div>

                            <div class="col-12"><hr></div>

                            {{-- VIDEO (SOLO WEBM) --}}
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Video (solo .webm)</strong>
                                    <span class="badge bg-info ms-2">VIDEO</span>
                                </label>

                                <ul class="nav nav-tabs mb-3">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#am-video-upload" type="button">📤 Subir .webm</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#am-video-url" type="button">🔗 URL .webm</button>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="am-video-upload">
                                        <input type="file" name="about_move__video_file" class="form-control mb-2" accept="video/webm">
                                        <small class="text-muted">Solo .webm (recomendado &lt; 50MB).</small>
                                    </div>
                                    <div class="tab-pane fade" id="am-video-url">
                                        <input type="text" name="about_move__video_url" class="form-control"
                                            value="{{ old('about_move__video_url', $videoVal) }}" placeholder="video/video-promocional.webm">
                                        <small class="text-muted">Ruta relativa o URL directa a un .webm.</small>
                                    </div>
                                </div>

                                <small class="text-muted d-block mt-1">Actual: <code>{{ $videoVal ?: '—' }}</code></small>
                            </div>

                            <div class="col-12"><hr></div>

                            {{-- Textos/Badge --}}
                            <div class="col-md-4">
                                <label class="form-label"><strong>Badge sección</strong></label>
                                <input type="text" name="about_move__badge" class="form-control"
                                    value="{{ $cv($sec,'badge','Sobre Annabelle') }}">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label"><strong>Título</strong></label>
                                <input type="text" name="about_move__titulo" class="form-control"
                                    value="{{ $cv($sec,'titulo','Conoce a tu Coach') }}">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label"><strong>Párrafo 1</strong></label>
                                <textarea name="about_move__parrafo_1" rows="2" class="form-control">{{ $cv($sec,'parrafo_1','Annabelle Ibarra irradia luz y transforma espacios con su energía. Cree en los gestos sencillos como puentes de alegría y empatía.') }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><strong>Párrafo 2</strong></label>
                                <textarea name="about_move__parrafo_2" rows="2" class="form-control">{{ $cv($sec,'parrafo_2','Su filosofía se basa en la gratitud diaria, reflejada auténticamente en sus redes sociales, donde la coherencia entre lo digital y lo real es clave.') }}</textarea>
                            </div>

                            <div class="col-12"><hr></div>
                            <div class="col-12"><h5 class="text-primary">🧩 Valores pequeños (4)</h5></div>

                            @for($i=1;$i<=4;$i++)
                                <div class="col-md-6 col-lg-3">
                                    <label class="form-label"><strong>Ícono {{ $i }} (FA)</strong></label>
                                    <input type="text" name="about_move__value_{{ $i }}_icono" class="form-control"
                                        value="{{ $cv($sec,"value_{$i}_icono", match($i){1=>'fas fa-heart',2=>'fas fa-sun',3=>'fas fa-leaf',4=>'fas fa-hands-helping'}) }}">
                                    <label class="form-label mt-2"><strong>Título {{ $i }}</strong></label>
                                    <input type="text" name="about_move__value_{{ $i }}_titulo" class="form-control"
                                        value="{{ $cv($sec,"value_{$i}_titulo", match($i){1=>'Gratitud Diaria',2=>'Energía Positiva',3=>'Vida Consciente',4=>'Empatía'}) }}">
                                </div>
                            @endfor

                        </div>
                    </div>

                    <div class="card-footer bg-light d-flex justify-content-end">
                        <button class="btn btn-primary btn-lg">💾 Guardar About Move</button>
                    </div>
                </div>
            </form>


            <!-- ===================================================== -->
            <!-- FORM 3: INCLUDES                                     -->
            <!-- ===================================================== -->
            @php $sec = 'includes'; @endphp
            <form action="{{ route('paginas.move.update.includes') }}" method="POST" class="section-form" id="seccion-includes" data-section="seccion-includes" style="display:none;">
                @csrf
                @method('PUT')
                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="includes">

                <div class="card mb-4">
                    <div class="card-header bg-light"><h4 class="mb-0">⭐ ¿Qué incluye?</h4></div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label"><strong>Título de Sección</strong></label>
                                <input type="text" name="includes__titulo_seccion" class="form-control" value="{{ $cv($sec,'titulo_seccion','¿Qué incluye el Move Challenge?') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><strong>Subtítulo de Sección</strong></label>
                                <textarea name="includes__subtitulo_seccion" rows="2" class="form-control">{{ $cv($sec,'subtitulo_seccion','Todo lo que necesitas para crear hábitos sostenibles y transformar tu bienestar') }}</textarea>
                            </div>

                            <div class="col-12"><hr></div>

                            @for($i=1;$i<=6;$i++)
                                <div class="col-12"><h5 class="text-primary">🎯 Ítem {{ $i }}</h5></div>
                                <div class="col-md-4">
                                    <label class="form-label"><strong>Ícono (FA)</strong></label>
                                    <input type="text" name="includes__item_{{ $i }}_icono" class="form-control" value="{{ $cv($sec,"item_{$i}_icono", match($i){1=>'fas fa-dumbbell',2=>'fas fa-apple-alt',3=>'fas fa-utensils',4=>'fas fa-spa',5=>'fas fa-lightbulb',6=>'fas fa-users'}) }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"><strong>Título</strong></label>
                                    <input type="text" name="includes__item_{{ $i }}_titulo" class="form-control" value="{{ $cv($sec,"item_{$i}_titulo", match($i){1=>'Plan de Entrenamiento',2=>'Nutrición Balanceada',3=>'Recetas Fáciles',4=>'Meditación & Mindfulness',5=>'Conexión Interior',6=>'Comunidad de Apoyo'}) }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"><strong>Descripción</strong></label>
                                    <textarea name="includes__item_{{ $i }}_descripcion" rows="2" class="form-control">{{ $cv($sec,"item_{$i}_descripcion", match($i){
                                        1=>'Rutinas adaptadas para casa o gimnasio, diseñadas según tu nivel y objetivos específicos.',
                                        2=>'Menús balanceados adaptados a tus requerimientos y gustos, sin restricciones extremas.',
                                        3=>'Preparaciones simples y nutritivas que se adaptan a tu rutina diaria.',
                                        4=>'Técnicas guiadas para conectar cuerpo y mente, reducir estrés y mejorar tu bienestar.',
                                        5=>'Herramientas prácticas para desarrollar consciencia y mantener la motivación.',
                                        6=>'Acompañamiento constante de profesionales y compañeros en tu journey.',
                                    }) }}</textarea>
                                </div>
                                @if($i<6)<div class="col-12"><hr></div>@endif
                            @endfor
                        </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-end">
                        <button class="btn btn-primary btn-lg">💾 Guardar “¿Qué incluye?”</button>
                    </div>
                </div>
            </form>

            <!-- ===================================================== -->
            <!-- FORM 4: HOW IT WORKS                                  -->
            <!-- ===================================================== -->
            @php $sec = 'how_works'; @endphp
            <form action="{{ route('paginas.move.update.how') }}" method="POST" class="section-form" id="seccion-how-works" data-section="seccion-how-works" style="display:none;">
                @csrf
                @method('PUT')
                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="how_works">

                <div class="card mb-4">
                    <div class="card-header bg-light"><h4 class="mb-0">⚙️ Cómo Funciona</h4></div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label"><strong>Título de Sección</strong></label>
                                <input type="text" name="how_works__titulo_seccion" class="form-control" value="{{ $cv($sec,'titulo_seccion','Cómo Funciona') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><strong>Subtítulo de Sección</strong></label>
                                <textarea name="how_works__subtitulo_seccion" rows="2" class="form-control">{{ $cv($sec,'subtitulo_seccion','Tu transformación en 3 simples pasos') }}</textarea>
                            </div>

                            <div class="col-12"><hr></div>

                            @for($i=1;$i<=3;$i++)
                                <div class="col-12"><h5 class="text-primary">Paso {{ $i }}</h5></div>
                                <div class="col-md-6">
                                    <label class="form-label"><strong>Título</strong></label>
                                    <input type="text" name="how_works__step_{{ $i }}_titulo" class="form-control" value="{{ $cv($sec,"step_{$i}_titulo", match($i){1=>'Inscríbete',2=>'Entrena',3=>'Transforma'}) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><strong>Descripción</strong></label>
                                    <textarea name="how_works__step_{{ $i }}_descripcion" rows="2" class="form-control">{{ $cv($sec,"step_{$i}_descripcion", match($i){
                                        1=>'Únete al reto y recibe tu plan personalizado adaptado a tus objetivos y nivel de condición física.',
                                        2=>'Sigue tu rutina diaria de ejercicios, nutrición y mindfulness durante 30 días con apoyo constante.',
                                        3=>'Observa los cambios en tu cuerpo, mente y estilo de vida. ¡Compite por premios increíbles!',
                                    }) }}</textarea>
                                </div>
                                @if($i<3)<div class="col-12"><hr></div>@endif
                            @endfor
                        </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-end">
                        <button class="btn btn-primary btn-lg">💾 Guardar “Cómo Funciona”</button>
                    </div>
                </div>
            </form>

            <!-- ===================================================== -->
            <!-- FORM 5: BENEFICIOS + TESTIMONIAL                      -->
            <!-- ===================================================== -->
            @php $sec = 'benefits'; @endphp
            <form action="{{ route('paginas.move.update.benefits') }}" method="POST" enctype="multipart/form-data"
                class="section-form" id="seccion-benefits" data-section="seccion-benefits" style="display:none;">
                @csrf
                @method('PUT')
                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="benefits">

                <div class="card mb-4">
                    <div class="card-header bg-light"><h4 class="mb-0">🏆 Beneficios & Testimonial</h4></div>
                    <div class="card-body">
                        <div class="row g-3">
                            {{-- Beneficios --}}
                            @for($i=1;$i<=3;$i++)
                                <div class="col-12"><h5 class="text-primary">Beneficio {{ $i }}</h5></div>
                                <div class="col-md-4">
                                    <label class="form-label"><strong>Ícono (FA)</strong></label>
                                    <input type="text" name="benefits__benefit_{{ $i }}_icono" class="form-control"
                                        value="{{ $cv($sec,"benefit_{$i}_icono", match($i){1=>'fas fa-trophy',2=>'fas fa-heart',3=>'fas fa-gift'}) }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"><strong>Título</strong></label>
                                    <input type="text" name="benefits__benefit_{{ $i }}_titulo" class="form-control"
                                        value="{{ $cv($sec,"benefit_{$i}_titulo", match($i){1=>'Resultados Reales',2=>'Comunidad de Apoyo',3=>'Premios Increíbles'}) }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"><strong>Descripción</strong></label>
                                    <textarea name="benefits__benefit_{{ $i }}_descripcion" rows="2" class="form-control">{{ $cv($sec,"benefit_{$i}_descripcion", match($i){
                                        1=>'Programa probado con cientos de participantes que han alcanzado sus metas de forma sostenible.',
                                        2=>'Conecta con personas que comparten tus objetivos y motivaciones en un ambiente positivo.',
                                        3=>'Los mejores resultados son reconocidos y premiados al finalizar el challenge.',
                                    }) }}</textarea>
                                </div>
                                @if($i<3)<div class="col-12"><hr></div>@endif
                            @endfor

                            <div class="col-12"><hr></div>
                            <div class="col-12"><h5 class="text-primary">💬 Testimonial</h5></div>

                            <div class="col-md-12">
                                <label class="form-label"><strong>Texto de la cita</strong></label>
                                <textarea name="benefits__testimonial_texto" rows="3" class="form-control">{{ $cv($sec,'testimonial_texto','"El Move Challenge cambió mi vida completamente. No solo perdí peso, sino que gané confianza, energía y una nueva perspectiva sobre el bienestar integral."') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Autor</strong></label>
                                <input type="text" name="benefits__testimonial_autor" class="form-control"
                                    value="{{ $cv($sec,'testimonial_autor','María González') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Detalle autor</strong></label>
                                <input type="text" name="benefits__testimonial_detalle" class="form-control"
                                    value="{{ $cv($sec,'testimonial_detalle','Move Challenge Enero 2025') }}">
                            </div>

                            {{-- AVATAR: Subida/URL + preview --}}
                            @php
                                $avatarActual = $cv($sec,'testimonial_avatar', null);
                            @endphp
                            <div class="col-md-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Avatar (opcional)</strong>
                                    <span class="badge bg-success ms-2">IMAGEN</span>
                                </label>

                                <ul class="nav nav-tabs mb-3">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#benefits-avatar-upload" type="button">📤 Subir</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#benefits-avatar-url" type="button">🔗 URL</button>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="benefits-avatar-upload">
                                        <input type="file" name="benefits__testimonial_avatar_file" class="form-control mb-2" accept="image/*">
                                        <small class="text-muted">JPG/PNG/WEBP/SVG (máx. ~2MB).</small>
                                    </div>
                                    <div class="tab-pane fade" id="benefits-avatar-url">
                                        <input type="text" name="benefits__testimonial_avatar_url" class="form-control"
                                            value="{{ old('benefits__testimonial_avatar_url', $avatarActual) }}"
                                            placeholder="images/avatar-maria.jpg">
                                        <small class="text-muted">Ruta relativa o URL completa.</small>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label"><strong>Vista previa actual:</strong></label>
                                    <div class="border rounded p-2 bg-light" style="display:inline-block">
                                        <img src="{{ $avatarActual ? asset($avatarActual) : asset('images/sinfondo.png') }}"
                                            alt="Avatar actual" class="img-thumbnail" style="height:120px;width:120px;object-fit:cover;border-radius:50%;"
                                            onerror="this.src='{{ asset('images/sinfondo.png') }}'">
                                    </div>
                                    <small class="text-muted d-block">Ruta actual: <code>{{ $avatarActual ?: '—' }}</code></small>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-end">
                        <button class="btn btn-primary btn-lg">💾 Guardar Beneficios & Testimonial</button>
                    </div>
                </div>
            </form>


            <!-- ===================================================== -->
            <!-- FORM 6: CTA MOVE                                      -->
            <!-- ===================================================== -->
            @php $sec = 'cta_move'; @endphp
            <form action="{{ route('paginas.move.update.cta') }}" method="POST" class="section-form" id="seccion-cta-move" data-section="seccion-cta-move" style="display:none;">
                @csrf
                @method('PUT')
                <input type="hidden" name="idioma" value="{{ $idioma }}">
                <input type="hidden" name="pagina" value="{{ $pagina }}">
                <input type="hidden" name="seccion" value="cta_move">

                <div class="card mb-4">
                    <div class="card-header bg-light"><h4 class="mb-0">🚀 CTA final</h4></div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label"><strong>Título</strong></label>
                                <input type="text" name="cta_move__titulo" class="form-control" value="{{ $cv($sec,'titulo','¿Lista/o para comenzar tu transformación?') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><strong>Subtítulo</strong></label>
                                <textarea name="cta_move__subtitulo" rows="2" class="form-control">{{ $cv($sec,'subtitulo','Únete al próximo Move Challenge y descubre todo lo que puedes lograr en 30 días') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Botón - Texto</strong></label>
                                <input type="text" name="cta_move__boton_texto" class="form-control" value="{{ $cv($sec,'boton_texto','Quiero mi Cupo') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Botón - URL</strong></label>
                                <input type="text" name="cta_move__boton_url" class="form-control" value="{{ $cv($sec,'boton_url', route('contact')) }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-end">
                        <button class="btn btn-primary btn-lg">💾 Guardar CTA</button>
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
.list-group-item{border-left:3px solid transparent;transition:all .3s ease;cursor:pointer}
.list-group-item:hover,.list-group-item.active{border-left-color:#0d6efd;background-color: #0d6efd;font-weight:600}
.card{box-shadow:0 2px 4px rgba(0,0,0,.1)}
.form-control:focus{border-color:#0d6efd;box-shadow:0 0 0 .25rem rgba(13,110,253,.25)}
textarea.form-control{resize:vertical}
.section-tabs{flex-wrap:wrap}
.section-tabs .btn{flex:1 1 auto;min-width:100px;margin-bottom:5px}
.section-tabs .btn.active{background-color:#0d6efd;color:#fff;font-weight:700}
.section-form{animation:fadeIn .3s ease-in}
@keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebarLinks = document.querySelectorAll('.list-group-item[data-section]');
    const tabButtons = document.querySelectorAll('.section-tabs .btn');
    const sectionForms = document.querySelectorAll('.section-form');

    function showSection(sectionId) {
        sectionForms.forEach(f => f.style.display = 'none');
        const target = document.querySelector(`.section-form[data-section="${sectionId}"]`);
        if (target) {
            target.style.display = 'block';
            setTimeout(() => target.scrollIntoView({behavior:'smooth', block:'start'}), 100);
        }
        sidebarLinks.forEach(l => {
            l.classList.toggle('active', l.dataset.section === sectionId.replace('seccion-',''));
        });
        tabButtons.forEach(b => {
            b.classList.toggle('active', b.dataset.target === sectionId);
        });
    }

    sidebarLinks.forEach(l => l.addEventListener('click', e => {
        e.preventDefault(); showSection('seccion-' + l.dataset.section);
    }));
    tabButtons.forEach(b => b.addEventListener('click', () => showSection(b.dataset.target)));
    showSection('seccion-move-hero');
});
</script>
@endsection
