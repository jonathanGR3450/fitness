@extends('layouts.app')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
    
    :root {
        --purple-dark: #410445;      /* Púrpura oscuro - PROMINENTE */
        --purple-medium: #A5158C;    /* Púrpura medio */
        --pink-bright: #FF2DF1;      /* Fucsia brillante */
        --yellow: #F6DC43;           /* Amarillo */
        --green: #CCD537;            /* Verde */
        --neutral-light: #FAF9F7;
        --neutral-cream: #F5F2ED;
        --neutral-sand: #E8E2D5;
        --neutral-white: #FFFFFF;
        --dark-text: #2C3E50;
        --medium-text: #6C757D;
        --light-text: #9CA3AF;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Open Sans', sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Wave Divider */
    .wave-divider-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
    }

    .wave-divider-bottom svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 80px;
    }

    /* Move Hero Section - DISEÑO ASIMÉTRICO */
    .move-hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        background: rgba(65, 4, 69, 0.03);
        padding: 160px 0 100px;
        overflow: hidden;
    }

    /* Formas orgánicas de fondo */
    .move-hero::before {
        content: '';
        position: absolute;
        top: -10%;
        right: -5%;
        width: 500px;
        height: 500px;
        background: var(--green);
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        opacity: 0.08;
        animation: morph 12s ease-in-out infinite;
        z-index: 1;
    }

    .move-hero::after {
        content: '';
        position: absolute;
        bottom: 10%;
        left: -8%;
        width: 400px;
        height: 400px;
        background: var(--pink-bright);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        opacity: 0.06;
        animation: morph 15s ease-in-out infinite reverse;
        z-index: 1;
    }

    @keyframes morph {
        0%, 100% {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            transform: rotate(0deg);
        }
        50% {
            border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
            transform: rotate(180deg);
        }
    }

    .move-hero-container {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 60px;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .move-hero-content h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        color: var(--dark-text);
        margin-bottom: 24px;
        line-height: 1.1;
    }

    .move-hero-content .highlight {
        color: var(--purple-dark);
        position: relative;
    }

    .move-hero-content .badge-tag {
        display: inline-block;
        padding: 10px 24px;
        background: var(--green);
        color: #333;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .move-hero-content p {
        font-size: 1.3rem;
        color: var(--medium-text);
        margin-bottom: 32px;
        line-height: 1.7;
    }

    /* Stats inline */
    .stats-inline {
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
        margin: 40px 0;
    }

    .stat-inline-item {
        position: relative;
    }

    .stat-inline-number {
        font-size: 2.8rem;
        font-weight: 700;
        line-height: 1;
        display: block;
        margin-bottom: 8px;
    }

    .stat-inline-item:nth-child(1) .stat-inline-number {
        color: var(--purple-dark);
    }

    .stat-inline-item:nth-child(2) .stat-inline-number {
        color: var(--pink-bright);
    }

    .stat-inline-item:nth-child(3) .stat-inline-number {
        color: var(--green);
    }

    .stat-inline-label {
        font-size: 0.95rem;
        color: var(--medium-text);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Tarjeta flotante lateral */
    .floating-info-card {
        position: relative;
        background: var(--neutral-white);
        padding: 40px;
        border-radius: 30px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        animation: floatCard 6s ease-in-out infinite;
    }

    @keyframes floatCard {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }

    .floating-info-card .card-badge {
        display: inline-block;
        padding: 8px 20px;
        background: var(--green);
        color: #333;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .floating-info-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 20px;
    }

    .floating-info-card ul {
        list-style: none;
        padding: 0;
        margin: 0 0 30px 0;
    }

    .floating-info-card ul li {
        display: flex;
        align-items: center;
        padding: 12px 0;
        color: var(--medium-text);
        font-size: 0.95rem;
        border-bottom: 1px solid var(--neutral-sand);
    }

    .floating-info-card ul li:last-child {
        border-bottom: none;
    }

    .floating-info-card ul li i {
        color: var(--green);
        font-size: 1.2rem;
        margin-right: 12px;
    }

    .btn-primary-move {
        display: block;
        width: 100%;
        padding: 16px;
        background: var(--purple-dark);
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 15px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 15px rgba(65, 4, 69, 0.3);
    }

    .btn-primary-move:hover {
        background: var(--purple-medium);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(65, 4, 69, 0.4);
        color: white;
    }

    .card-footer-text {
        text-align: center;
        margin-top: 16px;
        font-size: 0.85rem;
        color: var(--light-text);
    }

    /* About Section con video */
    .about-move-section {
        padding: 120px 0;
        background: rgba(255, 255, 255, 0.75);
        position: relative;
    }

    .about-move-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
    }

    .video-container-move {
        position: relative;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .video-organic-shape {
        position: absolute;
        width: 100%;
        height: 100%;
        background: var(--neutral-sand);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        z-index: 1;
        animation: morphVideo 10s ease-in-out infinite;
    }

    @keyframes morphVideo {
        0%, 100% {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }
        50% {
            border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%;
        }
    }

    .video-container-move video {
        position: relative;
        width: 85%;
        height: 85%;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        z-index: 2;
    }

    .about-move-content .section-badge {
        display: inline-block;
        padding: 8px 20px;
        background: var(--pink-bright);
        color: white;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .about-move-content h2 {
        font-size: 2.5rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 24px;
    }

    .about-move-content p {
        font-size: 1.125rem;
        color: var(--medium-text);
        line-height: 1.8;
        margin-bottom: 24px;
    }

    .values-grid-small {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
        margin-top: 32px;
    }

    .value-box-small {
        padding: 20px;
        background: var(--neutral-light);
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .value-box-small:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .value-box-small i {
        font-size: 2rem;
        margin-bottom: 12px;
    }

    .value-box-small:nth-child(1) i {
        color: var(--purple-dark);
    }

    .value-box-small:nth-child(2) i {
        color: var(--pink-bright);
    }

    .value-box-small:nth-child(3) i {
        color: var(--green);
    }

    .value-box-small:nth-child(4) i {
        color: var(--yellow);
    }

    .value-box-small h6 {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--dark-text);
        margin: 0;
    }

    /* What Includes Section */
    .includes-section {
        padding: 120px 0;
        background: rgba(245, 242, 237, 0.1);
        position: relative;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 16px;
        text-align: center;
    }

    .section-subtitle {
        font-size: 1.125rem;
        color: var(--medium-text);
        text-align: center;
        margin-bottom: 60px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .includes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-top: 60px;
    }

    .include-card {
        position: relative;
        padding: 40px 30px;
        background: var(--neutral-white);
        border-radius: 25px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .include-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .include-card-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-size: 1.8rem;
        color: white;
                background: var(--purple-dark);

    }

   
    .include-card h4 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 12px;
    }

    .include-card p {
        font-size: 0.95rem;
        color: var(--medium-text);
        line-height: 1.6;
        margin: 0;
    }

    /* How It Works Section */
    .how-works-section {
        padding: 120px 0;
        background: rgba(255, 255, 255, 0.75);
        position: relative;
    }

    .steps-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        margin-top: 60px;
    }

    .step-card {
        position: relative;
        text-align: center;
        padding: 40px 30px;
        background: var(--neutral-white);
        border-radius: 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .step-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .step-number {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-size: 2rem;
        font-weight: 700;
        color: white;
    }

    .step-card:nth-child(1) .step-number {
        background: var(--purple-dark);
    }

    .step-card:nth-child(2) .step-number {
        background: var(--pink-bright);
    }

    .step-card:nth-child(3) .step-number {
        background: var(--green);
        color: #333;
    }

    .step-card h4 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 16px;
    }

    .step-card p {
        font-size: 1rem;
        color: var(--medium-text);
        line-height: 1.6;
        margin: 0;
    }

    /* Benefits Section */
    .benefits-section {
        padding: 120px 0;
        background: rgba(245, 242, 237, 0.1);
        position: relative;
    }

    .benefits-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
    }

    .benefits-list {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .benefit-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 24px;
        background: var(--neutral-white);
        border-radius: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .benefit-item:hover {
        transform: translateX(10px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    }

    .benefit-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: white;
        font-size: 1.3rem;
    }

    .benefit-item:nth-child(1) .benefit-icon {
        background: var(--purple-dark);
    }

    .benefit-item:nth-child(2) .benefit-icon {
        background: var(--pink-bright);
    }

    .benefit-item:nth-child(3) .benefit-icon {
        background: var(--yellow);
        color: #333;
    }

    .benefit-text h5 {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 8px;
    }

    .benefit-text p {
        font-size: 0.95rem;
        color: var(--medium-text);
        line-height: 1.6;
        margin: 0;
    }

    .testimonial-card-move {
        position: relative;
        padding: 40px;
        background: var(--purple-dark);
        border-radius: 30px;
        color: white;
        box-shadow: 0 8px 30px rgba(65, 4, 69, 0.25);
    }

    .testimonial-card-move i {
        font-size: 3rem;
        opacity: 0.3;
        margin-bottom: 20px;
    }

    .testimonial-card-move p {
        font-size: 1.125rem;
        line-height: 1.7;
        margin-bottom: 24px;
        font-style: italic;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .testimonial-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
    }

    .testimonial-author-info h6 {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .testimonial-author-info small {
        font-size: 0.85rem;
        opacity: 0.8;
    }

    /* CTA Section */
    .cta-move-section {
        padding: 100px 0;
        background: #410445;
        position: relative;
        text-align: center;
        color: white;
        overflow: hidden;
    }

    .cta-move-section::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0.3;
    }

    .cta-move-content {
        position: relative;
        z-index: 2;
    }

    .cta-move-content h2 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 24px;
    }

    .cta-move-content p {
        font-size: 1.25rem;
        margin-bottom: 40px;
        opacity: 0.95;
    }

    .btn-white-cta {
        display: inline-block;
        padding: 18px 48px;
        background: white;
        color: var(--purple-dark);
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-white-cta:hover {
        background: var(--green);
        color: #333;
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(204, 213, 55, 0.4);
    }

    /* Responsive */
    @media (max-width: 968px) {
        .move-hero-container,
        .about-move-container,
        .benefits-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .video-container-move {
            height: 400px;
        }

        .steps-container {
            grid-template-columns: 1fr;
        }

        .includes-grid {
            grid-template-columns: 1fr;
        }

        .stats-inline {
            justify-content: center;
        }
    }

    @media (max-width: 640px) {
        .move-hero {
            padding-top: 140px;
        }

        .section-title {
            font-size: 2rem;
        }

        .values-grid-small {
            grid-template-columns: 1fr;
        }

        .stat-inline-number {
            font-size: 2.2rem;
        }

        .cta-move-content h2 {
            font-size: 2rem;
        }

        .cta-move-content p {
            font-size: 1.1rem;
        }
    }
</style>

@php
    // Helpers rápidos
    $getSec = fn($sec) => $contenidos[$sec] ?? collect();
    $cv = function($sec, $key, $default = null) use ($getSec) {
        $secCol = $getSec($sec);
        if ($secCol instanceof \Illuminate\Support\Collection) {
            return optional($secCol->get($key))->valor ?? $default;
        }
        return $default;
    };
@endphp
<!-- Move Hero Section -->
@php
    $sec = 'move_hero';
    $badge        = $cv($sec, 'badge', '30 Días de Transformación');
    $badgeIcon    = $cv($sec, 'badge_icono', 'fas fa-fire');

    $titulo1      = $cv($sec, 'titulo_1', 'Descubre el poder del');
    $titulo2      = $cv($sec, 'titulo_2', 'Move Challenge');

    $descripcion  = $cv($sec, 'descripcion', 'Un programa integral diseñado para transformar tu vida a través del movimiento consciente, nutrición balanceada y conexión interior.');

    $s1n = $cv($sec, 'stat_1_num', '500+');   $s1l = $cv($sec, 'stat_1_lbl', 'Participantes');
    $s2n = $cv($sec, 'stat_2_num', '30');     $s2l = $cv($sec, 'stat_2_lbl', 'Días de Reto');
    $s3n = $cv($sec, 'stat_3_num', '100%');   $s3l = $cv($sec, 'stat_3_lbl', 'Resultados');

    $btnTxt      = $cv($sec, 'boton_texto', 'Conoce Más Detalles');
    $btnUrl      = $cv($sec, 'boton_url', '#nosotros');

    $cardBadge   = $cv($sec, 'card_badge', 'Próximo Reto');
    $cardBadgeIc = $cv($sec, 'card_badge_icono', 'fas fa-star');
    $cardTitulo  = $cv($sec, 'card_titulo', '¿Lista/o para el cambio?');
    $item1 = $cv($sec, 'card_item_1', 'Rutinas personalizadas');
    $item2 = $cv($sec, 'card_item_2', 'Plan de nutrición completo');
    $item3 = $cv($sec, 'card_item_3', 'Comunidad de apoyo');
    $item4 = $cv($sec, 'card_item_4', 'Premios y reconocimientos');
    $cardBtnTxt  = $cv($sec, 'card_boton_texto', 'Inscríbete Ahora');
    $cardBtnUrl  = $cv($sec, 'card_boton_url', (Route::has('contact') ? route('contact') : '#contact'));
    $cardFooter  = $cv($sec, 'card_footer', '12 personas se inscribieron hoy');
@endphp

<section class="move-hero">
    <div class="container">
        <div class="move-hero-container">
            <div class="move-hero-content">
                <span class="badge-tag">
                    <i class="{{ $badgeIcon }} me-2"></i>{{ $badge }}
                </span>
                <h1>
                    {{ $titulo1 }}
                    <span class="highlight d-block">{{ $titulo2 }}</span>
                </h1>
                <p>{{ $descripcion }}</p>

                <div class="stats-inline">
                    <div class="stat-inline-item">
                        <span class="stat-inline-number">{{ $s1n }}</span>
                        <span class="stat-inline-label">{{ $s1l }}</span>
                    </div>
                    <div class="stat-inline-item">
                        <span class="stat-inline-number">{{ $s2n }}</span>
                        <span class="stat-inline-label">{{ $s2l }}</span>
                    </div>
                    <div class="stat-inline-item">
                        <span class="stat-inline-number">{{ $s3n }}</span>
                        <span class="stat-inline-label">{{ $s3l }}</span>
                    </div>
                </div>

                <a href="{{ $btnUrl }}" class="btn-primary-move" style="max-width: 250px;">
                    {{ $btnTxt }} <i class="fas fa-arrow-down ms-2"></i>
                </a>
            </div>

            <div class="floating-info-card">
                <span class="card-badge">
                    <i class="{{ $cardBadgeIc }} me-1"></i>{{ $cardBadge }}
                </span>
                <h3>{{ $cardTitulo }}</h3>
                <ul>
                    @foreach ([$item1, $item2, $item3, $item4] as $it)
                        @if(!empty($it))
                            <li><i class="fas fa-check-circle"></i><span>{{ $it }}</span></li>
                        @endif
                    @endforeach
                </ul>
                <a href="{{ $cardBtnUrl }}" class="btn-primary-move">{{ $cardBtnTxt }}</a>
                <p class="card-footer-text">
                    <i class="fas fa-users me-1"></i>{{ $cardFooter }}
                </p>
            </div>
        </div>
    </div>
    <div class="wave-divider-bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="var(--neutral-white)"></path>
        </svg>
    </div>
</section>

<!-- About Move Section -->
@php
    $aboutMove = $contenidos['about_move'] ?? collect();
    $get = fn($k,$d=null)=> optional($aboutMove->get($k))->valor ?? $d;

    $poster   = $get('video_poster','images/banner3.jpeg');
    $videoW   = $get('video_webm','video/video-promocional.webm'); // SOLO webm

    $badge    = $get('badge','Sobre Annabelle');
    $titulo   = $get('titulo','Conoce a tu Coach');
    $p1       = $get('parrafo_1','Annabelle Ibarra irradia luz...');
    $p2       = $get('parrafo_2','Su filosofía se basa en la gratitud...');

    $vals = [];
    for($i=1;$i<=4;$i++){
        $vals[] = [
            'icon' => $get("value_{$i}_icono", match($i){1=>'fas fa-heart',2=>'fas fa-sun',3=>'fas fa-leaf',4=>'fas fa-hands-helping'}),
            'tit'  => $get("value_{$i}_titulo", match($i){1=>'Gratitud Diaria',2=>'Energía Positiva',3=>'Vida Consciente',4=>'Empatía'}),
        ];
    }
@endphp
<section id="nosotros" class="about-move-section">
    <div class="container">
        <div class="about-move-container">
            <div class="video-container-move">
                <div class="video-organic-shape"></div>
                <video controls preload="metadata" playsinline poster="{{ asset($poster) }}">
                    @if($videoW)
                        <source src="{{ asset($videoW) }}" type="video/webm">
                    @endif
                    Tu navegador no soporta reproducción de video.
                </video>
            </div>

            <div class="about-move-content">
                <span class="section-badge">{{ $badge }}</span>
                <h2>{{ $titulo }}</h2>

                @foreach ([$p1,$p2] as $p)
                    @if(!empty($p)) <p>{!! nl2br(e($p)) !!}</p> @endif
                @endforeach

                <div class="values-grid-small">
                    @foreach ($vals as $v)
                        <div class="value-box-small">
                            <i class="{{ $v['icon'] }}"></i>
                            <h6>{{ $v['tit'] }}</h6>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What Includes Section -->
@php
    $sec = 'includes';
    $tit = $cv($sec, 'titulo_seccion', '¿Qué incluye el Move Challenge?');
    $sub = $cv($sec, 'subtitulo_seccion', 'Todo lo que necesitas para crear hábitos sostenibles y transformar tu bienestar');

    $items = [];
    for ($i=1;$i<=6;$i++){
        $items[] = [
            'icon' => $cv($sec, "item_{$i}_icono", match($i){1=>'fas fa-dumbbell',2=>'fas fa-apple-alt',3=>'fas fa-utensils',4=>'fas fa-spa',5=>'fas fa-lightbulb',6=>'fas fa-users'}),
            'tit'  => $cv($sec, "item_{$i}_titulo",  match($i){1=>'Plan de Entrenamiento',2=>'Nutrición Balanceada',3=>'Recetas Fáciles',4=>'Meditación & Mindfulness',5=>'Conexión Interior',6=>'Comunidad de Apoyo'}),
            'desc' => $cv($sec, "item_{$i}_descripcion", ''),
        ];
    }
@endphp

<section class="includes-section">
    <div class="container">
        <h2 class="section-title">{{ $tit }}</h2>
        <p class="section-subtitle">{{ $sub }}</p>

        <div class="includes-grid">
            @foreach ($items as $it)
            <div class="include-card">
                <div class="include-card-icon"><i class="{{ $it['icon'] }}"></i></div>
                <h4>{{ $it['tit'] }}</h4>
                @if(!empty($it['desc'])) <p>{{ $it['desc'] }}</p> @endif
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- How It Works Section -->
@php
    $sec = 'how_works';
    $tit = $cv($sec, 'titulo_seccion', 'Cómo Funciona');
    $sub = $cv($sec, 'subtitulo_seccion', 'Tu transformación en 3 simples pasos');

    $steps = [];
    for ($i=1;$i<=3;$i++){
        $steps[] = [
            'n'   => $i,
            'tit' => $cv($sec, "step_{$i}_titulo",  match($i){1=>'Inscríbete',2=>'Entrena',3=>'Transforma'}),
            'txt' => $cv($sec, "step_{$i}_descripcion", ''),
        ];
    }
@endphp

<section class="how-works-section">
    <div class="container">
        <h2 class="section-title">{{ $tit }}</h2>
        <p class="section-subtitle">{{ $sub }}</p>

        <div class="steps-container">
            @foreach($steps as $s)
            <div class="step-card">
                <div class="step-number">{{ $s['n'] }}</div>
                <h4>{{ $s['tit'] }}</h4>
                @if(!empty($s['txt'])) <p>{{ $s['txt'] }}</p> @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Benefits Section -->
@php
    $sec = 'benefits';

    $benefits = [];
    for ($i=1;$i<=3;$i++){
        $benefits[] = [
            'icon' => $cv($sec, "benefit_{$i}_icono", match($i){1=>'fas fa-trophy',2=>'fas fa-heart',3=>'fas fa-gift'}),
            'tit'  => $cv($sec, "benefit_{$i}_titulo", match($i){1=>'Resultados Reales',2=>'Comunidad de Apoyo',3=>'Premios Increíbles'}),
            'txt'  => $cv($sec, "benefit_{$i}_descripcion", ''),
        ];
    }

    $tText   = $cv($sec, 'testimonial_texto', 'El Move Challenge cambió mi vida completamente. No solo perdí peso, sino que gané confianza, energía y una nueva perspectiva sobre el bienestar integral.');
    $tAutor  = $cv($sec, 'testimonial_autor', 'María González');
    $tDet    = $cv($sec, 'testimonial_detalle', 'Move Challenge Enero 2025');
    $tAvatar = $cv($sec, 'testimonial_avatar', null);
@endphp

<section class="benefits-section">
    <div class="container">
        <div class="benefits-container">
            <div class="benefits-list">
                @foreach($benefits as $b)
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="{{ $b['icon'] }}"></i></div>
                    <div class="benefit-text">
                        <h5>{{ $b['tit'] }}</h5>
                        @if(!empty($b['txt'])) <p>{{ $b['txt'] }}</p> @endif
                    </div>
                </div>
                @endforeach
            </div>

            <div class="testimonial-card-move">
                <i class="fas fa-quote-left"></i>
                <p>{!! nl2br(e($tText)) !!}</p>

                <div class="testimonial-author">
                    <div
                        class="testimonial-avatar"
                        style="
                        width:72px; height:72px; 
                        border-radius:50%;
                        background-image:url('{{ $tAvatar ? asset($tAvatar) : asset('images/sinfondo.png') }}');
                        background-size:cover; 
                        background-position:center; 
                        background-repeat:no-repeat;
                        flex-shrink:0;"
                    ></div>
                    <div class="testimonial-author-info">
                        <h6>{{ $tAutor }}</h6>
                        <small>{{ $tDet }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- CTA Section -->
@php
    $sec = 'cta_move';
    $tit = $cv($sec, 'titulo', '¿Lista/o para comenzar tu transformación?');
    $sub = $cv($sec, 'subtitulo', 'Únete al próximo Move Challenge y descubre todo lo que puedes lograr en 30 días');
    $bTx = $cv($sec, 'boton_texto', 'Quiero mi Cupo');
    $bUrl = $cv($sec, 'boton_url', (Route::has('contact') ? route('contact') : '#contact'));
@endphp

<section class="cta-move-section">
    <div class="container">
        <div class="cta-move-content">
            <h2>{{ $tit }}</h2>
            <p>{{ $sub }}</p>
            <a href="{{ $bUrl }}" class="btn-white-cta">
                {{ $bTx }} <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>


<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .testimonial-avatar{
        width:72px;
        height:72px;
        border-radius:50%;
        background-size:cover;
        background-position:center;
        background-repeat:no-repeat;
        flex-shrink:0;
    }
</style>

@endsection