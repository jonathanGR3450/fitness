@extends('layouts.app')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
    
    :root {
        --purple-dark: #410445;      /* Púrpura oscuro - COLOR PROMINENTE */
        --purple-medium: #A5158C;    /* Púrpura medio */
        --pink-bright: #FF2DF1;      /* Fucsia brillante */
        --yellow: #F6DC43;           /* Amarillo */
        --green: #CCD537;            /* Verde */
        --neutral-light: #FAF9F7;
        --neutral-cream: #F5F2ED;
        --neutral-sand: #E8E2D5;
        --neutral-white: #FFFFFF;
        --dark-text: #2C3E50;
        --medium-text: #6C757D;
        --light-text: #9CA3AF;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Open Sans', sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Wave Divider */
    .wave-divider-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
    }

    .wave-divider-bottom svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 80px;
    }

    /* About Hero Section - DISEÑO CENTRADO */
    .about-hero {
        min-height: 95vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background: rgba(250, 249, 247, 0.7);
        padding: 160px 0 100px;
        text-align: center;
    }

    .about-hero-wrapper {
        max-width: 900px;
        margin: 0 auto;
    }

    .about-title-section {
        margin-bottom: 60px;
    }

    .about-hero-wrapper h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        color: var(--dark-text);
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .about-hero-wrapper .highlight {
        color: var(--purple-dark);
        position: relative;
        display: inline-block;
    }

    .about-hero-wrapper .subtitle {
        font-size: 1.3rem;
        color: var(--medium-text);
        max-width: 600px;
        margin: 0 auto 16px;
        line-height: 1.6;
        font-weight: 400;
    }

    /* Imagen circular orgánica centrada */
    .about-image-wrapper {
        position: relative;
        width: 400px;
        height: 400px;
        margin: 0 auto 50px;
    }

    .circular-organic-shape {
        position: absolute;
        width: 100%;
        height: 100%;
        background: var(--neutral-sand);
        border-radius: 50% 45% 48% 52% / 48% 50% 50% 52%;
        animation: morphCircle 10s ease-in-out infinite;
        z-index: 1;
    }

    @keyframes morphCircle {
        0%, 100% {
            border-radius: 50% 45% 48% 52% / 48% 50% 50% 52%;
        }
        33% {
            border-radius: 45% 55% 50% 50% / 52% 48% 52% 48%;
        }
        66% {
            border-radius: 52% 48% 45% 55% / 50% 52% 48% 50%;
        }
    }

    .about-image-wrapper img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 88%;
        height: 88%;
        object-fit: cover;
        border-radius: 50%;
        z-index: 2;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        border: 6px solid var(--neutral-white);
    }

    /* Estadísticas horizontales centradas */
    .stats-row {
        display: flex;
        justify-content: center;
        gap: 60px;
        flex-wrap: wrap;
        margin-top: 50px;
    }

    .stat-item {
        text-align: center;
        position: relative;
    }

    .stat-item::before {
        content: '';
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background: var(--purple-dark);
        border-radius: 2px;
    }

    .stat-item:nth-child(2)::before {
        background: var(--pink-bright);
    }

    .stat-item:nth-child(3)::before {
        background: var(--green);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        color: var(--dark-text);
        display: block;
        line-height: 1;
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 0.95rem;
        color: var(--medium-text);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-weight: 500;
    }

    /* Story Section */
    .story-section {
        padding: 120px 0;
        background: rgba(255, 255, 255, 0.75);
        position: relative;
        overflow: hidden;
    }

    .story-section::before {
        content: '';
        position: absolute;
        top: 10%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, var(--neutral-cream) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0.5;
        animation: float 15s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) translateX(0); }
        25% { transform: translateY(-20px) translateX(10px); }
        50% { transform: translateY(10px) translateX(-10px); }
        75% { transform: translateY(-10px) translateX(20px); }
    }

    .story-content {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 32px;
    }

    .story-text {
        font-size: 1.125rem;
        color: var(--medium-text);
        line-height: 1.8;
        margin-bottom: 24px;
    }

    /* Values Section */
    .values-section {
        padding: 120px 0;
        background: rgba(245, 242, 237, 0.7);
        position: relative;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
        margin-top: 60px;
    }

    .value-card {
        position: relative;
        text-align: center;
        padding: 48px 32px;
        border-radius: 30px;
        isolation: isolate;
    }

    .value-card::before {
        content: '';
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        background: var(--neutral-light);
        border-radius: 40px 20px 40px 20px;
        z-index: -1;
        transition: all 0.3s ease;
    }

    .value-card:nth-child(2n)::before {
        border-radius: 20px 40px 20px 40px;
        background: var(--neutral-cream);
    }

    .value-card:nth-child(3n)::before {
        border-radius: 30px 50px 30px 50px;
    }

    .value-card:hover::before {
        transform: rotate(-2deg) scale(1.03);
    }

    /* Value Icons con los 5 colores correctos */
    .value-icon {
        width: 80px;
        height: 80px;
        background: var(--purple-dark);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-size: 2rem;
        color: white;
    }

    .value-card:nth-child(2) .value-icon {
        background: var(--pink-bright);
    }

    .value-card:nth-child(3) .value-icon {
        background: var(--green);
        color: #333;
    }

    .value-card:nth-child(4) .value-icon {
        background: var(--yellow);
        color: #333;
    }

    .value-card:nth-child(5) .value-icon {
        background: var(--purple-medium);
    }

    .value-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 16px;
    }

    .value-description {
        font-size: 1rem;
        color: var(--medium-text);
        line-height: 1.6;
    }

    /* Credentials Section */
    .credentials-section {
        padding: 120px 0;
        background: rgba(255, 255, 255, 0.75);
        position: relative;
        text-align: center;
    }

    .credentials-list {
        max-width: 700px;
        margin: 60px auto 0;
        text-align: left;
    }

    .credential-item {
        display: flex;
        align-items: center;
        padding: 24px;
        margin-bottom: 20px;
        background: var(--neutral-white);
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .credential-item:hover {
        transform: translateX(10px);
        box-shadow: 0 6px 20px rgba(65, 4, 69, 0.15);
    }

    /* Credential Icons con los colores correctos */
    .credential-icon {
        width: 60px;
        height: 60px;
        background: var(--purple-dark);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 24px;
        color: white;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .credential-item:nth-child(2) .credential-icon {
        background: var(--pink-bright);
    }

    .credential-item:nth-child(3) .credential-icon {
        background: var(--green);
        color: #333;
    }

    .credential-item:nth-child(4) .credential-icon {
        background: var(--yellow);
        color: #333;
    }

    .credential-item:nth-child(5) .credential-icon {
        background: var(--purple-medium);
    }

    .credential-text h4 {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 4px;
    }

    .credential-text p {
        font-size: 0.95rem;
        color: var(--medium-text);
        margin: 0;
    }

    /* CTA Section - Color sólido púrpura prominente */
    .cta-about-section {
        padding: 100px 0;
        background: var(--purple-dark);
        position: relative;
        text-align: center;
        color: white;
        overflow: hidden;
    }

    .cta-about-section::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0.3;
    }

    .cta-about-content {
        position: relative;
        z-index: 2;
    }

    .cta-about-content h2 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 24px;
    }

    .cta-about-content p {
        font-size: 1.25rem;
        margin-bottom: 40px;
        opacity: 0.95;
    }

    /* Botón blanco con hover al verde */
    .btn-white {
        display: inline-block;
        padding: 18px 48px;
        background: white;
        color: var(--purple-dark);
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-white:hover {
        background: var(--green);
        color: #333;
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(204, 213, 55, 0.4);
    }

    /* Responsive */
    @media (max-width: 968px) {
        .about-image-wrapper {
            width: 320px;
            height: 320px;
        }

        .stats-row {
            gap: 40px;
        }

        .values-grid {
            grid-template-columns: 1fr;
        }

        .credentials-list {
            padding: 0 20px;
        }
    }

    @media (max-width: 640px) {
        .about-hero {
            padding-top: 140px;
        }

        .about-image-wrapper {
            width: 280px;
            height: 280px;
        }

        .section-title {
            font-size: 2rem;
        }

        .stats-row {
            flex-direction: column;
            gap: 30px;
        }

        .stat-number {
            font-size: 2.5rem;
        }

        .cta-about-content h2 {
            font-size: 2rem;
        }

        .cta-about-content p {
            font-size: 1.1rem;
        }
    }
</style>

<!-- About Hero Section - DISEÑO CENTRADO VERTICAL -->
<section class="about-hero">
    <div class="container">
        <div class="about-hero-wrapper">
            <!-- Título superior -->
            <div class="about-title-section">
                <h1>Hola, soy <span class="highlight">Anabelle Ibalu</span></h1>
                <p class="subtitle">Coach de bienestar apasionada por el movimiento consciente</p>
            </div>

            <!-- Imagen circular central -->
            <div class="about-image-wrapper">
                <div class="circular-organic-shape"></div>
                <img src="{{ asset('images/anabelle-profile.jpg') }}" alt="Anabelle Ibalu" 
                     onerror="this.src='{{ asset('images/sinfondo.png') }}'">
            </div>

            <!-- Texto descriptivo -->
            <div class="about-description">
                <p class="subtitle">Mi misión es ayudarte a descubrir tu mejor versión a través de hábitos sostenibles. Creo que el cambio real viene de adentro hacia afuera.</p>
            </div>

            <!-- Estadísticas -->
            <div class="stats-row">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Vidas transformadas</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">5+</span>
                    <span class="stat-label">Años de experiencia</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">30+</span>
                    <span class="stat-label">Challenges realizados</span>
                </div>
            </div>
        </div>
    </div>
    <div class="wave-divider-bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="var(--neutral-white)"></path>
        </svg>
    </div>
</section>

<!-- Story Section -->
<section class="story-section">
    <div class="container">
        <div class="story-content">
            <h2 class="section-title">Mi historia</h2>
            <p class="story-text">
                Mi viaje en el mundo del fitness comenzó como una búsqueda personal de bienestar. Después de años luchando con dietas restrictivas y entrenamientos agotadores, descubrí que el verdadero cambio viene del equilibrio.
            </p>
            <p class="story-text">
                Decidí convertirme en entrenadora personal certificada para ayudar a otras personas a evitar los errores que yo cometí. Mi enfoque combina el movimiento consciente con la nutrición balanceada y el mindfulness.
            </p>
            <p class="story-text">
                Hoy, mi mayor satisfacción es ver cómo mis clientes no solo transforman sus cuerpos, sino también su mentalidad y su relación con el ejercicio y la comida.
            </p>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="container">
        <div class="story-content">
            <h2 class="section-title">Mis valores</h2>
            <p class="story-text">
                Estos son los principios que guían mi trabajo y mi filosofía de vida
            </p>
        </div>
        
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="value-title">Autenticidad</h3>
                <p class="value-description">Creo en ser real y transparente. No existen los cuerpos perfectos, existen cuerpos sanos y felices.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h3 class="value-title">Equilibrio</h3>
                <p class="value-description">El bienestar no se trata de extremos. Se trata de encontrar tu punto medio sostenible.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="value-title">Comunidad</h3>
                <p class="value-description">Juntos somos más fuertes. Creo en el poder del apoyo mutuo y la motivación colectiva.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-seedling"></i>
                </div>
                <h3 class="value-title">Crecimiento</h3>
                <p class="value-description">Cada día es una oportunidad para ser 1% mejor. El progreso, no la perfección.</p>
            </div>
        </div>
    </div>
</section>

<!-- Credentials Section -->
<section class="credentials-section">
    <div class="container">
        <h2 class="section-title">Certificaciones y experiencia</h2>
        <p class="story-text">Mi formación continua me permite ofrecerte las mejores herramientas</p>
        
        <div class="credentials-list">
            <div class="credential-item">
                <div class="credential-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <div class="credential-text">
                    <h4>Entrenadora Personal Certificada</h4>
                    <p>ISSA - International Sports Sciences Association</p>
                </div>
            </div>
            
            <div class="credential-item">
                <div class="credential-icon">
                    <i class="fas fa-apple-alt"></i>
                </div>
                <div class="credential-text">
                    <h4>Certificación en Nutrición Deportiva</h4>
                    <p>Especializada en planes alimenticios personalizados</p>
                </div>
            </div>
            
            <div class="credential-item">
                <div class="credential-icon">
                    <i class="fas fa-spa"></i>
                </div>
                <div class="credential-text">
                    <h4>Instructora de Yoga & Mindfulness</h4>
                    <p>200h Yoga Alliance RYT</p>
                </div>
            </div>
            
            <div class="credential-item">
                <div class="credential-icon">
                    <i class="fas fa-dumbbell"></i>
                </div>
                <div class="credential-text">
                    <h4>Especialización en Entrenamiento Funcional</h4>
                    <p>Movimientos naturales y eficientes</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-about-section">
    <div class="container">
        <div class="cta-about-content">
            <h2>¿Lista/o para comenzar tu transformación?</h2>
            <p>Únete al próximo Move Challenge y descubre todo lo que puedes lograr</p>
            <a href="{{ route('contact') }}" class="btn-white">Hablemos</a>
        </div>
    </div>
</section>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection