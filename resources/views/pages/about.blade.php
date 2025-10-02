@extends('layouts.app')
@section('content')

{{-- Hero moderno con imagen banner3 --}}
<section class="hero-modern position-relative overflow-hidden" style="min-height: 70vh;">
    <div class="hero-bg position-absolute w-100 h-100" 
         style="background: linear-gradient(135deg, rgba(240, 85, 165, 0.9) 0%, rgba(122, 136, 254, 0.8) 100%), 
                url('{{ asset('images/banner3.jpeg') }}') center/cover no-repeat;">
    </div>
    
    <div class="container position-relative h-100" style="z-index: 2;">
        <div class="row align-items-center" style="min-height: 70vh;">
            <div class="col-lg-8 mx-auto text-center text-white">
                <div class="animate-fade-in">
                    <h1 class="display-3 fw-bold mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                        Transforma Tu Vida en 30 Días
                    </h1>
                    <p class="lead mb-5 fs-4" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                        Move Challenge: El reto que cambiará tu cuerpo, mente y estilo de vida
                    </p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="#nosotros" class="btn btn-light btn-lg px-5 py-3 rounded-pill shadow-lg">
                            Descubre Más
                        </a>
                        <a href="#como-funciona" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill">
                            Cómo Funciona
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Elementos decorativos con colores de marca --}}
    <div class="position-absolute" style="bottom: -50px; right: -50px; width: 200px; height: 200px; background: #CCD537; border-radius: 50%; opacity: 0.2;"></div>
    <div class="position-absolute" style="top: 10%; left: -30px; width: 150px; height: 150px; background: #FF9B28; border-radius: 50%; opacity: 0.2;"></div>
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
.animate-fade-in {
    animation: fadeIn 1s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

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
</style>

@endsection