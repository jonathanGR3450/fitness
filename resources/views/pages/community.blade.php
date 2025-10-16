@extends('layouts.app')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
    
    :root {
        --princeton-orange: #F6DC43;
        --steel-pink: #FF2DF1;
        --tropical-indigo: #A5158C;
        --pear: #CCD537;
        --dark-purple: #410445;
        --neutral-light: #FAF9F7;
        --neutral-cream: #F5F2ED;
        --neutral-sand: #E8E2D5;
        --neutral-white: #FFFFFF;
        --dark-text: #410445;
        --medium-text: #6C757D;
        --light-text: #9CA3AF;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Programs Hero Section */
    .programs-hero {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background: rgba(165, 21, 140, 0.05);
        padding: 180px 0 80px;
        text-align: center;
        overflow: hidden;
    }

    /* Formas orgánicas de fondo */
    .programs-hero::before {
        content: '';
        position: absolute;
        top: 10%;
        left: -5%;
        width: 400px;
        height: 400px;
        background: var(--pear);
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        opacity: 0.08;
        animation: morph 15s ease-in-out infinite;
        z-index: 1;
    }

    .programs-hero::after {
        content: '';
        position: absolute;
        bottom: 10%;
        right: -8%;
        width: 350px;
        height: 350px;
        background: var(--steel-pink);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        opacity: 0.06;
        animation: morph 12s ease-in-out infinite reverse;
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

    .programs-hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero-badge {
        display: inline-block;
        padding: 12px 32px;
        background: var(--dark-purple);
        color: white;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 24px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        animation: fadeInDown 0.8s ease-out;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .programs-hero h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        color: var(--dark-text);
        margin-bottom: 24px;
        line-height: 1.2;
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .programs-hero .highlight {
        color: var(--steel-pink);
    }

    .programs-hero p {
        font-size: 1.25rem;
        color: var(--medium-text);
        line-height: 1.7;
        margin-bottom: 40px;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    /* Programs Grid Section */
    .programs-section {
        padding: 120px 0;
        background: rgba(250, 249, 247, 0.1);
        position: relative;
    }

    .programs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 40px;
        margin-top: 60px;
    }

    /* Program Card - Estilo Silvy */
    .program-card {
        position: relative;
        height: 500px;
        border-radius: 20px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        transition: all 0.4s ease;
        opacity: 0;
        transform: translateY(50px);
    }

    /* Animación de aparición */
    .program-card.animate-in {
        animation: cardSlideIn 0.8s ease-out forwards;
    }

    @keyframes cardSlideIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .program-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
    }

    /* Imagen de fondo */
    .program-card-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .program-card:hover .program-card-image {
        transform: scale(1.1);
    }

    /* Overlay oscuro */
    .program-card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(65, 4, 69, 0.2) 0%, rgba(65, 4, 69, 0.6) 100%);
        z-index: 1;
        transition: all 0.4s ease;
    }

    .program-card:hover .program-card-overlay {
        background: linear-gradient(to bottom, rgba(65, 4, 69, 0.3) 0%, rgba(65, 4, 69, 0.1) 100%);
    }

    /* Contenido superpuesto */
    .program-card-content {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 40px 30px;
        z-index: 2;
        color: white;
    }

    .program-card-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        line-height: 1.1;
    }

    .program-card-description {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 24px;
        line-height: 1.6;
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        transition: all 0.4s ease;
    }

    .program-card:hover .program-card-description {
        max-height: 100px;
        opacity: 1;
    }

    /* Botón DESCÚBRELO */
    .btn-discover {
        display: inline-block;
        padding: 14px 36px;
        background: var(--pear);
        color: var(--dark-purple);
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        border: 2px solid var(--pear);
    }

    .btn-discover:hover {
        background: white;
        color: var(--dark-purple);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(204, 213, 55, 0.5);
    }

    /* Variantes de color para cada card */
    .program-card:nth-child(1) .btn-discover {
        background: var(--pear);
        border-color: var(--pear);
        color: var(--dark-purple);
    }

    .program-card:nth-child(1) .btn-discover:hover {
        background: white;
        color: var(--pear);
    }

    .program-card:nth-child(2) .btn-discover {
        background: var(--tropical-indigo);
        border-color: var(--tropical-indigo);
        color: white;
    }

    .program-card:nth-child(2) .btn-discover:hover {
        background: white;
        color: var(--tropical-indigo);
    }

    .program-card:nth-child(3) .btn-discover {
        background: var(--pear);
        border-color: var(--pear);
        color: var(--dark-text);
    }

    .program-card:nth-child(3) .btn-discover:hover {
        background: white;
        color: var(--pear);
    }

    .program-card:nth-child(4) .btn-discover {
        background: var(--princeton-orange);
        border-color: var(--princeton-orange);
        color: var(--dark-purple);
    }

    .program-card:nth-child(4) .btn-discover:hover {
        background: white;
        color: var(--princeton-orange);
    }

    .program-card:nth-child(5) .btn-discover {
        background: var(--steel-pink);
        border-color: var(--steel-pink);
        color: white;
    }

    .program-card:nth-child(5) .btn-discover:hover {
        background: white;
        color: var(--steel-pink);
    }

    .program-card:nth-child(6) .btn-discover {
        background: var(--pear);
        border-color: var(--pear);
        color: var(--dark-purple);
    }

    .program-card:nth-child(6) .btn-discover:hover {
        background: white;
        color: var(--pear);
    }

    /* CTA Section */
    .cta-programs-section {
        padding: 100px 0;
        background: rgba(245, 242, 237, 0.1);
        position: relative;
        text-align: center;
        overflow: hidden;
    }

    .cta-programs-content {
        position: relative;
        z-index: 2;
        max-width: 700px;
        margin: 0 auto;
    }

    .cta-programs-content h2 {
        font-size: 2.5rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 24px;
    }

    .cta-programs-content p {
        font-size: 1.25rem;
        color: var(--medium-text);
        margin-bottom: 40px;
        line-height: 1.7;
    }

    .btn-cta-primary {
        display: inline-block;
        padding: 18px 48px;
        background: var(--pear);
        color: var(--dark-purple);
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-cta-primary:hover {
        background: #b8c230;
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(204, 213, 55, 0.4);
        color: var(--dark-purple);
    }

    /* Responsive */
    @media (max-width: 968px) {
        .programs-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .program-card {
            height: 450px;
        }

        .program-card-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 640px) {
        .programs-hero {
            padding-top: 140px;
        }

        .programs-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .program-card {
            height: 100vh;
            max-height: 600px;
            border-radius: 0;
        }

        .program-card-title {
            font-size: 2.5rem;
        }

        .program-card-content {
            padding: 30px 20px;
        }

        .cta-programs-content h2 {
            font-size: 2rem;
        }
    }
</style>

@php
  $sec = fn($s)=> $contenidos[$s] ?? collect();
  $v = fn($s,$k,$d=null)=> optional($sec($s)->firstWhere('clave',$k))->valor ?? $d;

  // HERO
  $badge = $v('programs_hero','badge','Nuestros Programas');
  $titulo = $v('programs_hero','titulo','Encuentra tu <span class="highlight">Programa Ideal</span>');
  $sub = $v('programs_hero','subtitulo','Programas diseñados para cada objetivo y nivel de condición física...');

  // GRID defaults
  $defaults = [
    1=>['images/ana1.png','MOVE Challenge','30 días de transformación integral...', route('move')],
    2=>['images/ana2.png','YOGA Flow','Conecta cuerpo y mente...', '#'],
    3=>['images/ana3.png','HIIT Power','Alta intensidad...', '#'],
    4=>['images/ana4.png','Dance Fit','Baila y quema calorías...', '#'],
    5=>['images/ana5.png','Wellness 360','Bienestar integral...', '#'],
    6=>['images/ana6.png','Strong Body','Fuerza y resistencia...', '#'],
  ];
@endphp

<section class="programs-hero">
  <div class="container">
    <div class="programs-hero-content">
      <span class="hero-badge"><i class="fas fa-dumbbell me-2"></i>{{ $badge }}</span>
      <h1>{!! $titulo !!}</h1>
      <p>{{ $sub }}</p>
    </div>
  </div>
</section>

<section class="programs-section">
  <div class="container">
    <div class="programs-grid">
      @for($i=1;$i<=6;$i++)
        @php
          [$defImg,$defTit,$defDesc,$defUrl] = $defaults[$i];
          $img  = $v('programs_grid',"prog_{$i}_imagen",$defImg);
          $tit  = $v('programs_grid',"prog_{$i}_titulo",$defTit);
          $desc = $v('programs_grid',"prog_{$i}_descripcion",$defDesc);
          $url  = $v('programs_grid',"prog_{$i}_url",$defUrl);
        @endphp
        <div class="program-card" data-index="{{ $i-1 }}">
          <img src="{{ asset($img) }}" alt="{{ $tit }}" class="program-card-image" onerror="this.src='{{ asset('images/sinfondo.png') }}'">
          <div class="program-card-overlay"></div>
          <div class="program-card-content">
            <h3 class="program-card-title">{{ $tit }}</h3>
            <p class="program-card-description">{{ $desc }}</p>
            <a href="{{ $url ?: '#' }}" class="btn-discover">Descúbrelo</a>
          </div>
        </div>
      @endfor
    </div>
  </div>
</section>

@php
  $ctaTitle = $v('programs_cta','titulo','¿No sabes cuál elegir?');
  $ctaSub   = $v('programs_cta','subtitulo','Contáctame y te ayudaré a encontrar el programa perfecto...');
  $ctaTxt   = $v('programs_cta','boton_texto','Habla Conmigo');
  $ctaUrl   = $v('programs_cta','boton_url', (Route::has('contact')?route('contact'):'#'));
@endphp
<section class="cta-programs-section">
  <div class="container">
    <div class="cta-programs-content">
      <h2>{{ $ctaTitle }}</h2>
      <p>{{ $ctaSub }}</p>
      <a href="{{ $ctaUrl }}" class="btn-cta-primary">
        {{ $ctaTxt }} <i class="fas fa-arrow-right ms-2"></i>
      </a>
    </div>
  </div>
</section>


<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- JavaScript para animación en scroll -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.program-card');
    
    // Intersection Observer para animar cards al hacer scroll
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = parseInt(entry.target.dataset.index) * 150; // Delay escalonado
                setTimeout(() => {
                    entry.target.classList.add('animate-in');
                }, delay);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    cards.forEach(card => {
        observer.observe(card);
    });
});
</script>

@endsection