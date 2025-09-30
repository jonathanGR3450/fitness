<!-- Header & Navigation -->
@extends('layouts.app')
@section('content')

<style>
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

<!-- Hero Section -->
<section id="inicio" class="hero-carousel">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        </div>

        <!-- Slides del carrusel -->
        <div class="carousel-inner">
            <!-- Slide 1: MOVE Challenge -->
            <div class="carousel-item active">
                <div class="hero-slide" style="background-image: url('{{ asset('images/banner1.jpg') }}');">
                    <div class="hero-overlay"></div>
                    <div class="hero-content container">
                        <div class="row">
                            <div class="col-lg-8 ps-lg-5">
                                <h1>MOVE Challenge con Anabelle Ibalu</h1>
                                <p class="lead">30 días para moverte, agradecer y transformar tu energía.</p>
                                <a target="_blank" href="https://wa.link/nq2ezt" class="btn btn-primary btn-lg">
                                    Inscríbete ahora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Comunidad -->
            <div class="carousel-item">
                <div class="hero-slide" style="background-image: url('{{ asset('images/banner2.png') }}');">
                    <div class="hero-overlay"></div>
                    <div class="hero-content container">
                        <div class="row">
                            <div class="col-lg-8 ps-lg-5">
                                <h1>Una comunidad que irradia luz</h1>
                                <p class="lead">Contenido real, hábitos saludables y apoyo constante en cada paso.</p>
                                <a href="#testimonios" class="btn btn-primary btn-lg">Conoce la comunidad</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>


<!-- Sobre mí -->
<section id="nosotros" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            {{-- <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset('images/annabelle-about.jpg') }}" alt="Anabelle Ibalu - Sobre mí" class="img-fluid rounded">
            </div> --}}

            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="video-wrapper">
                    {{-- <video class="custom-video" controls poster="{{ asset('images/banner3.jpeg') }}">
                        <source src="{{ asset('video/video-promocional.mp4') }}" type="video/mp4">
                    </video> --}}
                    <video class="custom-video" controls preload="metadata" playsinline poster="{{ asset('images/banner3.jpeg') }}">
                        <source src="{{ asset('video/video-promocional.mp4') }}" type="video/mp4">
                        <source src="{{ asset('video/video-promocional.webm') }}" type="video/webm">
                        Tu navegador no soporta reproducción de video.
                    </video>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">¿Qué es el Move Challenge?</h2>
                <p class="mb-4">
                    El <strong>Move Challenge</strong> es un reto de 30 días diseñado para transformar tu vida a través del
                    movimiento. Incluye guías de entrenamiento, nutrición y herramientas prácticas para mejorar tu salud y
                    rendimiento, tanto en casa como en el gimnasio. Además, ofrece premios para los mejores resultados y una
                    comunidad de apoyo para mantener la motivación.
                </p>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-dumbbell me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div><h5 class="mb-0">Plan de entrenamiento semipersonalizados<br><small>(en casa o en el gym)</small></h5></div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-apple-alt me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div><h5 class="mb-0">Plan de alimentación que nutre tu cuerpo y tus metas<br><small>(adaptado a tus requerimientos y gustos)</small></h5></div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-utensils me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div><h5 class="mb-0">Recetas fáciles y nutritivas</h5></div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-spa me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div><h5 class="mb-0">Guía de meditación y respiración consciente</h5></div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-lightbulb me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div><h5 class="mb-0">Tips y consejos prácticos de conexión interior</h5></div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-running me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div><h5 class="mb-0">Guía de movilidad y estiramientos</h5></div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-users me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div><h5 class="mb-0">Acompañamiento de un equipo de profesionales + apoyo constante</h5></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Servicios / Qué hacemos -->
<section id="servicios" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">¿Qué encontrarás aquí?</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-running"></i></div>
                    <h4>MOVE Challenge</h4>
                    <p>Reto de 30 días con rutinas, calendario y seguimiento.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-book-open"></i></div>
                    <h4>Blog</h4>
                    <p>Deporte, nutrición y hábitos saludables que sí se sostienen.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-hands-helping"></i></div>
                    <h4>Comunidad</h4>
                    <p>Historias reales, retos, lives e integración con Instagram.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-handshake"></i></div>
                    <h4>Trabaja conmigo</h4>
                    <p>Media Kit y colaboraciones con marcas alineadas.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portafolio / Galería (testimonios visuales del reto) -->
<section id="portafolio" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Momentos del MOVE Challenge</h2>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="portfolio-item">
                    <img src="{{ asset('images/move-1.png') }}" alt="Entrenamientos MOVE" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="portfolio-item">
                    <img src="{{ asset('images/move-2.png') }}" alt="Comunidad en acción" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="portfolio-item">
                    <img src="{{ asset('images/move-3.png') }}" alt="Hábitos y nutrición" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="portfolio-item">
                    <img src="{{ asset('images/move-4.png') }}" alt="Rutinas en casa" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonios -->
<section id="testimonios" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Lo que dice la comunidad</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card">
                    <img src="{{ asset('images/testimonial-1.jpg') }}" alt="Participante 1" class="testimonial-avatar"
                         onerror="this.src='{{ asset('images/user.png') }}'">
                    <h5>María G.</h5>
                    <p class="text-muted">MOVE Challenge</p>
                    <p>"En 30 días recuperé mi energía. Las rutinas son realistas y la comunidad te sostiene."</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card">
                    <img src="{{ asset('images/testimonial-2.jpg') }}" alt="Participante 2" class="testimonial-avatar"
                         onerror="this.src='{{ asset('images/user.png') }}'">
                    <h5>Carlos R.</h5>
                    <p class="text-muted">MOVE Challenge</p>
                    <p>"La mezcla de ejercicio y gratitud diaria me cambió el chip. ¡Super recomendado!"</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card">
                    <img src="{{ asset('images/testimonial-3.jpg') }}" alt="Participante 3" class="testimonial-avatar"
                         onerror="this.src='{{ asset('images/user.png') }}'">
                    <h5>Ana M.</h5>
                    <p class="text-muted">MOVE Challenge</p>
                    <p>"Me sentí acompañada todo el tiempo. Aprendí a moverme y a comer sin culpa."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section"
    style="background-image: url('{{ asset('images/cta-bg.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container text-center">
        <h2 class="display-4 mb-4">¿Lista/o para empezar el MOVE Challenge?</h2>
        <a target="_blank" href="https://wa.link/nq2ezt" class="btn btn-light btn-lg">Quiero mi cupo</a>
    </div>
</section>

<!-- Contacto -->
<section id="contacto" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5">
                <h2 class="section-title text-center">Contacto</h2>
                <p class="lead">Escríbeme y te comparto el detalle del programa y próximos inicios.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <form class="contact-form">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nombre completo" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Correo electrónico" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" placeholder="Teléfono" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Cuéntame tu objetivo (ganar energía, bajar grasa, crear hábito, etc.)" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar mensaje</button>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="ps-lg-5">
                    <div class="mb-4">
                        <h4>Email</h4>
                        <p>hola@anabelleibalu.com</p>
                    </div>
                    <div class="mb-4">
                        <h4>Instagram</h4>
                        <p>@anabelleibalu</p>
                    </div>
                    <div class="mb-4">
                        <h4>Comunidad</h4>
                        <p>Sigue los retos y tips diarios en historias destacadas.</p>
                    </div>
                    <div>
                        <a target="_blank" href="https://wa.link/nq2ezt" class="whatsapp-btn">
                            <i class="fab fa-whatsapp"></i> Habla conmigo por WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection