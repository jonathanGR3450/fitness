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
            --primary-color: #F055A5;     /* Steel Pink */
            --secondary-color: #7A88FE;   /* Tropical Indigo */
            --text-color: #333333;
            --light-color: #F8F9FA;
            --accent-orange: #FF9B28;     /* Princeton Orange */
            --accent-green: #CCD537;      /* Pear - Verde del manual */
            --steel-pink-dark: #B8437D;   /* Steel Pink 50% más oscuro */
        }
        
body {
    position: relative;
    background-image: url('/images/2.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.38);
    z-index: -1;
    pointer-events: none;
}

        
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(240, 85, 165, 0.1);
            padding: 0.75rem 0;
        }
        
        .navbar-brand img {
            height: 60px;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }
        
        .nav-link {
            font-weight: 600;
            color: var(--text-color);
            margin: 0 0.5rem;
            padding: 0.85rem 1rem;
            transition: color 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            color: var(--primary-color);
        }

        /* Subrayado animado */
        .nav-link::after {
            content: "";
            position: absolute;
            left: 12%;
            right: 12%;
            bottom: 0.35rem;
            height: 4px;
             background: #410445;
            border-radius: 4px;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.25s ease;
        }

        .nav-link:hover::after,
        .nav-link:focus::after,
        .nav-link.active::after {
            transform: scaleX(1);
        }

        /* Botón CTA VERDE según manual de marca */
    .btn-primaryy {
        display: inline-block;
        padding: 16px 40px;
        background: #410445;  /* Verde del manual */
        color: #e4e4e4ff;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(204, 213, 55, 0.3);
    }
        
        .btn-primaryy:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(204, 213, 55, 0.5);
            background: linear-gradient(135deg, #A8B030 0%, var(--accent-green) 100%);
            color: #e4e4e4ff !important;
        }

        /* Botón toggler personalizado */
        .navbar-toggler {
            border: 2px solid var(--primary-color);
            padding: 0.5rem 0.75rem;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(240, 85, 165, 0.25);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgb(240, 85, 165)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
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
            background: white;
            color: #333333;
            padding: 4rem 0 2rem;
            position: relative;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.05);
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
            color: #666666;
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
            color: #333333;
        }
        
        .footer-menu a {
            color: #666666;
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: block;
        }
        
        .footer-menu a:hover {
            color: var(--primary-color);
            transform: translateX(5px);
        }
        
        .social-section h5 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            font-weight: 600;
            color: #333333;
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
            background: #410445;
            border-radius: 50%;
            color: white;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .social-links a:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .footer-bottom p {
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #666666;
        }
        
        .footer-bottom a {
            color: #666666;
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s ease;
        }
        
        .footer-bottom a:hover {
            color: var(--primary-color);
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

            .navbar-collapse {
                margin-top: 1rem;
                padding: 1rem 0;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
            }

            .navbar-nav {
                text-align: center;
                margin-bottom: 1rem;
            }

            .btn-primary {
                width: 100%;
                text-align: center;
            }
        }

        /* Hero Section */
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

        /* Hero carousel styles */
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
        }

        .hero-content .lead {
            font-size: 1.3rem;
            font-weight: 400;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
            max-width: 500px;
        }

        /* Controles del carrusel mejorados con verde */
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
            background: rgba(204, 213, 55, 0.9); /* Verde del manual */
            border-radius: 50%;
            background-size: 40%;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(204, 213, 55, 0.4);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .carousel-control-prev:hover .carousel-control-prev-icon,
        .carousel-control-next:hover .carousel-control-next-icon {
            background: var(--accent-green);
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(204, 213, 55, 0.6);
        }

        /* Indicadores */
        .carousel-indicators [data-bs-target] {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            margin: 0 5px;
        }

        .carousel-indicators .active {
            background: var(--accent-green); /* Verde del manual */
        }

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

<body>
    <!-- NAVBAR LINEAL: Logo izquierda, Menú centro, Botón derecha -->
    <header class="site-header sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo a la izquierda -->
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME') }}">
                </a>

                <!-- Botón hamburguesa para móviles -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu"
                        aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menú central y botón derecho -->
                <div class="collapse navbar-collapse" id="mainMenu">
                    <!-- Menú centrado -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" 
                               href="{{ route('welcome') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" 
                               href="{{ route('about') }}">Sobre mí</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('move') ? 'active' : '' }}" 
                               href="{{ route('move') }}">MOVE Challenge</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('community') ? 'active' : '' }}" 
                               href="{{ route('community') }}">Programas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" 
                               href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" 
                               href="{{ route('contact') }}">Contacto</a>
                        </li>
                    </ul>

                    <!-- Botón CTA VERDE a la derecha -->
                    <a href="{{ route('contact') }}" class="btn btn-primaryy ms-lg-3">
                        ÚNETE AL CHALLENGE
                    </a>
                </div>
            </div>
        </nav>
    </header>

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
                            <a href="{{ route('welcome') }}">Inicio</a>
                            <a href="{{ route('about') }}">Sobre mí</a>
                            <a href="{{ route('move') }}">MOVE Challenge</a>
                            <a href="{{ route('community') }}">Programas</a>
                            <a href="{{ route('contact') }}">Contacto</a>
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

</body>
</html>