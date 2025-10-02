<!-- Header & Navigation -->
@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<!-- Hero Section -->
@include('partials.hero')


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