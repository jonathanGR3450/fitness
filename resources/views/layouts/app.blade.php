<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #F055A5;     /* Steel Pink - color principal de la marca */
            --secondary-color: #7A88FE;   /* Tropical Indigo */
            --text-color: #333333;
            --light-color: #F8F9FA;
            --accent-orange: #FF9B28;     /* Princeton Orange */
            --accent-green: #CCD537;      /* Pear */
            --steel-pink-dark: #B8437D;   /* Steel Pink 50% más oscuro para detalles */
        }
        
body {
    position: relative;
    background-image: url('/images/animal.jpg');
    background-repeat: repeat;
    background-size: 300px;
    background-attachment: fixed;
}

/* Overlay semitransparente para suavizar */
body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.38);  /* ⬅️ Ajusta el último valor */
    z-index: -1;
    pointer-events: none;
}

        
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(240, 85, 165, 0.1);
            position: fixed;
            left: 0;
            right: 0;
            z-index: 1030;
            transition: all 0.3s ease;
        }
        
        .navbar.show {
            top: 0; /* Visible cuando tiene la clase 'show' */
        }
        
        .navbar-brand img {
            height: 60px;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--text-color);
            margin: 0 10px;
        }
        
        .nav-link:hover {
            color: var(--primary-color);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--steel-pink-dark) 100%);
            border: none;
            padding: 12px 24px;
            font-weight: 600;
            border-radius: 25px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(240, 85, 165, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(240, 85, 165, 0.4);
            background: linear-gradient(135deg, var(--steel-pink-dark) 0%, var(--primary-color) 100%);
        }
        
        .language-buttons {
            display: flex;
            align-items: center;
        }

        .lang-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(240, 85, 165, 0.1) 0%, rgba(122, 136, 254, 0.1) 100%);
            color: var(--text-color);
            font-weight: 600;
            font-size: 0.8rem;
            margin: 0 4px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .lang-btn.active {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--steel-pink-dark) 100%);
            color: white;
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(240, 85, 165, 0.3);
        }

        .lang-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(240, 85, 165, 0.2);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .lang-btn.active:hover {
            color: white;
            border-color: transparent;
        }
        
        footer {
background: linear-gradient(135deg, #2D3748 0%, #1A202C 100%);
            color: white;
            padding: 4rem 0 2rem;
            position: relative;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--accent-orange) 50%, var(--accent-green) 100%);
        }
        
        .footer-logo {
            max-width: 200px;
            margin-bottom: 1.5rem;
        }
        
        .footer-description {
            font-size: 1rem;
            line-height: 1.6;
            opacity: 0.9;
            max-width: 300px;
        }
        
        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }
        
        .footer-links h5 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .footer-menu a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s ease;
            display: block;
        }
        
        .footer-menu a:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .social-section h5 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            justify-content: flex-start;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }
        
        .footer-bottom p {
            margin-bottom: 1rem;
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .footer-bottom a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s ease;
        }
        
        .footer-bottom a:hover {
            color: white;
        }
        
        @media (max-width: 768px) {
            footer {
                padding: 3rem 0 1.5rem;
            }
            
            .social-links {
                justify-content: center;
                margin-top: 1rem;
            }
        }

        /* Estilos para el contenido de las vistas */
        .hero {
            background-size: cover;
            background-position: center;
            min-height: 80vh;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        .hero-overlay {
            background: rgba(0,0,0,0.5);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        
        .hero-content {
            position: relative;
            z-index: 10;
            color: white;
        }
        
        h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--secondary-color);
            position: relative;
            display: inline-block;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background-color: var(--primary-color);
        }
        
        .service-card {
            text-align: center;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            transition: transform 0.3s ease;
            height: 100%;
            background: white;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
        }
        
        .service-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }
        
        .portfolio-item {
            overflow: hidden;
            border-radius: 10px;
            margin-bottom: 30px;
            position: relative;
        }
        
        .portfolio-item img {
            transition: transform 0.4s ease;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .portfolio-item:hover img {
            transform: scale(1.05);
        }
        
        .testimonial-card {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin: 1rem;
        }
        
        .testimonial-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }
        
        .cta-section {
            background-color: var(--primary-color);
            padding: 5rem 0;
            color: white;
        }
        
        .contact-form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .whatsapp-btn {
            background-color: #25D366;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            display: inline-flex;
            align-items: center;
            font-weight: 600;
            text-decoration: none;
        }
        
        .whatsapp-btn i {
            margin-right: 8px;
        }

        /* Estilos del carrusel hero */
        .hero-carousel {
            position: relative;
        }

        #heroCarousel {
            position: relative;
        }

        .hero-slide {
            height: 80vh;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
        }

        .hero-content .lead {
            font-size: 1.25rem;
            font-weight: 400;
            margin-bottom: 1.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);
        }

        .hero-content .btn-primary {
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Controles del carrusel */
        .carousel-control-prev,
        .carousel-control-next {
            width: 10%;
            opacity: 1;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            background-size: 50%;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-control-prev:hover .carousel-control-prev-icon,
        .carousel-control-next:hover .carousel-control-next-icon {
            background-color: var(--primary-color);
            transform: scale(1.1);
            transition: all 0.3s ease;
        }

        @media (max-width: 992px) {
            .language-buttons {
                margin: 15px 0;
                justify-content: center;
            }
        }

        /* Ajustes para móviles */
        @media (max-width: 768px) {
            .hero-slide {
                height: 60vh;
            }
            
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .hero-content .lead {
                font-size: 1rem;
            }
            
            .hero-content .btn-primary {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
        }

        /* Contenedor general del header */
        .site-header {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 20px rgba(240, 85, 165, 0.08);
        z-index: 1030;
        }

        /* Fila superior */
        .nav-top {
        min-height: 72px;
        }
        .brand-center {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        display: inline-block;
        }
        .cta-top {
        position: absolute;
        right: 12px;
        white-space: nowrap;
        }

        /* Fila inferior (menú) */
        .nav-bottom {
        background: rgba(255,255,255,0.95);
        border-top: 1px solid rgba(0,0,0,0.04);
        }
        .navbar-nav .nav-link {
        font-weight: 600;
        color: var(--text-color);
        padding: 0.85rem 1rem;
        }

        /* Subrayado grueso en hover/activo con color de la paleta */
        .underline-fat {
        position: relative;
        }
        .underline-fat::after {
        content: "";
        position: absolute;
        left: 12%;
        right: 12%;
        bottom: 0.35rem;
        height: 4px;                 /* grosor de la línea */
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        border-radius: 4px;
        transform: scaleX(0);
        transform-origin: center;
        transition: transform .25s ease;
        }
        .underline-fat:hover::after,
        .underline-fat:focus::after {
        transform: scaleX(1);
        }

        /* Opcional: estado "activo" si quieres marcar la sección actual */
        .navbar-nav .nav-link.active::after {
        transform: scaleX(1);
        }

        /* Ajustes móviles */
        @media (max-width: 991.98px) {
        .cta-top {                 /* ocultamos CTA grande en pantallas pequeñas */
            display: none !important;
        }
        .nav-bottom .navbar-collapse {
            padding: 0.5rem 0;
        }
        .navbar-nav .nav-link {
            text-align: center;
        }
        }

        
.video-wrapper {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(240, 85, 165, 0.2);
    border: 3px solid #F055A5;
    background: #000;
    width: 350px;
    height: 600px;
    margin: 0 auto;
}

.custom-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Hero Section con pantalla completa */
.hero-slide {
    height: 100vh;
    min-height: 100vh;
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, 
        rgba(240, 85, 165, 0.3) 0%, 
        rgba(0, 0, 0, 0.5) 100%);
}

.hero-content {
    position: relative;
    z-index: 10;
    color: white;
    animation: slideInLeft 0.8s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.hero-content h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    line-height: 1.2;
    position: relative;
}

.hero-content h1::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 0;
    height: 4px;
    background: linear-gradient(90deg, #F055A5, #7A88FE);
    border-radius: 2px;
    animation: expandLine 1s ease-out 0.5s forwards;
}

@keyframes expandLine {
    to {
        width: 120px;
    }
}

.hero-content .lead {
    font-size: 1.3rem;
    font-weight: 400;
    margin-bottom: 2rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
    max-width: 500px;
    animation: fadeIn 0.8s ease-out 0.3s both;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.hero-content .btn-primary {
    padding: 15px 35px;
    font-weight: 600;
    border-radius: 25px;
    font-size: 1.1rem;
    background: linear-gradient(135deg, #F055A5 0%, #D1477A 100%);
    border: none;
    transition: all 0.3s ease;
    animation: pulse 2s infinite;
    position: relative;
    overflow: hidden;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.02); }
}

.hero-content .btn-primary:hover {
    background: linear-gradient(135deg, #D1477A 0%, #F055A5 100%);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(240, 85, 165, 0.4);
    animation: none;
}

.hero-content .btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.6s;
}

.hero-content .btn-primary:hover::before {
    left: 100%;
}

/* Partículas fitness sutiles */
.hero-slide::before {
    content: '💪 ⭐ 💖 🔥';
    position: absolute;
    top: 20%;
    right: 10%;
    font-size: 1.5rem;
    opacity: 0.1;
    animation: floatFitness 8s ease-in-out infinite;
    z-index: 1;
    pointer-events: none;
}

@keyframes floatFitness {
    0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.1; }
    50% { transform: translateY(-20px) rotate(5deg); opacity: 0.2; }
}

/* Indicadores simples */
.carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    border: none;
    margin: 0 5px;
}

.carousel-indicators .active {
    background: #F055A5;
}

/* Controles del carrusel mejorados */
.carousel-control-prev,
.carousel-control-next {
    width: 5%;
    opacity: 1;
    z-index: 15;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 55px;
    height: 55px;
    background: rgba(240, 85, 165, 0.9);
    border-radius: 50%;
    background-size: 40%;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(240, 85, 165, 0.3);
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.carousel-control-prev-icon {
    margin-left: 20px;
}

.carousel-control-next-icon {
    margin-right: 20px;
}

.carousel-control-prev:hover .carousel-control-prev-icon,
.carousel-control-next:hover .carousel-control-next-icon {
    background: #F055A5;
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(240, 85, 165, 0.5);
    border-color: rgba(255, 255, 255, 0.4);
}

/* Animación de los controles al cargar */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    animation: slideControls 1s ease-out 1.5s both;
}

@keyframes slideControls {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.carousel-control-prev .carousel-control-prev-icon {
    animation: slideControlsLeft 1s ease-out 1.5s both;
}

@keyframes slideControlsLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .hero-slide {
        height: 70vh;
    }
    
    .hero-content h1 {
        font-size: 2.5rem;
    }
    
    .hero-content .lead {
        font-size: 1.1rem;
    }

    .video-wrapper {
        width: 280px;
        height: 480px;
    }
}

    </style>
</head>

<header class="site-header sticky-top">
  <!-- Fila superior: logo centrado + CTA arriba derecha -->
  <div class="nav-top container position-relative py-2">
    <a class="brand-center" href="#">
      <img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME') }}" height="60">
    </a>

    <a href="#contacto" class="btn btn-primary cta-top d-none d-md-inline-flex">
      ÚNETE AL CHALLENGE
    </a>

    <!-- Toggler para móviles (abre/cierra el menú de la fila inferior) -->
    <button class="navbar-toggler d-lg-none position-absolute end-0 top-50 translate-middle-y"
            type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu"
            aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>

  <!-- Fila inferior: menú centrado -->
  <nav class="navbar navbar-expand-lg nav-bottom">
    <div class="container">
      <div class="collapse navbar-collapse justify-content-center" id="mainMenu">
        <ul class="navbar-nav gap-lg-2">
            <a class="nav-link underline-fat {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">Inicio</a>
            <a class="nav-link underline-fat {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Sobre mí</a>
            <a class="nav-link underline-fat {{ request()->routeIs('move') ? 'active' : '' }}" href="{{ route('move') }}">MOVE Challenge</a>
            <a class="nav-link underline-fat {{ request()->routeIs('community') ? 'active' : '' }}" href="{{ route('community') }}">Comunidad</a>
            <a class="nav-link underline-fat {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contacto</a>
            {{-- <li class="nav-item"><a class="nav-link underline-fat" href="#inicio">Inicio</a></li>
          <li class="nav-item"><a class="nav-link underline-fat" href="#nosotros">Sobre mí</a></li>
          <li class="nav-item"><a class="nav-link underline-fat" href="#servicios">MOVE Challenge</a></li>
          <li class="nav-item"><a class="nav-link underline-fat" href="#testimonios">Comunidad</a></li>
          <li class="nav-item"><a class="nav-link underline-fat" href="#contacto">Contacto</a></li> --}}
        </ul>
      </div>
    </div>
  </nav>
</header>


<body>
    {{-- <nav class="navbar navbar-expand-lg sticky-top show">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME') }}" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Sobre mí</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicios">MOVE Challenge</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonios">Comunidad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                </ul>
                
                <a href="#contacto" class="btn btn-primary ms-3">Únete al Challenge</a>
            </div>
        </div>
    </nav> --}}

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="{{ asset('images/logo_blanco.png') }}" alt="{{ env('APP_NAME') }}" class="footer-logo">
                    <p class="footer-description">Transformando vidas a través del movimiento consciente.</p>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="footer-links">
                        <h5>Enlaces rápidos</h5>
                        <div class="footer-menu">
                            <a href="#inicio">Inicio</a>
                            <a href="#nosotros">Sobre mí</a>
                            <a href="#servicios">MOVE Challenge</a>
                            <a href="#testimonios">Comunidad</a>
                            <a href="#contacto">Contacto</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="social-section">
                        <h5>Síguenos</h5>
                        <div class="social-links">
                            <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
                            <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>Copyright {{ env('APP_NAME') }} © 2025</p>
                <div>
                    <a href="#">Política de privacidad</a> | 
                    <a href="#">Términos y condiciones</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para mostrar navbar al hacer scroll -->
    {{-- <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Mostrar navbar después de hacer scroll de 100px
            if (scrollTop > 100) {
                navbar.classList.add('show');
            } else {
                navbar.classList.remove('show');
            }
        });
    </script> --}}
</body>
</html>