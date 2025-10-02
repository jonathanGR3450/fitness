@extends('layouts.app')
@section('content')

{{-- Hero único para comunidad - Sin carrusel --}}
<section class="community-hero position-relative overflow-hidden" style="min-height: 60vh; background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
    
    {{-- Patrón de círculos flotantes --}}
    <div class="circles-pattern">
        <div class="circle" style="top: 10%; left: 10%; width: 100px; height: 100px; background: #CCD537; opacity: 0.15;"></div>
        <div class="circle" style="top: 60%; left: 5%; width: 150px; height: 150px; background: #F055A5; opacity: 0.1;"></div>
        <div class="circle" style="top: 20%; right: 15%; width: 120px; height: 120px; background: #7A88FE; opacity: 0.12;"></div>
        <div class="circle" style="bottom: 15%; right: 8%; width: 90px; height: 90px; background: #FF9B28; opacity: 0.15;"></div>
    </div>

    <div class="container position-relative" style="z-index: 2; padding-top: 5rem; padding-bottom: 3rem;">
        <div class="row align-items-center">
            <div class="col-lg-10 mx-auto text-center">
                {{-- Icono animado --}}
                <div class="hero-icon-pulse mb-4">
                    <i class="fas fa-users" style="font-size: 3rem; color: #CCD537;"></i>
                </div>
                
                <h1 class="display-3 fw-bold text-white mb-3">
                    Nuestra 
                    <span style="background: linear-gradient(135deg, #CCD537, #F055A5); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                        Comunidad
                    </span>
                </h1>
                
                <p class="lead text-white mb-4" style="opacity: 0.9; max-width: 700px; margin: 0 auto; font-size: 1.3rem;">
                    Más de <strong style="color: #CCD537;">128,000 personas</strong> transformando sus vidas juntas. 
                    Historias reales, resultados reales, apoyo real.
                </p>

                {{-- Mini stats en línea --}}
                <div class="d-flex gap-4 justify-content-center flex-wrap mb-4">
                    <div class="mini-stat">
                        <div class="mini-stat-number" style="color: #CCD537;">128K+</div>
                        <div class="mini-stat-label">Seguidores</div>
                    </div>
                    <div class="mini-stat">
                        <div class="mini-stat-number" style="color: #F055A5;">500+</div>
                        <div class="mini-stat-label">Participantes Activos</div>
                    </div>
                    <div class="mini-stat">
                        <div class="mini-stat-number" style="color: #7A88FE;">525+</div>
                        <div class="mini-stat-label">Posts Inspiradores</div>
                    </div>
                </div>

                <a href="https://www.instagram.com/anabelleibalu/" target="_blank" 
                   class="btn btn-lg rounded-pill px-5 py-3 fw-bold"
                   style="background: linear-gradient(135deg, #CCD537, #F055A5); color: white; border: none;">
                    <i class="fab fa-instagram me-2"></i>
                    Únete en Instagram
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Sección de Comunidad con diseño único tipo social media --}}
<section id="testimonios" class="py-5 position-relative" style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);">
    
    {{-- Header de la comunidad --}}
    <div class="container mb-5">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="community-badge mb-3">
                    <i class="fas fa-users me-2"></i>
                    <span>NUESTRA COMUNIDAD</span>
                </div>
                <h2 class="display-4 fw-bold mb-3" style="color: #2c3e50;">
                    Lo que dice la 
                    <span style="color: #CCD537;">comunidad</span>
                </h2>
                <p class="lead text-secondary mb-4">
                    Historias reales de personas que transformaron su vida con el Move Challenge
                </p>
                
                {{-- Stats de comunidad --}}
                <div class="row g-3 justify-content-center">
                    <div class="col-auto">
                        <div class="community-stat">
                            <div class="stat-icon" style="background: rgba(204, 213, 55, 0.15);">
                                <i class="fas fa-heart" style="color: #CCD537;"></i>
                            </div>
                            <div class="stat-info">
                                <div class="stat-value" style="color: #CCD537;">500+</div>
                                <div class="stat-label">Participantes</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="community-stat">
                            <div class="stat-icon" style="background: rgba(240, 85, 165, 0.15);">
                                <i class="fas fa-fire" style="color: #F055A5;"></i>
                            </div>
                            <div class="stat-info">
                                <div class="stat-value" style="color: #F055A5;">1000+</div>
                                <div class="stat-label">Historias</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="community-stat">
                            <div class="stat-icon" style="background: rgba(122, 136, 254, 0.15);">
                                <i class="fas fa-star" style="color: #7A88FE;"></i>
                            </div>
                            <div class="stat-info">
                                <div class="stat-value" style="color: #7A88FE;">4.9/5</div>
                                <div class="stat-label">Valoración</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Grid de testimonios estilo masonry --}}
    <div class="container">
        <div class="testimonials-masonry">
            {{-- Testimonio 1 - Card verde --}}
            <div class="testimonial-card-modern card-green">
                <div class="card-pattern"></div>
                <div class="card-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text">
                        "En 30 días recuperé mi energía. Las rutinas son realistas y la comunidad te sostiene. 
                        No solo cambió mi cuerpo, cambió mi mentalidad."
                    </p>
                    <div class="testimonial-author">
                        <img src="{{ asset('images/testimonial-1.jpg') }}" 
                             alt="María G." 
                             class="author-avatar"
                             onerror="this.src='{{ asset('images/user.png') }}'">
                        <div class="author-info">
                            <h5 class="mb-0">María G.</h5>
                            <p class="mb-0">
                                <i class="fas fa-trophy me-1"></i>
                                Move Challenge Enero 2025
                            </p>
                        </div>
                    </div>
                    <div class="card-badges">
                        <span class="badge-pill">
                            <i class="fas fa-dumbbell me-1"></i>
                            Fitness
                        </span>
                        <span class="badge-pill">
                            <i class="fas fa-apple-alt me-1"></i>
                            Nutrición
                        </span>
                    </div>
                </div>
            </div>

            {{-- Testimonio 2 - Card rosa --}}
            <div class="testimonial-card-modern card-pink">
                <div class="card-pattern"></div>
                <div class="card-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text">
                        "La mezcla de ejercicio y gratitud diaria me cambió el chip. ¡Super recomendado! 
                        Ahora tengo hábitos que se quedaron para siempre."
                    </p>
                    <div class="testimonial-author">
                        <img src="{{ asset('images/testimonial-2.jpg') }}" 
                             alt="Carlos R." 
                             class="author-avatar"
                             onerror="this.src='{{ asset('images/user.png') }}'">
                        <div class="author-info">
                            <h5 class="mb-0">Carlos R.</h5>
                            <p class="mb-0">
                                <i class="fas fa-trophy me-1"></i>
                                Move Challenge Diciembre 2024
                            </p>
                        </div>
                    </div>
                    <div class="card-badges">
                        <span class="badge-pill">
                            <i class="fas fa-heart me-1"></i>
                            Mindfulness
                        </span>
                        <span class="badge-pill">
                            <i class="fas fa-smile me-1"></i>
                            Bienestar
                        </span>
                    </div>
                </div>
            </div>

            {{-- Testimonio 3 - Card azul --}}
            <div class="testimonial-card-modern card-blue">
                <div class="card-pattern"></div>
                <div class="card-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text">
                        "Me sentí acompañada todo el tiempo. Aprendí a moverme y a comer sin culpa. 
                        La comunidad es increíble y el apoyo es real."
                    </p>
                    <div class="testimonial-author">
                        <img src="{{ asset('images/testimonial-3.jpg') }}" 
                             alt="Ana M." 
                             class="author-avatar"
                             onerror="this.src='{{ asset('images/user.png') }}'">
                        <div class="author-info">
                            <h5 class="mb-0">Ana M.</h5>
                            <p class="mb-0">
                                <i class="fas fa-trophy me-1"></i>
                                Move Challenge Noviembre 2024
                            </p>
                        </div>
                    </div>
                    <div class="card-badges">
                        <span class="badge-pill">
                            <i class="fas fa-users me-1"></i>
                            Comunidad
                        </span>
                        <span class="badge-pill">
                            <i class="fas fa-utensils me-1"></i>
                            Alimentación
                        </span>
                    </div>
                </div>
            </div>

            {{-- Card de Instagram feed real --}}
            <div class="instagram-feed-card">
                <div class="instagram-header-real">
                    <div class="instagram-profile">
                        <div class="instagram-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <div class="instagram-username">
                                <i class="fab fa-instagram"></i>
                                <span>@anabelleibalu</span>
                                <i class="fas fa-check-circle verified-badge"></i>
                            </div>
                            <div class="instagram-bio">🏊‍♀️ Open Water Swimmer | 🇨🇴</div>
                        </div>
                    </div>
                </div>
                
                <div class="instagram-stats mb-3">
                    <div class="stat-item">
                        <strong>525</strong>
                        <span>Posts</span>
                    </div>
                    <div class="stat-item">
                        <strong>128K</strong>
                        <span>Seguidores</span>
                    </div>
                    <div class="stat-item">
                        <strong>2.4K</strong>
                        <span>Siguiendo</span>
                    </div>
                </div>

                <div class="instagram-description mb-3">
                    <p class="mb-2">
                        <strong>30 días para transformar tu vida en MOVIMIENTO 🚀</strong>
                    </p>
                    <p class="text-muted small mb-0">
                        Creadora del @movechallengeoficial
                    </p>
                </div>

                <a href="https://www.instagram.com/anabelleibalu/" target="_blank" class="btn btn-instagram-follow w-100">
                    <i class="fab fa-instagram me-2"></i>
                    Seguir en Instagram
                </a>
                
                <p class="text-center text-muted small mt-3 mb-0">
                    <i class="fas fa-heart me-1" style="color: #F055A5;"></i>
                    Únete a nuestra comunidad de 128K+
                </p>
            </div>

            {{-- Card de estadísticas destacadas --}}
            <div class="stats-highlight-card">
                <div class="stats-content">
                    <div class="stats-number" style="color: #CCD537;">98%</div>
                    <p class="stats-description">
                        De los participantes completan el reto y logran sus objetivos
                    </p>
                    <div class="stats-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

            {{-- Card de CTA para unirse --}}
            <div class="cta-join-card">
                <h3 class="fw-bold mb-3">¿Lista para ser parte?</h3>
                <p class="mb-4">Únete a nuestra comunidad y comienza tu transformación hoy</p>
                <a href="#" class="btn btn-cta">
                    Únete Ahora
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- CTA final de comunidad --}}
    <div class="container mt-5">
        <div class="community-cta-final">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h3 class="fw-bold mb-3" style="color: #2c3e50;">
                        Comparte tu historia
                    </h3>
                    <p class="lead text-secondary mb-4">
                        ¿Ya completaste el reto? Cuéntanos tu experiencia y sé parte de nuestra galería de éxitos
                    </p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="#" class="btn btn-lg rounded-pill px-5" style="background: #CCD537; color: #2c3e50; font-weight: bold;">
                            Compartir mi historia
                        </a>
                        <a href="#" class="btn btn-outline-dark btn-lg rounded-pill px-5">
                            Ver más testimonios
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Hero de comunidad único */
.community-hero {
    position: relative;
}

.circles-pattern .circle {
    position: absolute;
    border-radius: 50%;
    animation: float-circle 20s ease-in-out infinite;
}

@keyframes float-circle {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -30px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}

.hero-icon-pulse {
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.1); opacity: 0.8; }
}

.mini-stat {
    text-align: center;
}

.mini-stat-number {
    font-size: 2rem;
    font-weight: bold;
    line-height: 1;
    margin-bottom: 0.25rem;
}

.mini-stat-label {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.85rem;
}

/* Badge de comunidad */
.community-badge {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    background: linear-gradient(135deg, #CCD537, #F055A5);
    color: white;
    border-radius: 50px;
    font-weight: bold;
    font-size: 0.9rem;
}

/* Stats de comunidad */
.community-stat {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 1.5rem;
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: bold;
    line-height: 1;
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.85rem;
    color: #6c757d;
    margin: 0;
}

/* Grid masonry de testimonios */
.testimonials-masonry {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2rem;
    align-items: start;
}

/* Tarjetas modernas de testimonios */
.testimonial-card-modern {
    position: relative;
    padding: 2.5rem;
    border-radius: 24px;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.testimonial-card-modern:hover {
    transform: translateY(-10px) rotate(-1deg);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.card-green {
    background: linear-gradient(135deg, #CCD537 0%, rgba(204, 213, 55, 0.8) 100%);
    color: #2c3e50;
}

.card-pink {
    background: linear-gradient(135deg, #F055A5 0%, rgba(240, 85, 165, 0.8) 100%);
    color: white;
}

.card-blue {
    background: linear-gradient(135deg, #7A88FE 0%, rgba(122, 136, 254, 0.8) 100%);
    color: white;
}

/* Patrón decorativo */
.card-pattern {
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
    background-size: 20px 20px;
    transform: rotate(45deg);
    pointer-events: none;
}

.card-content {
    position: relative;
    z-index: 1;
}

.quote-icon {
    font-size: 2rem;
    opacity: 0.3;
    margin-bottom: 1rem;
}

.testimonial-text {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-weight: 500;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.author-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: 3px solid rgba(255, 255, 255, 0.5);
    object-fit: cover;
}

.author-info h5 {
    font-weight: bold;
    margin-bottom: 0.25rem;
}

.author-info p {
    font-size: 0.9rem;
    opacity: 0.9;
}

.card-badges {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.badge-pill {
    padding: 0.5rem 1rem;
    background: rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 600;
}

/* Card de Instagram real */
.instagram-feed-card {
    background: white;
    padding: 2rem;
    border-radius: 24px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.instagram-header-real {
    margin-bottom: 1.5rem;
}

.instagram-profile {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.instagram-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #F055A5, #7A88FE);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.instagram-username {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: bold;
    font-size: 1.1rem;
    color: #2c3e50;
}

.instagram-username i.fab {
    color: #E4405F;
}

.verified-badge {
    color: #1DA1F2;
    font-size: 0.9rem;
}

.instagram-bio {
    color: #6c757d;
    font-size: 0.9rem;
}

.instagram-stats {
    display: flex;
    justify-content: space-around;
    padding: 1rem 0;
    border-top: 1px solid #e9ecef;
    border-bottom: 1px solid #e9ecef;
}

.stat-item {
    text-align: center;
}

.stat-item strong {
    display: block;
    font-size: 1.2rem;
    color: #2c3e50;
}

.stat-item span {
    font-size: 0.85rem;
    color: #6c757d;
}

.instagram-description {
    font-size: 0.95rem;
    color: #2c3e50;
}

.btn-instagram-follow {
    background: linear-gradient(135deg, #F055A5, #7A88FE);
    color: white;
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 12px;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-instagram-follow:hover {
    transform: scale(1.02);
    color: white;
    box-shadow: 0 8px 20px rgba(240, 85, 165, 0.3);
}

/* Card de estadísticas destacadas */
.stats-highlight-card {
    background: linear-gradient(135deg, rgba(204, 213, 55, 0.1), rgba(240, 85, 165, 0.1));
    padding: 3rem 2rem;
    border-radius: 24px;
    text-align: center;
    border: 2px solid rgba(204, 213, 55, 0.3);
}

.stats-number {
    font-size: 4rem;
    font-weight: bold;
    line-height: 1;
    margin-bottom: 1rem;
}

.stats-description {
    font-size: 1.1rem;
    color: #2c3e50;
    font-weight: 500;
    margin-bottom: 1rem;
}

.stats-stars {
    color: #FF9B28;
    font-size: 1.5rem;
}

/* Card CTA */
.cta-join-card {
    background: linear-gradient(135deg, #F055A5, #7A88FE);
    color: white;
    padding: 3rem 2rem;
    border-radius: 24px;
    text-align: center;
}

.btn-cta {
    background: white;
    color: #F055A5;
    border: none;
    padding: 1rem 2.5rem;
    border-radius: 50px;
    font-weight: bold;
    transition: all 0.3s ease;
}

.btn-cta:hover {
    transform: scale(1.05);
    color: #F055A5;
}

/* CTA final */
.community-cta-final {
    padding: 4rem 2rem;
    background: linear-gradient(135deg, rgba(204, 213, 55, 0.05), rgba(122, 136, 254, 0.05));
    border-radius: 24px;
}

/* Responsive */
@media (max-width: 768px) {
    .testimonials-masonry {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .community-stat {
        flex-direction: column;
        text-align: center;
    }
    
    .stats-number {
        font-size: 3rem;
    }

    .mini-stat-number {
        font-size: 1.5rem;
    }

    .display-3 {
        font-size: 2.5rem;
    }
}
</style>

@endsection