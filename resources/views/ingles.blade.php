<!-- Header & Navigation -->
   @extends('layouts.app_ingles')
@section('content')

    <!-- Hero Section -->
<section id="inicio" class="hero-carousel">
    <!-- Simple and robust Bootstrap carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
        </div>
        
        <!-- Carousel slides -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="hero-slide" style="background-image: url('{{ $contenido->img_hero_carrusel_1 ? asset('storage/' . $contenido->img_hero_carrusel_1) : asset('images/banner1.jpg') }}');">
                    <div class="hero-overlay"></div>
                    <div class="hero-content container">
                        <div class="row">
                            <div class="col-lg-8 ps-lg-5">
                                <h1>{{ $contenido->h1_hero_carrusel_1 ?: 'We Design Your Dream Kitchen Before Installation' }}</h1>
                                <p class="lead mb-4">{{ $contenido->p_hero_carrusel_1 ?: 'Visualize it in 3D and experience it in virtual reality.' }}</p>
                                <a href="{{ $contenido->a_hero_carrusel_1 ?: '#contacto' }}" class="btn btn-primary btn-lg">Schedule Your Design</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="hero-slide" style="background-image: url('{{ $contenido->img_hero_carrusel_2 ? asset('storage/' . $contenido->img_hero_carrusel_2) : asset('images/banner2.png') }}');">
                    <div class="hero-overlay"></div>
                    <div class="hero-content container">
                        <div class="row">
                            <div class="col-lg-8 ps-lg-5">
                                <h1>{{ $contenido->h1_hero_carrusel_2 ?: 'Modern Kitchens Adapted to Your Space' }}</h1>
                                <p class="lead mb-4">{{ $contenido->p_hero_carrusel_2 ?: 'Smart solutions and high-quality materials.' }}</p>
                                <a href="{{ $contenido->a_hero_carrusel_2 ?: '#contacto' }}" class="btn btn-primary btn-lg">Discover More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<!-- About Us Section -->
<section id="nosotros" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ $contenido->img_about_us ? asset('storage/' . $contenido->img_about_us) : asset('images/architect.jpg') }}" 
                     alt="About {{ env('APP_NAME') }}" 
                     class="img-fluid rounded">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">{{ $contenido->h2_about_us ?: 'Design with purpose. Service with heart.' }}</h2>
                <p class="mb-4">{{ $contenido->p_about_us ?: 'At ' . env('APP_NAME') . ' we combine technology, creativity and professional execution to transform kitchens into functional, modern and personalized spaces. We believe a kitchen should adapt to your lifestyle, not the other way around.' }}</p>
                
                <div class="row">
                    <!-- Característica 1 -->
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="{{ $contenido->i__about_us_1 ?: 'fas fa-vr-cardboard' }} text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h5>{{ $contenido->h5__about_us_1 ?: '3D Visualization + Virtual Reality' }}</h5>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Característica 2 -->
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="{{ $contenido->i__about_us_2 ?: 'fas fa-tools' }} text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h5>{{ $contenido->h5__about_us_2 ?: 'Supervised installation from start to finish' }}</h5>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Característica 3 -->
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="{{ $contenido->i__about_us_3 ?: 'fas fa-handshake' }} text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h5>{{ $contenido->h5__about_us_3 ?: 'Personal, direct and transparent approach' }}</h5>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Característica 4 -->
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="{{ $contenido->i__about_us_4 ?: 'fas fa-lightbulb' }} text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h5>{{ $contenido->h5__about_us_4 ?: 'Real solutions, not just cabinets' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="servicios" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">{{ $contenido->h2_services ?: 'What we do for you?' }}</h2>
        </div>
        <div class="row">
            <!-- Servicio 1 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="{{ $contenido->i_services_1 ?: 'fas fa-drafting-compass' }}"></i>
                    </div>
                    <h4>{{ $contenido->h4__services_1 ?: '3D Kitchen Design' }}</h4>
                    <p>{{ $contenido->p__services_1 ?: 'We view your space together and design your ideal kitchen.' }}</p>
                </div>
            </div>
            
            <!-- Servicio 2 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="{{ $contenido->i_services_2 ?: 'fas fa-vr-cardboard' }}"></i>
                    </div>
                    <h4>{{ $contenido->h4__services_2 ?: 'Virtual Reality Tour' }}</h4>
                    <p>{{ $contenido->p__services_2 ?: 'Experience it before you buy.' }}</p>
                </div>
            </div>
            
            <!-- Servicio 3 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="{{ $contenido->i_services_3 ?: 'fas fa-comments' }}"></i>
                    </div>
                    <h4>{{ $contenido->h4__services_3 ?: 'Personalized Consultation' }}</h4>
                    <p>{{ $contenido->p__services_3 ?: 'We guide you step by step in materials, layout and style.' }}</p>
                </div>
            </div>
            
            <!-- Servicio 4 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="{{ $contenido->i_services_4 ?: 'fas fa-hammer' }}"></i>
                    </div>
                    <h4>{{ $contenido->h4__services_4 ?: 'Supervised Installation' }}</h4>
                    <p>{{ $contenido->p__services_4 ?: 'We accompany you throughout the entire process until the end.' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section id="portafolio" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">{{ $contenido->h2_portfolio ?: 'Real inspiration for your next kitchen' }}</h2>
        </div>
        <div class="row">
            @for ($i = 1; $i <= 4; $i++)
                @php
                    // Obtener imagen desde BD o usar imagen por defecto
                    $imagen = $contenido->{'img_portfolio_' . $i} ?? '';
                    $imagenUrl = $imagen ? asset('storage/' . $imagen) : asset('images/move-' . $i . '.jpg');
                    
                    // Generar alt text dinámico
                    $altText = "Kitchen Design $i";
                @endphp
                
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="portfolio-item position-relative overflow-hidden">
                        <img src="{{ $imagenUrl }}" 
                             alt="{{ $altText }}" 
                             class="img-fluid w-100"
                             loading="lazy"
                             style="height: 300px; object-fit: cover; transition: transform 0.3s ease;">
                        
                        <!-- Overlay con efecto hover -->
                        <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 
                                    d-flex align-items-center justify-content-center
                                    bg-dark bg-opacity-50 opacity-0"
                             style="transition: opacity 0.3s ease;">
                            <div class="text-center text-white">
                                <i class="fas fa-search-plus fa-2x mb-2"></i>
                                <p class="mb-0">{{ $altText }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    
    <!-- CSS para efectos hover -->
    <style>
        .portfolio-item:hover img {
            transform: scale(1.05);
        }
        
        .portfolio-item:hover .portfolio-overlay {
            opacity: 1 !important;
        }
        
        .portfolio-item {
            cursor: pointer;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease;
        }
        
        .portfolio-item:hover {
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
    </style>
</section>

<!-- Testimonials Section -->
<section id="testimonios" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">{{ $contenido->h2_testimonials ?: 'What our clients say' }}</h2>
        </div>
        <div class="row">
            <!-- Testimonio 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card">
                    <img src="{{ $contenido->img_testimonials_1 ? asset('storage/' . $contenido->img_testimonials_1) : asset('images/testimonial-1.jpg') }}" 
                         alt="Client 1" 
                         class="testimonial-avatar" 
                         onerror="this.src='{{ asset('images/user.png') }}'">
                    <h5>{{ $contenido->h5_testimonials_1 ?: 'Maria Gonzalez' }}</h5>
                    <p class="text-muted">{{ $contenido->p_testimonials_city_1 ?: 'Minneapolis, MN' }}</p>
                    <p>"{{ $contenido->p_testimonials_1 ?: 'Seeing my kitchen in 3D before installation was incredible. The final design turned out exactly as we visualized it.' }}"</p>
                </div>
            </div>
            
            <!-- Testimonio 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card">
                    <img src="{{ $contenido->img_testimonials_2 ? asset('storage/' . $contenido->img_testimonials_2) : asset('images/testimonial-2.jpg') }}" 
                         alt="Client 2" 
                         class="testimonial-avatar" 
                         onerror="this.src='{{ asset('images/user.png') }}'">
                    <h5>{{ $contenido->h5_testimonials_2 ?: 'Carlos Ramirez' }}</h5>
                    <p class="text-muted">{{ $contenido->p_testimonials_city_2 ?: 'St. Paul, MN' }}</p>
                    <p>"{{ $contenido->p_testimonials_2 ?: 'The JUFMAN team understood perfectly what we wanted and surprised us with solutions we hadn\'t considered.' }}"</p>
                </div>
            </div>
            
            <!-- Testimonio 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card">
                    <img src="{{ $contenido->img_testimonials_3 ? asset('storage/' . $contenido->img_testimonials_3) : asset('images/testimonial-3.jpg') }}" 
                         alt="Client 3" 
                         class="testimonial-avatar" 
                         onerror="this.src='{{ asset('images/user.png') }}'">
                    <h5>{{ $contenido->h5_testimonials_3 ?: 'Ana Martinez' }}</h5>
                    <p class="text-muted">{{ $contenido->p_testimonials_city_3 ?: 'Bloomington, MN' }}</p>
                    <p>"{{ $contenido->p_testimonials_3 ?: 'Professional, detail-oriented, and very committed. Our kitchen turned out spectacular and functional for the whole family.' }}"</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Call to Action -->
<section class="cta-section" style="background-image: url('{{ asset('images/cta-bg.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container text-center">
        <h2 class="display-4 mb-4">{{ $contenido->h2_call ?: 'Ready to transform your kitchen?' }}</h2>
        <a href="#contacto" class="btn btn-light btn-lg">{{ $contenido->btn_call ?: 'Request your free design' }}</a>
    </div>
</section>

<!-- Contact Section -->
<section id="contacto" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5">
                <h2 class="section-title text-center">{{ $contenido->h2_contact_title ?: 'Contact Us' }}</h2>
                <p class="lead">{{ $contenido->p_contact_title ?: 'We\'re ready to make your dream kitchen a reality' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <form class="contact-form">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Full name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" placeholder="Phone" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Send message</button>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="ps-lg-5">
                    <div class="mb-4">
                        <h4>{{ $contenido->h4_contact_1 ?: 'Location' }}</h4>
                        <p>{{ $contenido->p_contact_1 ?: 'Minneapolis, MN' }}</p>
                    </div>
                    <div class="mb-4">
                        <h4>{{ $contenido->h4_contact_email_1 ?: 'Email' }}</h4>
                        <p>{{ $contenido->p_contact_email_1 ?: 'info@jufmankitchens.com' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->


@endsection
