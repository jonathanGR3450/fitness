@extends('layouts.app')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&family=Cormorant:wght@400;500;600;700&display=swap');
    
    :root {
        --orange: #FF8200;
        --pink: #D946B5;
        --indigo: #7C3AED;
        --pear: #C7D22F;
        --cream: #FAF9F6;
        --sand: #F5F1EA;
        --warm-white: #FFFDF9;
        --dark: #2D2D2D;
        --text-light: #6B6B6B;
        --text-dark: #3A3A3A;
    }

    /* Reset */
    #wellness-landing * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    #wellness-landing {
        font-family: 'Poppins', sans-serif;
        background: var(--warm-white);
        overflow-x: hidden;
        width: 100%;
    }

    /* Hero Section con shape orgánico */
    .hero-organic {
        position: relative;
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--sand);
        overflow: hidden;
        padding: 80px 20px;
    }

    .hero-organic::before {
        content: '';
        position: absolute;
        top: -10%;
        right: -5%;
        width: 60%;
        height: 80%;
        background: var(--pink);
        opacity: 0.08;
        border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%;
        animation: float 20s ease-in-out infinite;
    }

    .hero-organic::after {
        content: '';
        position: absolute;
        bottom: -10%;
        left: -5%;
        width: 50%;
        height: 70%;
        background: var(--indigo);
        opacity: 0.06;
        border-radius: 40% 60% 60% 40% / 60% 30% 70% 40%;
        animation: float 25s ease-in-out infinite reverse;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-30px) rotate(5deg); }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        padding: 0 20px;
        width: 100%;
    }

    .hero-organic h1 {
        font-family: 'Cormorant', serif;
        font-size: clamp(2.5rem, 8vw, 5rem);
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 20px;
        line-height: 1.1;
        letter-spacing: -1px;
    }

    .hero-organic .subtitle {
        font-size: clamp(1rem, 3vw, 1.3rem);
        font-weight: 300;
        color: var(--text-dark);
        margin-bottom: 40px;
        line-height: 1.7;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Botones planos sin degradados */
    .btn-organic {
        display: inline-block;
        padding: 16px 35px;
        border-radius: 50px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: clamp(0.9rem, 2vw, 1rem);
        letter-spacing: 0.3px;
        border: none;
        white-space: nowrap;
        min-height: 48px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary-organic {
        background: var(--pink);
        color: white;
    }

    .btn-primary-organic:hover {
        background: #C13BA0;
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(217, 70, 181, 0.25);
        color: white;
    }

    .btn-outline-organic {
        background: transparent;
        border: 2px solid var(--dark);
        color: var(--dark);
    }

    .btn-outline-organic:hover {
        background: var(--dark);
        color: white;
    }

    /* Organic divider entre secciones */
    .organic-divider {
        position: relative;
        height: clamp(60px, 15vw, 150px);
        background: var(--warm-white);
        overflow: hidden;
    }

    .organic-divider svg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Section base */
    .section-organic {
        position: relative;
        padding: clamp(60px, 15vw, 120px) 0;
        background: var(--warm-white);
    }

    .section-sand {
        background: var(--sand);
    }

    .section-cream {
        background: var(--cream);
    }

    /* Badge minimalista */
    .badge-organic {
        display: inline-block;
        padding: 8px 24px;
        background: var(--orange);
        color: white;
        border-radius: 30px;
        font-size: clamp(0.7rem, 1.5vw, 0.75rem);
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    /* Typography */
    h2.title-organic {
        font-family: 'Cormorant', serif;
        font-size: clamp(2rem, 6vw, 3.5rem);
        color: var(--dark);
        margin-bottom: 25px;
        line-height: 1.2;
        font-weight: 600;
        letter-spacing: -1px;
    }

    .text-organic {
        font-size: clamp(1rem, 2vw, 1.1rem);
        line-height: 1.8;
        color: var(--text-light);
        font-weight: 300;
        margin-bottom: 20px;
    }

    /* Media container con shape orgánico */
    .organic-media-shape {
        position: relative;
        width: 100%;
        overflow: hidden;
        border-radius: 45% 55% 60% 40% / 50% 60% 40% 50%;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        margin-bottom: 30px;
    }

    .organic-media-shape video,
    .organic-media-shape img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Value cards minimalistas */
    .value-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(min(100%, 250px), 1fr));
        gap: clamp(20px, 4vw, 30px);
        margin-top: 50px;
    }

    .value-card-organic {
        background: white;
        border-radius: 30px;
        padding: clamp(35px, 6vw, 50px) clamp(25px, 4vw, 35px);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .value-card-organic:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    .icon-organic {
        width: clamp(60px, 12vw, 80px);
        height: clamp(60px, 12vw, 80px);
        margin: 0 auto 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: clamp(1.5rem, 3vw, 2rem);
        color: white;
    }

    .value-card-organic h5 {
        font-size: clamp(1rem, 2.5vw, 1.2rem);
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 15px;
    }

    .value-card-organic p {
        color: var(--text-light);
        font-size: clamp(0.9rem, 2vw, 0.95rem);
        line-height: 1.6;
    }

    /* Feature grid */
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(min(100%, 200px), 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .feature-card-organic {
        background: white;
        border-radius: 25px;
        padding: clamp(30px, 5vw, 40px) clamp(20px, 3vw, 30px);
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .feature-card-organic:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
    }

    .feature-card-organic i {
        font-size: clamp(2rem, 4vw, 2.5rem);
        margin-bottom: 15px;
        color: var(--pink);
    }

    .feature-card-organic h6 {
        font-size: clamp(0.95rem, 2vw, 1.1rem);
        font-weight: 600;
        color: var(--dark);
    }

    /* Quote box orgánico */
    .quote-organic {
        position: relative;
        background: white;
        border-radius: 30px;
        padding: clamp(40px, 8vw, 70px) clamp(30px, 6vw, 60px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.08);
        border-left: 5px solid var(--pear);
    }

    .quote-organic::before {
        content: '"';
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: clamp(60px, 15vw, 120px);
        color: var(--pear);
        opacity: 0.15;
        font-family: 'Cormorant', serif;
        line-height: 1;
    }

    .quote-text-organic {
        font-size: clamp(1.1rem, 3vw, 1.5rem);
        line-height: 1.8;
        color: var(--text-dark);
        font-style: italic;
        font-weight: 300;
        position: relative;
        z-index: 1;
    }

    .quote-author {
        font-size: clamp(1rem, 2.5vw, 1.15rem);
        font-weight: 600;
        color: var(--pink);
        font-style: normal;
    }

    /* Contact cards */
    .contact-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(min(100%, 280px), 1fr));
        gap: clamp(20px, 4vw, 30px);
        margin-top: 50px;
    }

    .contact-card-organic {
        background: white;
        border-radius: 30px;
        padding: clamp(35px, 6vw, 50px) clamp(25px, 4vw, 35px);
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .contact-card-organic:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .contact-card-organic i {
        font-size: clamp(2.5rem, 5vw, 3rem);
        margin-bottom: 20px;
        color: var(--indigo);
    }

    .contact-card-organic h5 {
        font-size: clamp(1rem, 2.5vw, 1.2rem);
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .contact-card-organic p {
        color: var(--text-light);
        margin-bottom: 0;
        font-size: clamp(0.9rem, 2vw, 1rem);
        word-break: break-word;
    }

    /* Decorative organic shapes */
    .shape-decoration {
        position: absolute;
        opacity: 0.05;
        pointer-events: none;
        display: none;
    }

    /* Container responsive */
    .container {
        width: 100%;
        padding-right: 20px;
        padding-left: 20px;
        margin-right: auto;
        margin-left: auto;
    }

    /* Buttons container mobile */
    .btn-container-mobile {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
        width: 100%;
    }

    .btn-container-mobile .btn-organic {
        flex: 1 1 auto;
        min-width: 140px;
        max-width: 100%;
    }

    /* Responsive ajustes específicos */
    @media (min-width: 768px) {
        .container {
            max-width: 720px;
        }
        
        .shape-decoration {
            display: block;
        }
        
        .feature-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 992px) {
        .container {
            max-width: 960px;
        }
        
        .btn-organic {
            padding: 18px 45px;
        }
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 1140px;
        }
    }

    @media (min-width: 1400px) {
        .container {
            max-width: 1320px;
        }
    }

    /* Mobile specific adjustments */
    @media (max-width: 767px) {
        .hero-organic {
            min-height: 100vh;
            padding: 60px 15px;
        }
        
        .hero-organic::before,
        .hero-organic::after {
            width: 80%;
            height: 60%;
        }
        
        .hero-organic .subtitle br {
            display: none;
        }
        
        .section-organic {
            padding: 50px 0;
        }
        
        .organic-media-shape {
            margin-bottom: 40px;
            border-radius: 30px;
        }
        
        .value-grid {
            grid-template-columns: 1fr;
            gap: 20px;
            margin-top: 30px;
        }
        
        .feature-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 20px;
            margin-top: 30px;
        }
        
        .quote-organic {
            border-radius: 25px;
            border-left-width: 4px;
        }
        
        .btn-container-mobile {
            flex-direction: column;
            gap: 12px;
        }
        
        .btn-container-mobile .btn-organic {
            width: 100%;
            max-width: none;
        }
    }

    /* Extra small devices */
    @media (max-width: 375px) {
        .container {
            padding-right: 15px;
            padding-left: 15px;
        }
        
        .hero-organic {
            padding: 50px 10px;
        }
        
        .value-card-organic,
        .contact-card-organic {
            padding: 30px 20px;
        }
        
        .quote-organic {
            padding: 35px 25px;
        }
    }

    /* Touch device optimizations */
    @media (hover: none) and (pointer: coarse) {
        .btn-organic {
            padding: 18px 40px;
            min-height: 52px;
        }
        
        .value-card-organic:active,
        .feature-card-organic:active,
        .contact-card-organic:active {
            transform: scale(0.98);
        }
    }

    /* Landscape mobile */
    @media (max-width: 767px) and (orientation: landscape) {
        .hero-organic {
            min-height: auto;
            padding: 40px 20px;
        }
        
        .hero-organic h1 {
            margin-bottom: 15px;
        }
        
        .hero-organic .subtitle {
            margin-bottom: 25px;
        }
    }
</style>

<div id="wellness-landing">
    {{-- Hero Section --}}
    <section class="hero-organic">
        <div class="hero-content">
            <h1>Annabelle Ibarra</h1>
            <p class="subtitle">
                Transformando vidas a través del movimiento,<br>
                la gratitud y la conexión genuina
            </p>
            <div class="btn-container-mobile">
                <a href="#sobre-mi" class="btn-organic btn-primary-organic">
                    Conoce mi historia
                </a>
                <a href="#contacto" class="btn-organic btn-outline-organic">
                    Conecta conmigo
                </a>
            </div>
        </div>
    </section>

    {{-- Organic Divider --}}
    <div class="organic-divider">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C300,80 500,80 600,50 C700,20 900,20 1200,80 L1200,120 L0,120 Z" 
                  fill="var(--warm-white)"/>
        </svg>
    </div>

    {{-- Sección: Sobre Mí --}}
    <section id="sobre-mi" class="section-organic">
        <div class="shape-decoration" style="top: 10%; right: 5%; width: 300px; height: 300px; background: var(--orange); border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%;"></div>
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-5">
                    <div class="organic-media-shape">
                        <video controls preload="metadata" playsinline poster="{{ asset('images/banner3.jpeg') }}">
                            <source src="{{ asset('video/video-promocional.mp4') }}" type="video/mp4">
                            <source src="{{ asset('video/video-promocional.webm') }}" type="video/webm">
                        </video>
                    </div>
                </div>
                
                <div class="col-lg-7">
                    <span class="badge-organic">Sobre Mí</span>
                    <h2 class="title-organic">Una Historia de<br>Luz y Transformación</h2>
                    <p class="text-organic">
                        Annabelle Ibarra <strong style="color: var(--pink);">irradia luz y transforma espacios</strong> con su energía única. 
                        Cree en los gestos sencillos como puentes de alegría y empatía, construyendo conexiones auténticas 
                        que impactan vidas.
                    </p>
                    <p class="text-organic">
                        Su filosofía se basa en la <strong style="color: var(--indigo);">gratitud diaria</strong>, 
                        un principio que refleja auténticamente en sus redes sociales, donde la coherencia entre lo 
                        digital y lo real es fundamental.
                    </p>
                    <p class="text-organic mb-4">
                        Con su ejemplo, inspira a vivir con <strong style="color: var(--pear);">conciencia, agradecimiento 
                        y conexión genuina</strong>, guiando a otros hacia su mejor versión.
                    </p>
                    
                    <a href="#move-challenge" class="btn-organic btn-primary-organic">
                        Descubre el Move Challenge
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Organic Divider --}}
    <div class="organic-divider">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,80 C200,20 400,20 600,50 C800,80 1000,80 1200,0 L1200,120 L0,120 Z" 
                  fill="var(--sand)"/>
        </svg>
    </div>

  



    {{-- Sección: Move Challenge --}}
    <section id="move-challenge" class="section-organic">
        <div class="shape-decoration" style="bottom: 15%; left: 8%; width: 250px; height: 250px; background: var(--indigo); border-radius: 40% 60% 60% 40% / 60% 30% 70% 40%;"></div>
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 order-lg-2">
                    <span class="badge-organic">Mi Proyecto</span>
                    <h2 class="title-organic">Move Challenge:<br>Mi Mayor Pasión</h2>
                    <p class="text-organic">
                        El <strong style="color: var(--pink);">Move Challenge</strong> es más que un programa de fitness. 
                        Es un <strong>movimiento de transformación integral</strong> que nació de mi deseo de ayudar a otros 
                        a encontrar su mejor versión.
                    </p>
                    <p class="text-organic">
                        Durante 30 días, acompaño a cada participante en un viaje que integra <strong>entrenamiento físico, 
                        nutrición consciente, mindfulness y conexión interior</strong>, creando hábitos sostenibles que 
                        transforman vidas.
                    </p>
                    <p class="text-organic mb-4">
                        No es solo un reto fitness, es una <strong style="color: var(--indigo);">experiencia completa 
                        de bienestar</strong> respaldada por una comunidad comprometida y el poder del movimiento consciente.
                    </p>
                    
                    <a href="https://wa.link/nq2ezt" target="_blank" class="btn-organic btn-primary-organic">
                        Conoce más del Move Challenge
                    </a>
                </div>
                
                <div class="col-lg-6 order-lg-1">
                    <div class="feature-grid">
                        <div class="feature-card-organic">
                            <i class="fas fa-dumbbell"></i>
                            <h6>Entrenamiento Integral</h6>
                        </div>
                        <div class="feature-card-organic">
                            <i class="fas fa-apple-alt"></i>
                            <h6>Nutrición Consciente</h6>
                        </div>
                        <div class="feature-card-organic">
                            <i class="fas fa-spa"></i>
                            <h6>Mindfulness Diario</h6>
                        </div>
                        <div class="feature-card-organic">
                            <i class="fas fa-users"></i>
                            <h6>Comunidad Activa</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Organic Divider --}}
    <div class="organic-divider">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,80 C400,20 800,20 1200,80 L1200,120 L0,120 Z" 
                  fill="var(--cream)"/>
        </svg>
    </div>

    {{-- Frase Inspiradora --}}
    <section class="section-organic section-cream">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="quote-organic">
                        <p class="quote-text-organic mb-4">
                            El movimiento es medicina. Cuando mueves tu cuerpo, transformas tu mente y elevas tu espíritu. 
                            Cada paso que das con conciencia es un paso hacia tu mejor versión.
                        </p>
                        <p class="text-end mb-0 quote-author">
                            — Annabelle Ibarra
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Organic Divider --}}
    <div class="organic-divider">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C300,80 500,80 700,50 C900,20 1100,20 1200,80 L1200,120 L0,120 Z" 
                  fill="var(--warm-white)"/>
        </svg>
    </div>

    {{-- Sección: Contacto --}}
    <section id="contacto" class="section-organic">
        <div class="container">
            <div class="text-center mb-4">
                <span class="badge-organic">Conectemos</span>
                <h2 class="title-organic">Comencemos Tu Transformación</h2>
                <p class="text-organic">Estoy aquí para acompañarte en tu journey de bienestar</p>
            </div>

            <div class="contact-grid">
                <div class="contact-card-organic">
                    <i class="fas fa-envelope"></i>
                    <h5>Email</h5>
                    <p>hola@anabelleibarra.com</p>
                </div>

                <div class="contact-card-organic">
                    <i class="fab fa-instagram"></i>
                    <h5>Instagram</h5>
                    <p>@anabelleibarra</p>
                </div>

                <div class="contact-card-organic">
                    <i class="fab fa-whatsapp"></i>
                    <h5>WhatsApp</h5>
                    <a href="https://wa.link/nq2ezt" target="_blank" class="btn-organic btn-primary-organic mt-3">
                        Escríbeme ahora
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const offset = window.innerWidth < 768 ? 20 : 80;
                const targetPosition = target.offsetTop - offset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Intersection Observer para animaciones suaves
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Esperar a que el DOM esté listo
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.value-card-organic, .feature-card-organic, .contact-card-organic').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    });

    // Optimización para touch devices
    if ('ontouchstart' in window) {
        document.querySelectorAll('.btn-organic').forEach(btn => {
            btn.style.cursor = 'pointer';
        });
    }
</script>

@endsection