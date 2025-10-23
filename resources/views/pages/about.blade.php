@extends('layouts.app')
@section('seo')
  @include('partials.seo', ['slug' => 'sobre-mi'])
@endsection
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
    
    :root {
        --purple-dark: #410445;      /* Púrpura oscuro */
        --purple-medium: #A5158C;    /* Púrpura medio */
        --pink-bright: #FF2DF1;      /* Fucsia brillante */
        --yellow: #F6DC43;           /* Amarillo */
        --green: #CCD537;            /* Verde */
        --text-color: #ffeac5;       /* Color crema - TIPOGRAFÍA PRINCIPAL */
        --text-secondary: rgba(255, 234, 197, 0.85); /* Semi-transparente */
        --text-muted: rgba(255, 234, 197, 0.7);      /* Muy suave */
        --neutral-white: #FFFFFF;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Open Sans', sans-serif;
        color: var(--text-color);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* ===================================
       WAVE DIVIDERS
       ================================== */
    .wave-divider-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        z-index: 3;
        transform: rotate(180deg);
    }

    .wave-divider-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        z-index: 3;
    }

    .wave-divider-top svg,
    .wave-divider-bottom svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 80px;
    }

    /* ===================================
       ABOUT HERO SECTION - TRANSPARENTE
       ================================== */
    .about-hero {
        min-height: 95vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background: transparent; /* SIN FONDO */
        padding: 160px 0 140px;
        text-align: center;
        overflow: hidden;
    }

    .about-hero-wrapper {
        max-width: 900px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .about-title-section {
        margin-bottom: 60px;
    }

    .about-hero-wrapper h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        color: var(--text-color); /* Crema */
        margin-bottom: 20px;
        line-height: 1.2;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
    }

    .about-hero-wrapper .highlight {
        color: var(--pink-bright); /* Fucsia para resaltar */
        position: relative;
        display: inline-block;
    }

    .about-hero-wrapper .subtitle {
        font-size: 1.3rem;
        color: var(--text-secondary); /* Crema semi-transparente */
        max-width: 600px;
        margin: 0 auto 16px;
        line-height: 1.6;
        font-weight: 400;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
    }

    /* Imagen circular orgánica centrada */
    .about-image-wrapper {
        position: relative;
        width: 400px;
        height: 400px;
        margin: 0 auto 50px;
    }

    .circular-organic-shape {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, 
            rgba(165, 21, 140, 0.3) 0%, 
            rgba(255, 45, 241, 0.2) 100%);
        border-radius: 50% 45% 48% 52% / 48% 50% 50% 52%;
        animation: morphCircle 10s ease-in-out infinite;
        z-index: 1;
        box-shadow: 0 10px 40px rgba(255, 45, 241, 0.3);
    }

    @keyframes morphCircle {
        0%, 100% {
            border-radius: 50% 45% 48% 52% / 48% 50% 50% 52%;
            transform: rotate(0deg);
        }
        33% {
            border-radius: 45% 55% 50% 50% / 52% 48% 52% 48%;
            transform: rotate(2deg);
        }
        66% {
            border-radius: 52% 48% 45% 55% / 50% 52% 48% 50%;
            transform: rotate(-2deg);
        }
    }

    .about-image-wrapper img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 88%;
        height: 88%;
        object-fit: cover;
        border-radius: 50%;
        z-index: 2;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        border: 6px solid rgba(255, 234, 197, 0.2);
    }

    /* Estadísticas horizontales centradas */
    .stats-row {
        display: flex;
        justify-content: center;
        gap: 60px;
        flex-wrap: wrap;
        margin-top: 50px;
    }

    .stat-item {
        text-align: center;
        position: relative;
    }

    .stat-item::before {
        content: '';
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background: var(--purple-dark);
        border-radius: 2px;
    }

    .stat-item:nth-child(2)::before {
        background: var(--pink-bright);
    }

    .stat-item:nth-child(3)::before {
        background: var(--green);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        color: var(--text-color); /* Crema */
        display: block;
        line-height: 1;
        margin-bottom: 8px;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
    }

    .stat-label {
        font-size: 0.95rem;
        color: var(--text-secondary); /* Crema semi-transparente */
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-weight: 500;
    }

    /* ===================================
       STORY SECTION - TRANSPARENTE
       ================================== */
    .story-section {
        padding: 140px 0;
        background: transparent; /* SIN FONDO */
        position: relative;
        overflow: hidden;
    }

    .story-content {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 600;
        color: var(--text-color); /* Crema */
        margin-bottom: 32px;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
    }

    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: var(--pink-bright);
        margin: 20px auto 0;
        border-radius: 2px;
    }

    .story-text {
        font-size: 1.125rem;
        color: var(--text-secondary); /* Crema semi-transparente */
        line-height: 1.8;
        margin-bottom: 24px;
    }

    /* ===================================
       VALUES SECTION - TRANSPARENTE
       ================================== */
    .values-section {
        padding: 140px 0;
        background: transparent; /* SIN FONDO */
        position: relative;
        overflow: hidden;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
        margin-top: 60px;
    }

    .value-card {
        position: relative;
        text-align: center;
        padding: 48px 32px;
        border-radius: 30px;
        isolation: isolate;
        background: rgba(45, 27, 61, 0.5); /* Fondo sutil */
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 45, 241, 0.15);
        transition: all 0.3s ease;
    }

    .value-card:hover {
        transform: translateY(-8px);
        border-color: var(--pink-bright);
        box-shadow: 0 15px 40px rgba(255, 45, 241, 0.3);
        background: rgba(45, 27, 61, 0.7);
    }

    /* Value Icons con colores específicos */
    .value-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-size: 2rem;
        transition: all 0.3s ease;
    }

    /* Value 1: Púrpura oscuro */
    .value-card:nth-child(1) .value-icon {
        background: #410445;
        color: #FFFFFF;
        box-shadow: 0 4px 15px rgba(65, 4, 69, 0.4);
    }

    /* Value 2: Fucsia */
    .value-card:nth-child(2) .value-icon {
        background: #FF2DF1;
        color: #FFFFFF;
        box-shadow: 0 4px 15px rgba(255, 45, 241, 0.4);
    }

    /* Value 3: Verde */
    .value-card:nth-child(3) .value-icon {
        background: #CCD537;
        color: #2D1B3D;
        box-shadow: 0 4px 15px rgba(204, 213, 55, 0.4);
    }

    /* Value 4: Amarillo */
    .value-card:nth-child(4) .value-icon {
        background: #F6DC43;
        color: #2D1B3D;
        box-shadow: 0 4px 15px rgba(246, 220, 67, 0.4);
    }

    .value-card:hover .value-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .value-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-color); /* Crema */
        margin-bottom: 16px;
    }

    .value-description {
        font-size: 1rem;
        color: var(--text-secondary); /* Crema semi-transparente */
        line-height: 1.6;
    }

    /* ===================================
       CREDENTIALS SECTION - TRANSPARENTE
       ================================== */
    .credentials-section {
        padding: 140px 0;
        background: transparent; /* SIN FONDO */
        position: relative;
        text-align: center;
        overflow: hidden;
    }

    .credentials-list {
        max-width: 700px;
        margin: 60px auto 0;
        text-align: left;
    }

    .credential-item {
        display: flex;
        align-items: center;
        padding: 24px;
        margin-bottom: 20px;
        background: rgba(45, 27, 61, 0.5); /* Fondo sutil */
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 45, 241, 0.15);
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .credential-item:hover {
        transform: translateX(10px);
        border-color: var(--pink-bright);
        box-shadow: 0 10px 30px rgba(255, 45, 241, 0.3);
        background: rgba(45, 27, 61, 0.7);
    }

    /* Credential Icons con colores específicos */
    .credential-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 24px;
        font-size: 1.5rem;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    /* Credential 1: Púrpura oscuro */
    .credential-item:nth-child(1) .credential-icon {
        background: #410445;
        color: #FFFFFF;
        box-shadow: 0 4px 15px rgba(65, 4, 69, 0.4);
    }

    /* Credential 2: Fucsia */
    .credential-item:nth-child(2) .credential-icon {
        background: #FF2DF1;
        color: #FFFFFF;
        box-shadow: 0 4px 15px rgba(255, 45, 241, 0.4);
    }

    /* Credential 3: Verde */
    .credential-item:nth-child(3) .credential-icon {
        background: #CCD537;
        color: #2D1B3D;
        box-shadow: 0 4px 15px rgba(204, 213, 55, 0.4);
    }

    /* Credential 4: Amarillo */
    .credential-item:nth-child(4) .credential-icon {
        background: #F6DC43;
        color: #2D1B3D;
        box-shadow: 0 4px 15px rgba(246, 220, 67, 0.4);
    }

    .credential-item:hover .credential-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .credential-text h4 {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-color); /* Crema */
        margin-bottom: 4px;
    }

    .credential-text p {
        font-size: 0.95rem;
        color: var(--text-secondary); /* Crema semi-transparente */
        margin: 0;
    }

    /* ===================================
       CTA SECTION - Púrpura prominente
       ================================== */
    .cta-about-section {
        padding: 140px 0 120px;
        background: transparent; /* SIN FONDO */
        position: relative;
        text-align: center;
        overflow: hidden;
    }

    .cta-about-content {
        position: relative;
        z-index: 2;
        padding: 80px 40px;
        background: rgba(65, 4, 69, 0.7); /* Púrpura con transparencia */
        backdrop-filter: blur(15px);
        border-radius: 40px;
        border: 2px solid rgba(255, 45, 241, 0.3);
        max-width: 900px;
        margin: 0 auto;
        box-shadow: 0 20px 60px rgba(65, 4, 69, 0.5);
    }

    .cta-about-content h2 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 24px;
        color: var(--text-color); /* Crema */
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
    }

    .cta-about-content p {
        font-size: 1.25rem;
        margin-bottom: 40px;
        color: var(--text-secondary); /* Crema semi-transparente */
    }

    /* Botón fucsia con hover */
    .btn-white {
        display: inline-block;
        padding: 18px 48px;
        background: var(--pink-bright); /* Fucsia */
        color: var(--purple-dark); /* Texto oscuro */
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(255, 45, 241, 0.4);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-white:hover {
        background: var(--green); /* Verde al hover */
        color: #2D1B3D;
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(204, 213, 55, 0.5);
    }

    /* ===================================
       RESPONSIVE
       ================================== */
    @media (max-width: 968px) {
        .about-image-wrapper {
            width: 320px;
            height: 320px;
        }

        .stats-row {
            gap: 40px;
        }

        .values-grid {
            grid-template-columns: 1fr;
        }

        .credentials-list {
            padding: 0 20px;
        }

        .about-hero,
        .story-section,
        .values-section,
        .credentials-section,
        .cta-about-section {
            padding: 100px 0;
        }
    }

    @media (max-width: 640px) {
        .about-hero {
            padding-top: 140px;
            padding-bottom: 100px;
        }

        .about-image-wrapper {
            width: 280px;
            height: 280px;
        }

        .section-title {
            font-size: 2rem;
        }

        .stats-row {
            flex-direction: column;
            gap: 30px;
        }

        .stat-number {
            font-size: 2.5rem;
        }

        .cta-about-content h2 {
            font-size: 2rem;
        }

        .cta-about-content p {
            font-size: 1.1rem;
        }

        .cta-about-content {
            padding: 60px 30px;
        }

        .wave-divider-top svg,
        .wave-divider-bottom svg {
            height: 50px;
        }
    }
</style>

<!-- About Hero Section -->
@php
    $aboutHero = $contenidos->get('about_hero', collect());

    $titulo      = optional($aboutHero->get('titulo'))->valor
                    ?? 'Hola, soy <span class="highlight">Anabelle Ibalu</span>';
    $subtitulo   = optional($aboutHero->get('subtitulo'))->valor
                    ?? 'Coach de bienestar apasionada por el movimiento consciente';
    $imagen      = optional($aboutHero->get('imagen'))->valor
                    ?? 'images/anabelle-profile.jpg';
    $descripcion = optional($aboutHero->get('descripcion'))->valor
                    ?? 'Mi misión es ayudarte a descubrir tu mejor versión a través de hábitos sostenibles. Creo que el cambio real viene de adentro hacia afuera.';

    $stat1n = optional($aboutHero->get('stat_1_num'))->valor ?? '500+';
    $stat1l = optional($aboutHero->get('stat_1_lbl'))->valor ?? 'Vidas transformadas';
    $stat2n = optional($aboutHero->get('stat_2_num'))->valor ?? '5+';
    $stat2l = optional($aboutHero->get('stat_2_lbl'))->valor ?? 'Años de experiencia';
    $stat3n = optional($aboutHero->get('stat_3_num'))->valor ?? '30+';
    $stat3l = optional($aboutHero->get('stat_3_lbl'))->valor ?? 'Challenges realizados';
@endphp

<section class="about-hero">
    <div class="container">
        <div class="about-hero-wrapper">
            <div class="about-title-section">
                <h1>{!! $titulo !!}</h1>
                <p class="subtitle">{{ $subtitulo }}</p>
            </div>

            <div class="about-image-wrapper">
                <div class="circular-organic-shape"></div>
                <img src="{{ asset($imagen) }}" alt="Anabelle Ibalu"
                     onerror="this.src='{{ asset('images/sinfondo.png') }}'">
            </div>

            <div class="about-description">
                <p class="subtitle">{{ $descripcion }}</p>
            </div>

            <div class="stats-row">
                <div class="stat-item">
                    <span class="stat-number">{{ $stat1n }}</span>
                    <span class="stat-label">{{ $stat1l }}</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">{{ $stat2n }}</span>
                    <span class="stat-label">{{ $stat2l }}</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">{{ $stat3n }}</span>
                    <span class="stat-label">{{ $stat3l }}</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Wave ABAJO del Hero -->
    <div class="wave-divider-bottom">
      
    </div>
</section>

<!-- Story Section -->
@php
    $storyTitle = data_get($contenidos, 'story.titulo.valor', 'Mi historia');
    $p1 = data_get($contenidos, 'story.parrafo_1.valor', 'Mi viaje en el mundo del fitness comenzó como una búsqueda personal de bienestar. Después de años luchando con dietas restrictivas y entrenamientos agotadores, descubrí que el verdadero cambio viene del equilibrio.');
    $p2 = data_get($contenidos, 'story.parrafo_2.valor', 'Decidí convertirme en entrenadora personal certificada para ayudar a otras personas a evitar los errores que yo cometí. Mi enfoque combina el movimiento consciente con la nutrición balanceada y el mindfulness.');
    $p3 = data_get($contenidos, 'story.parrafo_3.valor', 'Hoy, mi mayor satisfacción es ver cómo mis clientes no solo transforman sus cuerpos, sino también su mentalidad y su relación con el ejercicio y la comida.');
@endphp

<section class="story-section">
    <!-- Wave ARRIBA del Story -->
    <div class="wave-divider-top">
        
    </div>

    <div class="container">
        <div class="story-content">
            <h2 class="section-title">{{ $storyTitle }}</h2>

            @foreach ([$p1, $p2, $p3] as $p)
                @if(!empty($p))
                    <p class="story-text">{{ $p }}</p>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Wave ABAJO del Story -->
    <div class="wave-divider-bottom">
        
    </div>
</section>

<!-- Values Section -->
@php
    $valuesSec = $contenidos['values'] ?? collect();
    $val = function ($key, $default = null) use ($valuesSec) {
        return optional($valuesSec->firstWhere('clave', $key))->valor ?? $default;
    };

    $valoresTitulo   = $val('titulo_seccion', 'Mis valores');
    $valoresSubtitulo= $val('subtitulo_seccion', 'Estos son los principios que guían mi trabajo y mi filosofía de vida');

    $items = [];
    for ($i=1; $i<=4; $i++) {
        $items[] = [
            'icono' => $val("value_{$i}_icono",
                match ($i) {
                    1 => 'fas fa-heart',
                    2 => 'fas fa-balance-scale',
                    3 => 'fas fa-users',
                    4 => 'fas fa-seedling',
                }
            ),
            'titulo' => $val("value_{$i}_titulo",
                match ($i) {
                    1 => 'Autenticidad',
                    2 => 'Equilibrio',
                    3 => 'Comunidad',
                    4 => 'Crecimiento',
                }
            ),
            'descripcion' => $val("value_{$i}_descripcion",
                match ($i) {
                    1 => 'Creo en ser real y transparente. No existen los cuerpos perfectos, existen cuerpos sanos y felices.',
                    2 => 'El bienestar no se trata de extremos. Se trata de encontrar tu punto medio sostenible.',
                    3 => 'Juntos somos más fuertes. Creo en el poder del apoyo mutuo y la motivación colectiva.',
                    4 => 'Cada día es una oportunidad para ser 1% mejor. El progreso, no la perfección.',
                }
            ),
        ];
    }
@endphp

<section class="values-section">
    <!-- Wave ARRIBA del Values -->
    <div class="wave-divider-top">
        
    </div>

    <div class="container">
        <div class="story-content">
            <h2 class="section-title">{{ $valoresTitulo }}</h2>
            <p class="story-text">
                {{ $valoresSubtitulo }}
            </p>
        </div>

        <div class="values-grid">
            @foreach($items as $item)
                <div class="value-card">
                    <div class="value-icon">
                        <i class="{{ $item['icono'] }}"></i>
                    </div>
                    <h3 class="value-title">{{ $item['titulo'] }}</h3>
                    <p class="value-description">{{ $item['descripcion'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Wave ABAJO del Values -->
    <div class="wave-divider-bottom">
        
    </div>
</section>

<!-- Credentials Section -->
@php
    $credSec = $contenidos['credentials'] ?? collect();
    $cv = function ($key, $default = null) use ($credSec) {
        return optional($credSec->firstWhere('clave',$key))->valor ?? $default;
    };

    $credTitle = $cv('titulo_seccion', 'Certificaciones y experiencia');
    $credSubtitle = $cv('subtitulo_seccion', 'Mi formación continua me permite ofrecerte las mejores herramientas');

    $items = [];
    for ($i=1; $i<=4; $i++) {
        $items[] = [
            'icono' => $cv("item_{$i}_icono", match($i){
                1 => 'fas fa-certificate',
                2 => 'fas fa-apple-alt',
                3 => 'fas fa-spa',
                4 => 'fas fa-dumbbell',
            }),
            'titulo' => $cv("item_{$i}_titulo", match($i){
                1 => 'Entrenadora Personal Certificada',
                2 => 'Certificación en Nutrición Deportiva',
                3 => 'Instructora de Yoga & Mindfulness',
                4 => 'Especialización en Entrenamiento Funcional',
            }),
            'descripcion' => $cv("item_{$i}_descripcion", match($i){
                1 => 'ISSA - International Sports Sciences Association',
                2 => 'Especializada en planes alimenticios personalizados',
                3 => '200h Yoga Alliance RYT',
                4 => 'Movimientos naturales y eficientes',
            }),
        ];
    }
@endphp

<section class="credentials-section">
    <!-- Wave ARRIBA del Credentials -->
    <div class="wave-divider-top">
      
    </div>

    <div class="container">
        <h2 class="section-title">{{ $credTitle }}</h2>
        <p class="story-text">{{ $credSubtitle }}</p>

        <div class="credentials-list">
            @foreach($items as $it)
                <div class="credential-item">
                    <div class="credential-icon">
                        <i class="{{ $it['icono'] }}"></i>
                    </div>
                    <div class="credential-text">
                        <h4>{{ $it['titulo'] }}</h4>
                        <p>{{ $it['descripcion'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Wave ABAJO del Credentials -->
    <div class="wave-divider-bottom">
     
    </div>
</section>

<!-- CTA Section -->
@php
    $cta = $contenidos['cta_about'] ?? collect();
    $cv = function ($key, $default = null) use ($cta) {
        return optional($cta->firstWhere('clave', $key))->valor ?? $default;
    };

    $ctaTitle   = $cv('titulo', '¿Lista/o para comenzar tu transformación?');
    $ctaText    = $cv('subtitulo', 'Únete al próximo Move Challenge y descubre todo lo que puedes lograr');
    $ctaBtnTxt  = $cv('boton_texto', 'Hablemos');
    $ctaBtnUrl  = $cv('boton_url', null) ?? (Route::has('contact') ? route('contact') : '#contacto');
@endphp

<section class="cta-about-section">
    <!-- Wave ARRIBA del CTA -->
    <div class="wave-divider-top">
     
    </div>

    <div class="container">
        <div class="cta-about-content">
            <h2>{{ $ctaTitle }}</h2>
            <p>{{ $ctaText }}</p>
            <a href="{{ $ctaBtnUrl }}" class="btn-white">{{ $ctaBtnTxt }}</a>
        </div>
    </div>
</section>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection