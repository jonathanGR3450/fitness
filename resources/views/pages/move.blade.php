@extends('layouts.app')
@section('seo')
  @include('partials.seo', ['slug' => 'move'])
@endsection
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
    
    :root {
        --purple-dark: #410445;      /* Púrpura oscuro - PROMINENTE */
        --purple-medium: #A5158C;    /* Púrpura medio */
        --pink-bright: #FF2DF1;      /* Fucsia brillante */
        --yellow: #F6DC43;           /* Amarillo */
        --green: #CCD537;            /* Verde */
        --cream-text: #ffeac5;       /* Texto crema - NUEVO */
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

    /* Wave Divider - ACTUALIZADO CON COLOR CORRECTO */
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

    /* Move Hero Section - FONDO TRANSPARENTE */
    .move-hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        background: transparent; /* Cambiado para ver el fondo púrpura */
        padding: 160px 0 100px;
        overflow: hidden;
    }

    /* Formas orgánicas de fondo - MÁS SUTILES */
    .move-hero::before {
        content: '';
        position: absolute;
        top: -10%;
        right: -5%;
        width: 500px;
        height: 500px;
        background: var(--green);
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        opacity: 0.05; /* Más sutil */
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
        opacity: 0.04; /* Más sutil */
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

    /* TEXTO EN CREMA */
    .move-hero-content h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        color: var(--cream-text); /* Cambiado a crema */
        margin-bottom: 24px;
        line-height: 1.1;
    }

    .move-hero-content .highlight {
        color: var(--yellow); /* Color de acento */
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
        color: var(--cream-text); /* Cambiado a crema */
        margin-bottom: 32px;
        line-height: 1.7;
        opacity: 0.95;
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

    /* Patrón de colores para stats */
    .stat-inline-item:nth-child(1) .stat-inline-number {
        color: var(--pink-bright);
    }

    .stat-inline-item:nth-child(2) .stat-inline-number {
        color: var(--green);
    }

    .stat-inline-item:nth-child(3) .stat-inline-number {
        color: var(--yellow);
    }

    .stat-inline-label {
        font-size: 0.95rem;
        color: var(--cream-text); /* Cambiado a crema */
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        opacity: 0.9;
    }

    /* Card con glassmorphism */
    .floating-info-card {
        position: relative;
        background: rgba(45, 27, 61, 0.5); /* Glassmorphism como las otras páginas */
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 234, 197, 0.1);
        padding: 40px;
        border-radius: 30px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
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
        color: var(--cream-text); /* Cambiado a crema */
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
        color: var(--cream-text); /* Cambiado a crema */
        font-size: 0.95rem;
        border-bottom: 1px solid rgba(255, 234, 197, 0.15);
        opacity: 0.9;
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
        padding: 16px 32px;
        background: var(--pink-bright);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        text-align: center;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-primary-move:hover {
        background: var(--purple-medium);
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(255, 45, 241, 0.3);
    }

    .card-footer-text {
        text-align: center;
        font-size: 0.85rem;
        color: var(--cream-text); /* Cambiado a crema */
        margin-top: 15px;
        opacity: 0.8;
    }

    .card-footer-text i {
        color: var(--yellow);
    }

    /* Buttons hero */
    .buttons-hero {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn-hero-primary {
        padding: 16px 40px;
        background: var(--pink-bright);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        border: none;
    }

    .btn-hero-primary:hover {
        background: var(--purple-medium);
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(255, 45, 241, 0.3);
    }

    .btn-hero-secondary {
        padding: 16px 40px;
        background: transparent;
        color: var(--cream-text);
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        border: 2px solid rgba(255, 234, 197, 0.3);
    }

    .btn-hero-secondary:hover {
        background: rgba(255, 234, 197, 0.1);
        border-color: var(--cream-text);
    }

    /* About Move Section - FONDO TRANSPARENTE */
    .about-move-section {
        padding: 100px 0;
        background: transparent; /* Cambiado */
        position: relative;
    }

    .about-move-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
    }

    /* Video Container */
    .video-container-move {
        position: relative;
        width: 100%;
        padding-top: 75%;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    .video-organic-shape {
        position: absolute;
        top: -20px;
        right: -20px;
        width: 200px;
        height: 200px;
        background: var(--yellow);
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        opacity: 0.15;
        animation: morph 10s ease-in-out infinite;
    }

    .video-container-move video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 30px;
    }

    /* About Content */
    .about-move-content {
        padding: 0 20px;
    }

    .section-badge {
        display: inline-block;
        padding: 10px 24px;
        background: var(--pink-bright);
        color: white;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .about-move-content h2 {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        color: var(--cream-text); /* Cambiado a crema */
        margin-bottom: 25px;
        line-height: 1.2;
    }

    .about-move-content p {
        font-size: 1.1rem;
        color: var(--cream-text); /* Cambiado a crema */
        line-height: 1.8;
        margin-bottom: 20px;
        opacity: 0.9;
    }

    /* Values Grid Small */
    .values-grid-small {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-top: 30px;
    }

    .value-box-small {
        padding: 20px;
        background: rgba(45, 27, 61, 0.4); /* Glassmorphism sutil */
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 234, 197, 0.1);
        border-radius: 20px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .value-box-small:hover {
        background: rgba(45, 27, 61, 0.6);
        transform: translateY(-5px);
    }

    .value-box-small i {
        font-size: 2rem;
        margin-bottom: 10px;
        display: block;
    }

    /* Patrón de colores para íconos */
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
        color: var(--cream-text); /* Cambiado a crema */
        margin: 0;
    }

    /* Includes Section - FONDO TRANSPARENTE */
    .includes-section {
        padding: 100px 0;
        background: transparent;
        position: relative;
    }

    .section-title {
        text-align: center;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        color: var(--cream-text); /* Cambiado a crema */
        margin-bottom: 15px;
    }

    .section-subtitle {
        text-align: center;
        font-size: 1.2rem;
        color: var(--cream-text); /* Cambiado a crema */
        margin-bottom: 60px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        opacity: 0.9;
    }

    .includes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    /* Cards con glassmorphism */
    .include-card {
        padding: 40px 30px;
        background: rgba(45, 27, 61, 0.5); /* Glassmorphism */
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 234, 197, 0.1);
        border-radius: 25px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .include-card:hover {
        transform: translateY(-10px);
        background: rgba(45, 27, 61, 0.7);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
    }

    .include-card-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 25px;
        background: rgba(255, 234, 197, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .include-card-icon i {
        font-size: 2rem;
    }

    /* Patrón de colores para los 6 íconos */
    .include-card:nth-child(1) .include-card-icon {
        background: rgba(65, 4, 69, 0.2);
    }
    .include-card:nth-child(1) .include-card-icon i {
        color: var(--purple-dark);
    }

    .include-card:nth-child(2) .include-card-icon {
        background: rgba(255, 45, 241, 0.2);
    }
    .include-card:nth-child(2) .include-card-icon i {
        color: var(--pink-bright);
    }

    .include-card:nth-child(3) .include-card-icon {
        background: rgba(204, 213, 55, 0.2);
    }
    .include-card:nth-child(3) .include-card-icon i {
        color: var(--green);
    }

    .include-card:nth-child(4) .include-card-icon {
        background: rgba(246, 220, 67, 0.2);
    }
    .include-card:nth-child(4) .include-card-icon i {
        color: var(--yellow);
    }

    .include-card:nth-child(5) .include-card-icon {
        background: rgba(65, 4, 69, 0.2);
    }
    .include-card:nth-child(5) .include-card-icon i {
        color: var(--purple-dark);
    }

    .include-card:nth-child(6) .include-card-icon {
        background: rgba(255, 45, 241, 0.2);
    }
    .include-card:nth-child(6) .include-card-icon i {
        color: var(--pink-bright);
    }

    .include-card h4 {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--cream-text); /* Cambiado a crema */
        margin-bottom: 15px;
    }

    .include-card p {
        color: var(--cream-text); /* Cambiado a crema */
        font-size: 0.95rem;
        line-height: 1.6;
        opacity: 0.85;
    }

    /* How Works Section - FONDO TRANSPARENTE */
    .how-works-section {
        padding: 100px 0;
        background: transparent;
    }

    .steps-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 40px;
        margin-top: 60px;
    }

    .step-card {
        text-align: center;
        padding: 40px 30px;
        background: rgba(45, 27, 61, 0.5); /* Glassmorphism */
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 234, 197, 0.1);
        border-radius: 25px;
        transition: all 0.3s ease;
        position: relative;
    }

    .step-card:hover {
        transform: translateY(-10px);
        background: rgba(45, 27, 61, 0.7);
    }

    .step-number {
        width: 70px;
        height: 70px;
        margin: 0 auto 25px;
        background: linear-gradient(135deg, var(--pink-bright), var(--purple-medium));
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 700;
    }

    .step-card h4 {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--cream-text); /* Cambiado a crema */
        margin-bottom: 15px;
    }

    .step-card p {
        color: var(--cream-text); /* Cambiado a crema */
        font-size: 0.95rem;
        line-height: 1.6;
        opacity: 0.85;
    }

    /* Benefits Section */
    .benefits-section {
        padding: 100px 0;
        background: rgba(255, 234, 197, 0.03); /* Fondo muy sutil */
    }

    .benefits-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .benefits-list {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .benefit-item {
        display: flex;
        gap: 20px;
        align-items: flex-start;
    }

    .benefit-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    /* Patrón de colores para benefits */
    .benefit-item:nth-child(1) .benefit-icon {
        background: rgba(255, 45, 241, 0.15);
    }
    .benefit-item:nth-child(1) .benefit-icon i {
        color: var(--pink-bright);
        font-size: 1.5rem;
    }

    .benefit-item:nth-child(2) .benefit-icon {
        background: rgba(204, 213, 55, 0.15);
    }
    .benefit-item:nth-child(2) .benefit-icon i {
        color: var(--green);
        font-size: 1.5rem;
    }

    .benefit-item:nth-child(3) .benefit-icon {
        background: rgba(246, 220, 67, 0.15);
    }
    .benefit-item:nth-child(3) .benefit-icon i {
        color: var(--yellow);
        font-size: 1.5rem;
    }

    .benefit-text h5 {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--cream-text); /* Cambiado a crema */
        margin-bottom: 8px;
    }

    .benefit-text p {
        color: var(--cream-text); /* Cambiado a crema */
        font-size: 0.95rem;
        line-height: 1.6;
        opacity: 0.85;
    }

    /* Testimonial Card con glassmorphism */
    .testimonial-card-move {
        padding: 50px;
        background: rgba(45, 27, 61, 0.6); /* Glassmorphism */
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 234, 197, 0.1);
        border-radius: 30px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        position: relative;
    }

    .testimonial-card-move i.fa-quote-left {
        font-size: 3rem;
        color: var(--pink-bright);
        opacity: 0.3;
        margin-bottom: 20px;
    }

    .testimonial-card-move p {
        font-size: 1.15rem;
        color: var(--cream-text); /* Cambiado a crema */
        line-height: 1.8;
        margin-bottom: 30px;
        font-style: italic;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .testimonial-author-info h6 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--cream-text); /* Cambiado a crema */
        margin-bottom: 5px;
    }

    .testimonial-author-info small {
        color: var(--cream-text); /* Cambiado a crema */
        font-size: 0.85rem;
        opacity: 0.7;
    }

    /* CTA Section */
    .cta-move-section {
        padding: 120px 0;
        background: linear-gradient(135deg, rgba(65, 4, 69, 0.9), rgba(165, 21, 140, 0.8));
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta-move-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 500px;
        height: 500px;
        background: var(--yellow);
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        opacity: 0.1;
        animation: morph 15s ease-in-out infinite;
    }

    .cta-move-content {
        position: relative;
        z-index: 2;
    }

    .cta-move-content h2 {
        font-size: clamp(2rem, 4vw, 3.5rem);
        font-weight: 700;
        color: white;
        margin-bottom: 20px;
    }

    .cta-move-content p {
        font-size: 1.3rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 40px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-white-cta {
        display: inline-flex;
        align-items: center;
        padding: 18px 50px;
        background: white;
        color: var(--purple-dark);
        text-decoration: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .btn-white-cta:hover {
        background: var(--yellow);
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(255, 255, 255, 0.3);
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
        .move-hero-container,
        .about-move-container,
        .benefits-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .move-hero {
            padding: 120px 0 80px;
        }

        .values-grid-small {
            grid-template-columns: 1fr;
        }

        .includes-grid,
        .steps-container {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .move-hero-content h1 {
            font-size: 2rem;
        }

        .move-hero-content p {
            font-size: 1.1rem;
        }

        .stats-inline {
            flex-direction: column;
            gap: 20px;
        }

        .floating-info-card {
            padding: 30px;
        }

        .buttons-hero {
            flex-direction: column;
        }

        .btn-hero-primary,
        .btn-hero-secondary {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- Move Hero Section -->
@php
    $moveHero = $contenidos['move_hero'] ?? collect();
    $cv = fn($key, $default=null) => optional($moveHero->get($key))->valor ?? $default;

    $badgeTxt = $cv('badge_texto', '🔥 Nuevo Reto 2025');
    $titulo   = $cv('titulo', 'Descubre tu <span class="highlight">mejor versión</span>');
    $parrafo  = $cv('parrafo', 'Un reto de 30 días que combina entrenamiento funcional, alimentación consciente y mentalidad positiva');
    
    $stat1Val = $cv('stat_1_numero', '30');
    $stat1Lab = $cv('stat_1_label', 'Días de transformación');
    $stat2Val = $cv('stat_2_numero', '500+');
    $stat2Lab = $cv('stat_2_label', 'Personas transformadas');
    $stat3Val = $cv('stat_3_numero', '100%');
    $stat3Lab = $cv('stat_3_label', 'Resultados garantizados');

    $btnTxt = $cv('boton_principal_texto', 'Únete Ahora');
    $btnUrl = $cv('boton_principal_url', (Route::has('contact') ? route('contact') : '#contact'));
    $btnSecTxt = $cv('boton_secundario_texto', 'Conoce más');
    $btnSecUrl = $cv('boton_secundario_url', '#nosotros');

    $cardBadge   = $cv('card_badge', 'Próximo Inicio');
    $cardBadgeIc = $cv('card_badge_icono', 'fas fa-calendar-alt');
    $cardTitulo  = $cv('card_titulo', 'Febrero 2025');
    $item1       = $cv('card_item_1', '4 semanas de entrenamiento');
    $item2       = $cv('card_item_2', 'Plan nutricional personalizado');
    $item3       = $cv('card_item_3', 'Sesiones de mindfulness');
    $item4       = $cv('card_item_4', 'Comunidad exclusiva');
    $cardBtnTxt  = $cv('card_boton_texto', 'Reserva tu cupo');
    $cardBtnUrl  = $cv('card_boton_url', (Route::has('contact') ? route('contact') : '#contact'));
    $cardFooter  = $cv('card_footer_texto', 'Cupos limitados disponibles');
@endphp

<section class="move-hero">
    <div class="container">
        <div class="move-hero-container">
            <div class="move-hero-content">
                <span class="badge-tag">{{ $badgeTxt }}</span>
                <h1>{!! $titulo !!}</h1>
                <p>{{ $parrafo }}</p>

                <div class="stats-inline">
                    <div class="stat-inline-item">
                        <span class="stat-inline-number">{{ $stat1Val }}</span>
                        <span class="stat-inline-label">{{ $stat1Lab }}</span>
                    </div>
                    <div class="stat-inline-item">
                        <span class="stat-inline-number">{{ $stat2Val }}</span>
                        <span class="stat-inline-label">{{ $stat2Lab }}</span>
                    </div>
                    <div class="stat-inline-item">
                        <span class="stat-inline-number">{{ $stat3Val }}</span>
                        <span class="stat-inline-label">{{ $stat3Lab }}</span>
                    </div>
                </div>

                <div class="buttons-hero">
                    <a href="{{ $btnUrl }}" class="btn-hero-primary">
                        {{ $btnTxt }} <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <a href="{{ $btnSecUrl }}" class="btn-hero-secondary">
                        {{ $btnSecTxt }} <i class="fas fa-arrow-down ms-2"></i>
                    </a>
                </div>
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