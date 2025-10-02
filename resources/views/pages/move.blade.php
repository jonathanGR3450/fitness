@extends('layouts.app')
@section('content')

{{-- Hero dinámico y moderno con banner3 --}}
<section class="hero-dynamic position-relative overflow-hidden" style="min-height: 85vh; background: #2c3e50;">
    {{-- Imagen de fondo con overlay --}}
    <div class="position-absolute w-100 h-100" style="top: 0; left: 0;">
        <img src="{{ asset('images/banner3.jpeg') }}" alt="Move Challenge" 
             class="w-100 h-100" style="object-fit: cover; opacity: 0.3;">
    </div>
    
    {{-- Formas geométricas animadas --}}
    <div class="position-absolute geometric-shape" 
         style="top: 10%; right: 5%; width: 400px; height: 400px; background: linear-gradient(135deg, #CCD537, #F055A5); 
                border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; opacity: 0.15; animation: morph 8s ease-in-out infinite;"></div>
    <div class="position-absolute geometric-shape-2" 
         style="bottom: 10%; left: 8%; width: 300px; height: 300px; background: linear-gradient(135deg, #7A88FE, #CCD537); 
                border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%; opacity: 0.2; animation: morph 10s ease-in-out infinite reverse;"></div>
    
    <div class="container position-relative" style="z-index: 10; padding-top: 5rem; padding-bottom: 5rem;">
        <div class="row align-items-center" style="min-height: 75vh;">
            {{-- Contenido principal --}}
            <div class="col-lg-7">
                <div class="hero-content slide-in-left">
                    {{-- Badge superior --}}
                    <div class="mb-4">
                        <span class="badge-custom px-4 py-3 d-inline-block" 
                              style="background: #CCD537; color: #2c3e50; border-radius: 50px; font-weight: bold; font-size: 0.95rem;">
                            <i class="fas fa-bolt me-2"></i>
                            RETO DE 30 DÍAS
                        </span>
                    </div>
                    
                    {{-- Título principal con efecto --}}
                    <h1 class="display-1 fw-bold mb-4 text-white" style="line-height: 1.1; letter-spacing: -2px;">
                        Transforma
                        <span class="d-block" style="color: #CCD537; text-shadow: 0 0 40px rgba(204, 213, 55, 0.5);">
                            Tu Vida
                        </span>
                        en 30 Días
                    </h1>
                    
                    {{-- Descripción --}}
                    <p class="lead text-white mb-5" style="font-size: 1.4rem; max-width: 600px; opacity: 0.95;">
                        Únete al <strong style="color: #CCD537;">Move Challenge</strong> y descubre el poder 
                        del movimiento consciente para transformar tu cuerpo, mente y estilo de vida.
                    </p>
                    
                    {{-- Botones de acción --}}
                    <div class="d-flex gap-3 flex-wrap mb-5">
                        <a href="#nosotros" class="btn-hero-primary">
                            Comenzar Ahora
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="#como-funciona" class="btn-hero-secondary">
                            <i class="fas fa-play-circle me-2"></i>
                            Ver Cómo Funciona
                        </a>
                    </div>
                    
                    {{-- Stats rápidos --}}
                    <div class="row g-4 mt-4">
                        <div class="col-auto">
                            <div class="stat-box">
                                <div class="stat-number" style="color: #CCD537;">500+</div>
                                <div class="stat-label">Participantes</div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-box">
                                <div class="stat-number" style="color: #F055A5;">30</div>
                                <div class="stat-label">Días de Reto</div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-box">
                                <div class="stat-number" style="color: #7A88FE;">100%</div>
                                <div class="stat-label">Resultados</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Tarjeta flotante --}}
            <div class="col-lg-5">
                <div class="floating-card slide-in-right">
                    <div class="p-4 bg-white rounded-4 shadow-lg" style="backdrop-filter: blur(10px);">
                        <div class="mb-3">
                            <span class="badge bg-success px-3 py-2" style="background: #CCD537 !important; color: #2c3e50;">
                                <i class="fas fa-star me-1"></i>
                                Próximo Reto
                            </span>
                        </div>
                        <h3 class="fw-bold mb-3" style="color: #2c3e50;">¿Lista para el cambio?</h3>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2 d-flex align-items-center">
                                <i class="fas fa-check-circle me-2" style="color: #CCD537; font-size: 1.2rem;"></i>
                                <span>Rutinas personalizadas</span>
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="fas fa-check-circle me-2" style="color: #CCD537; font-size: 1.2rem;"></i>
                                <span>Plan de nutrición completo</span>
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="fas fa-check-circle me-2" style="color: #CCD537; font-size: 1.2rem;"></i>
                                <span>Comunidad de apoyo</span>
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <i class="fas fa-check-circle me-2" style="color: #CCD537; font-size: 1.2rem;"></i>
                                <span>Premios y reconocimientos</span>
                            </li>
                        </ul>
                        <a href="#" class="btn w-100 py-3 fw-bold" style="background: linear-gradient(135deg, #CCD537, #F055A5); color: white; border: none; border-radius: 12px;">
                            Inscríbete Ahora
                        </a>
                        <p class="text-center text-muted small mb-0 mt-3">
                            <i class="fas fa-users me-1"></i>
                            12 personas se inscribieron hoy
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Scroll indicator --}}
    <div class="position-absolute bottom-0 w-100 text-center pb-4" style="z-index: 10;">
        <a href="#nosotros" class="scroll-indicator text-white text-decoration-none">
            <div class="mb-2">Descubre Más</div>
            <i class="fas fa-chevron-down bounce"></i>
        </a>
    </div>
</section>

{{-- Sección "Sobre mí" --}}
<section id="nosotros" class="py-5 bg-light">
    <div class="container">
        {{-- Presentación de Annabelle --}}
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-6">
                <div class="video-wrapper position-relative shadow-lg rounded-4 overflow-hidden">
                    <video class="custom-video w-100 rounded-4" controls preload="metadata" playsinline 
                           poster="{{ asset('images/banner3.jpeg') }}">
                        <source src="{{ asset('video/video-promocional.mp4') }}" type="video/mp4">
                        <source src="{{ asset('video/video-promocional.webm') }}" type="video/webm">
                        Tu navegador no soporta reproducción de video.
                    </video>
                </div>
            </div>

            <div class="col-lg-6">
                <span class="badge rounded-pill px-3 py-2 mb-3" style="background: linear-gradient(135deg, #F055A5, #7A88FE); font-size: 0.9rem;">
                    SOBRE MÍ
                </span>
                <h2 class="section-title display-5 fw-bold mb-4" style="color: #F055A5;">
                    Annabelle Ibarra
                </h2>
                <p class="mb-4 fs-5 text-secondary leading-relaxed">
                    Irradia luz y transforma espacios con su energía. Cree en los gestos sencillos como puentes de alegría y empatía. 
                    Su filosofía se basa en la <strong style="color: #F055A5;">gratitud diaria</strong>, reflejada auténticamente en sus redes sociales, 
                    donde la coherencia entre lo digital y lo real es clave.
                </p>
                <p class="fs-5 text-secondary mb-4">
                    Con su ejemplo, inspira a vivir con <strong style="color: #7A88FE;">conciencia, agradecimiento y conexión genuina</strong>.
                </p>

                <div class="row g-3 mt-4">
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 text-center" style="background: rgba(240, 85, 165, 0.1);">
                            <i class="fas fa-heart mb-2" style="font-size: 2rem; color: #F055A5;"></i>
                            <h6 class="fw-bold mb-0">Gratitud Diaria</h6>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 text-center" style="background: rgba(122, 136, 254, 0.1);">
                            <i class="fas fa-sun mb-2" style="font-size: 2rem; color: #7A88FE;"></i>
                            <h6 class="fw-bold mb-0">Energía Positiva</h6>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 text-center" style="background: rgba(204, 213, 55, 0.1);">
                            <i class="fas fa-leaf mb-2" style="font-size: 2rem; color: #CCD537;"></i>
                            <h6 class="fw-bold mb-0">Vida Consciente</h6>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 text-center" style="background: rgba(255, 155, 40, 0.1);">
                            <i class="fas fa-hands-helping mb-2" style="font-size: 2rem; color: #FF9B28;"></i>
                            <h6 class="fw-bold mb-0">Empatía</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sección Move Challenge --}}
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-lg-2">
                <span class="badge rounded-pill px-3 py-2 mb-3" style="background: linear-gradient(135deg, #7A88FE, #CCD537); font-size: 0.9rem;">
                    MI PROYECTO
                </span>
                <h2 class="section-title display-5 fw-bold mb-4" style="color: #7A88FE;">
                    ¿Qué es el Move Challenge?
                </h2>
                <p class="mb-4 fs-5 text-secondary">
                    El <strong style="color: #F055A5;">Move Challenge</strong> es un reto de 30 días diseñado para transformar tu vida a través del
                    movimiento. Incluye guías de entrenamiento, nutrición y herramientas prácticas para mejorar tu salud y
                    rendimiento, tanto en casa como en el gimnasio. Además, ofrece premios para los mejores resultados y una
                    comunidad de apoyo para mantener la motivación.
                </p>
            </div>

            <div class="col-lg-6 order-lg-1">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start p-3 rounded-3 h-100" style="background: rgba(240, 85, 165, 0.1);">
                            <i class="fas fa-dumbbell me-3 mt-1" style="font-size:1.8rem; color: #F055A5;"></i>
                            <div>
                                <h5 class="mb-1 fw-bold">Entrenamiento</h5>
                                <small class="text-secondary">Planes semi-personalizados<br>(casa o gym)</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex align-items-start p-3 rounded-3 h-100" style="background: rgba(122, 136, 254, 0.1);">
                            <i class="fas fa-apple-alt me-3 mt-1" style="font-size:1.8rem; color: #7A88FE;"></i>
                            <div>
                                <h5 class="mb-1 fw-bold">Nutrición</h5>
                                <small class="text-secondary">Adaptada a tus<br>requerimientos y gustos</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex align-items-start p-3 rounded-3 h-100" style="background: rgba(255, 155, 40, 0.1);">
                            <i class="fas fa-utensils me-3 mt-1" style="font-size:1.8rem; color: #FF9B28;"></i>
                            <div>
                                <h5 class="mb-1 fw-bold">Recetas</h5>
                                <small class="text-secondary">Fáciles y<br>nutritivas</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex align-items-start p-3 rounded-3 h-100" style="background: rgba(204, 213, 55, 0.1);">
                            <i class="fas fa-spa me-3 mt-1" style="font-size:1.8rem; color: #CCD537;"></i>
                            <div>
                                <h5 class="mb-1 fw-bold">Mindfulness</h5>
                                <small class="text-secondary">Meditación y<br>respiración</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex align-items-start p-3 rounded-3 h-100" style="background: rgba(240, 85, 165, 0.1);">
                            <i class="fas fa-lightbulb me-3 mt-1" style="font-size:1.8rem; color: #F055A5;"></i>
                            <div>
                                <h5 class="mb-1 fw-bold">Conexión Interior</h5>
                                <small class="text-secondary">Tips y consejos<br>prácticos</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex align-items-start p-3 rounded-3 h-100" style="background: rgba(122, 136, 254, 0.1);">
                            <i class="fas fa-running me-3 mt-1" style="font-size:1.8rem; color: #7A88FE;"></i>
                            <div>
                                <h5 class="mb-1 fw-bold">Movilidad</h5>
                                <small class="text-secondary">Guía de estiramientos<br>completa</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="p-4 rounded-3 text-center" style="background: linear-gradient(135deg, rgba(240, 85, 165, 0.1), rgba(122, 136, 254, 0.1));">
                            <i class="fas fa-users me-2" style="color: #F055A5; font-size: 1.5rem;"></i>
                            <strong>Acompañamiento profesional</strong> + apoyo constante de nuestro equipo
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Nueva sección: Cómo Funciona --}}
<section id="como-funciona" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3" style="color: #F055A5;">Cómo Funciona</h2>
            <p class="lead text-secondary">Tu transformación en 3 simples pasos</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4 hover-lift">
                    <div class="mb-4">
                        <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px; background: linear-gradient(135deg, #F055A5, #7A88FE);">
                            <span class="text-white fw-bold fs-2">1</span>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Inscríbete</h4>
                    <p class="text-secondary">Únete al reto y recibe tu plan personalizado adaptado a tus objetivos y nivel de condición física.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4 hover-lift">
                    <div class="mb-4">
                        <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px; background: linear-gradient(135deg, #7A88FE, #CCD537);">
                            <span class="text-white fw-bold fs-2">2</span>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Entrena</h4>
                    <p class="text-secondary">Sigue tu rutina diaria de ejercicios, nutrición y mindfulness durante 30 días con apoyo constante.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4 hover-lift">
                    <div class="mb-4">
                        <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px; background: linear-gradient(135deg, #CCD537, #FF9B28);">
                            <span class="text-white fw-bold fs-2">3</span>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Transforma</h4>
                    <p class="text-secondary">Observa los cambios en tu cuerpo, mente y estilo de vida. ¡Compite por premios increíbles!</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Nueva sección: Por qué unirte --}}
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, rgba(240, 85, 165, 0.05), rgba(122, 136, 254, 0.05));">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3" style="color: #7A88FE;">Por Qué Unirte al Move Challenge</h2>
            <p class="lead text-secondary">Más que un reto, una comunidad de transformación</p>
        </div>

        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="pe-lg-5">
                    <div class="mb-4 d-flex align-items-start">
                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 me-3" 
                             style="width: 50px; height: 50px; background: #F055A5;">
                            <i class="fas fa-trophy text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Resultados Reales</h5>
                            <p class="text-secondary mb-0">Programa probado con cientos de participantes que han alcanzado sus metas.</p>
                        </div>
                    </div>

                    <div class="mb-4 d-flex align-items-start">
                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 me-3" 
                             style="width: 50px; height: 50px; background: #7A88FE;">
                            <i class="fas fa-heart text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Comunidad de Apoyo</h5>
                            <p class="text-secondary mb-0">Conecta con personas que comparten tus objetivos y motivaciones.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start">
                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 me-3" 
                             style="width: 50px; height: 50px; background: #FF9B28;">
                            <i class="fas fa-gift text-white"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Premios Increíbles</h5>
                            <p class="text-secondary mb-0">Los mejores resultados son reconocidos y premiados al finalizar el reto.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-lg p-4" style="background: linear-gradient(135deg, #F055A5, #7A88FE);">
                    <div class="text-center text-white">
                        <i class="fas fa-quote-left fs-3 mb-3 opacity-50"></i>
                        <p class="fs-5 mb-4 fst-italic">
                            "El Move Challenge cambió mi vida completamente. No solo perdí peso, sino que gané confianza, 
                            energía y una nueva perspectiva sobre el bienestar integral."
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="rounded-circle me-3" style="width: 50px; height: 50px; background: rgba(255,255,255,0.3);"></div>
                            <div class="text-start">
                                <p class="mb-0 fw-bold">María González</p>
                                <small class="opacity-75">Move Challenge Enero 2025</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Elementos decorativos --}}
    <div class="position-absolute" style="bottom: -80px; left: -80px; width: 250px; height: 250px; background: #CCD537; border-radius: 50%; opacity: 0.1;"></div>
</section>

<style>
/* Animaciones de entrada */
.slide-in-left {
    animation: slideInLeft 0.8s ease-out;
}

.slide-in-right {
    animation: slideInRight 0.8s ease-out 0.3s both;
}

@keyframes slideInLeft {
    from { opacity: 0; transform: translateX(-50px); }
    to { opacity: 1; transform: translateX(0); }
}

@keyframes slideInRight {
    from { opacity: 0; transform: translateX(50px); }
    to { opacity: 1; transform: translateX(0); }
}

/* Formas geométricas animadas */
@keyframes morph {
    0%, 100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; transform: rotate(0deg); }
    50% { border-radius: 70% 30% 50% 50% / 60% 60% 40% 40%; transform: rotate(180deg); }
}

/* Botones del hero */
.btn-hero-primary {
    display: inline-block;
    padding: 1rem 2.5rem;
    background: linear-gradient(135deg, #CCD537, #F055A5);
    color: white;
    font-weight: bold;
    font-size: 1.1rem;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(204, 213, 55, 0.3);
}

.btn-hero-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(204, 213, 55, 0.5);
    color: white;
}

.btn-hero-secondary {
    display: inline-block;
    padding: 1rem 2.5rem;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    font-weight: bold;
    font-size: 1.1rem;
    border-radius: 50px;
    text-decoration: none;
    border: 2px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.btn-hero-secondary:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: #CCD537;
    transform: translateY(-3px);
    color: white;
}

/* Stats boxes */
.stat-box {
    text-align: center;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
}

/* Tarjeta flotante */
.floating-card {
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

/* Scroll indicator */
.scroll-indicator {
    opacity: 0.7;
    transition: opacity 0.3s ease;
}

.scroll-indicator:hover {
    opacity: 1;
}

.bounce {
    animation: bounce 2s ease-in-out infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(10px); }
}

/* Efectos generales */
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15) !important;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: scale(1.05);
}

.video-wrapper {
    transition: transform 0.3s ease;
}

.video-wrapper:hover {
    transform: scale(1.02);
}

/* Badge personalizado */
.badge-custom {
    transition: all 0.3s ease;
}

.badge-custom:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(204, 213, 55, 0.4);
}

/* Responsive */
@media (max-width: 991px) {
    .display-1 {
        font-size: 3rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .floating-card {
        margin-top: 3rem;
    }
}
</style>

@endsection