<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     @if($global && $global->favicon)
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $global->favicon) }}">
    @endif
    
    <!-- Meta Tags SEO -->
    <title>{{ $global && $global->meta_title ? $global->meta_title : 'Kitchen Design Company' }}</title>
    <meta name="description" content="{{ $global && $global->meta_description ? $global->meta_description : 'Professional kitchen design services' }}">
    <meta name="keywords" content="{{ $global && $global->meta_keywords ? $global->meta_keywords : 'kitchen, design, cabinets' }}">
    <meta name="author" content="{{ $global && $global->meta_author ? $global->meta_author : 'Your Company' }}">
    <meta name="robots" content="{{ $global && $global->meta_robots ? $global->meta_robots : 'index,follow' }}">
    
    @if($global && $global->canonical_url)
        <link rel="canonical" href="{{ $global->canonical_url }}">
    @endif


    <!-- <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}"> -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
     </head>
    <style>
        :root {
            --primary-color: #FF9B28;     /* Princeton Orange */
            --secondary-color: #7A88FE;  /* Tropical Indigo */
            --text-color: #333333;       /* Neutral dark for legibility */
            --light-color: #F8F9FA;      /* Light background */
            --accent-pink: #F055A5;      /* Steel Pink */
            --accent-green: #CCD537;     /* Pear */
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
        }
        
   .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed; /* Cambiar de sticky-top a fixed */
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030; /* Valor alto de z-index */
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
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 20px;
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background-color: #e09a2d;
            border-color: #e09a2d;
        }
        
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
        }
        
        .whatsapp-btn i {
            margin-right: 8px;
        }
        
        footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 3rem 0 1rem;
        }
        
        .footer-menu a {
            color: #ccc;
            margin: 0 10px;
            text-decoration: none;
        }
        
        .social-links a {
            color: white;
            margin: 0 10px;
            font-size: 1.5rem;
        }
        
        .footer-bottom {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        /* Estilos mejorados para el carrusel hero */
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

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

.hero-content {
    position: relative;
    z-index: 10;
    color: white;
    padding: 2rem 0;
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
/* Mejorar los controles del carrusel */
.carousel-control-prev,
.carousel-control-next {
    width: 10%; /* Aumenta el ancho del área clickeable */
    opacity: 1; /* Mayor visibilidad */
}

/* Hacer que el icono sea más grande y visible */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 40px;
    height: 40px;
    background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro para mejor visibilidad */
    border-radius: 50%; /* Forma circular */
    background-size: 50%; /* Ajusta el tamaño del icono dentro del círculo */
    padding: 15px; /* Aumenta el área de clic */
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Efecto hover para mejor experiencia de usuario */
.carousel-control-prev:hover .carousel-control-prev-icon,
.carousel-control-next:hover .carousel-control-next-icon {
    background-color: var(--primary-color); /* Usar el color principal al pasar el cursor */
    transform: scale(1.1); /* Efecto de agrandamiento */
    transition: all 0.3s ease;
}

/* Asegurar que el botón completo sea clickeable */
.carousel-control-prev button,
.carousel-control-next button {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    cursor: pointer;
}

/* Estilos para el selector de idioma */
/* Estilo para botones de idioma directos */
/* Estilos para los botones de idioma */
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
    background-color: #f0f0f0;
    color: var(--text-color);
    font-weight: 600;
    font-size: 0.8rem;
    margin: 0 4px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.lang-btn.active {
    background-color: var(--primary-color);
    color: white;
}

.lang-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    color: var(--text-color);
}

.lang-btn.active:hover {
    color: white;
}

/* Ajustes responsivos */
@media (max-width: 992px) {
    .language-buttons {
        margin: 15px 0;
        justify-content: center;
    }
}
/* Ajustes para dispositivos móviles */
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
    </style>


<body>
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME') }}" height="60">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#inicio">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#servicios">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portafolio">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonios">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">Contact Us</a>
                </li>
            </ul>
            
            <!-- Simple and elegant language buttons -->
        <div class="language-buttons ms-3 d-flex">
    <a href="{{ route('welcome') }}" class="lang-btn {{ Request::is('welcome') ? 'active' : '' }}" title="Español">
        ES
    </a>
    <a href="{{ route('home-english') }}" class="lang-btn {{ Request::is('/') || Request::is('home-english') ? 'active' : '' }}" title="English">
        EN
    </a>
</div>

            
            <a href="#contacto" class="btn btn-primary ms-3">Request Your Free Design</a>
        </div>
    </div>
</nav>
    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="{{ asset('images/logo_blanco.png') }}" alt="{{ env('APP_NAME') }}" height="160">
                <p class="mt-3">Transforming kitchen spaces into homes with personality.</p>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0 text-lg-center">
                <h5>Quick Links</h5>
                <div class="footer-menu mt-3">
                    <a href="#inicio">Home</a>
                    <a href="#servicios">Services</a>
                    <a href="#portafolio">Portfolio</a>
                    <a href="#testimonios">Testimonials</a>
                    <a href="#contacto">Contact</a>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end">
                <h5>Follow Us</h5>
              <div class="social-links mt-3">
                @if(!empty($global->link_facebook))
                    <a href="{{ $global->link_facebook }}" target="_blank"><i class="fab fa-facebook"></i></a>
                @endif
                @if(!empty($global->link_instagram))
                    <a href="{{ $global->link_instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                @endif
                @if(!empty($global->link_pinterest))
                    <a href="{{ $global->link_pinterest }}" target="_blank"><i class="fab fa-pinterest"></i></a>
                @endif
                {{-- Puedes agregar Houzz u otras redes aquí si en un futuro las agregas en la tabla --}}
            </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p>Copyright {{ env('APP_NAME') }} LLC © 2025</p>
            <div>
                <a href="#" class="text-white-50">Privacy Policy</a> | 
                <a href="#" class="text-white-50">Terms and Conditions</a>
            </div>
        </div>
    </div>
</footer>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>