@extends('layouts.app')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
    
    :root {
        --princeton-orange: #F6DC43;
        --steel-pink: #FF2DF1;
        --tropical-indigo: #A5158C;
        --pear: #CCD537;
        --dark-purple: #410445;
        --neutral-light: #FAF9F7;
        --neutral-cream: #F5F2ED;
        --neutral-sand: #E8E2D5;
        --neutral-white: #FFFFFF;
        --dark-text: #410445;
        --medium-text: #6C757D;
        --light-text: #9CA3AF;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Contact Hero Section - COMPACTO */
    .contact-hero-minimal {
        min-height: 50vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background: rgba(255, 45, 241, 0.06);
        padding: 160px 0 60px;
        text-align: center;
        overflow: hidden;
    }

    /* Círculos decorativos flotantes */
    .contact-hero-minimal::before {
        content: '';
        position: absolute;
        top: 20%;
        right: 10%;
        width: 300px;
        height: 300px;
        background: var(--pear);
        border-radius: 50%;
        opacity: 0.08;
        animation: float 20s ease-in-out infinite;
        z-index: 1;
    }

    .contact-hero-minimal::after {
        content: '';
        position: absolute;
        bottom: 10%;
        left: 5%;
        width: 250px;
        height: 250px;
        background: var(--tropical-indigo);
        border-radius: 50%;
        opacity: 0.06;
        animation: float 25s ease-in-out infinite reverse;
        z-index: 1;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) translateX(0); }
        50% { transform: translateY(-30px) translateX(20px); }
    }

    .hero-content-minimal {
        position: relative;
        z-index: 2;
        max-width: 600px;
        margin: 0 auto;
    }

    .hero-content-minimal h1 {
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        font-weight: 700;
        color: var(--dark-text);
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .hero-content-minimal .highlight {
        color: var(--steel-pink);
    }

    .hero-content-minimal p {
        font-size: 1.125rem;
        color: var(--medium-text);
        line-height: 1.6;
        margin-bottom: 32px;
    }

    /* Social Icons Inline */
    .social-inline {
        display: flex;
        justify-content: center;
        gap: 12px;
    }

    .social-btn {
        width: 44px;
        height: 44px;
        background: var(--neutral-white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--dark-text);
        font-size: 1.2rem;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .social-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .social-btn:nth-child(1):hover {
        background: var(--steel-pink);
        color: white;
    }

    .social-btn:nth-child(2):hover {
        background: var(--dark-text);
        color: white;
    }

    .social-btn:nth-child(3):hover {
        background: var(--tropical-indigo);
        color: white;
    }

    .social-btn:nth-child(4):hover {
        background: var(--pear);
        color: var(--dark-text);
    }

    /* Form Section - CENTRADO */
    .form-section-centered {
        padding: 80px 0 120px;
        background: rgba(250, 249, 247, 0.7);
        position: relative;
    }

    /* Formas orgánicas de fondo */
    .form-section-centered::before {
        content: '';
        position: absolute;
        top: 15%;
        left: -5%;
        width: 400px;
        height: 400px;
        background: var(--steel-pink);
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        opacity: 0.04;
        animation: morph 18s ease-in-out infinite;
        z-index: 1;
    }

    @keyframes morph {
        0%, 100% {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }
        50% {
            border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
        }
    }

    .form-wrapper {
        max-width: 700px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    /* Form Card Flotante */
    .form-card-floating {
        background: var(--neutral-white);
        padding: 60px 50px;
        border-radius: 30px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
        margin-bottom: 60px;
        position: relative;
    }

    /* Badge flotante en esquina */
    .form-badge {
        position: absolute;
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        padding: 10px 28px;
        background: var(--dark-purple);
        color: white;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 8px 20px rgba(65, 4, 69, 0.4);
    }

    .form-card-floating h2 {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 12px;
        text-align: center;
    }

    .form-card-floating .subtitle {
        font-size: 1rem;
        color: var(--medium-text);
        text-align: center;
        margin-bottom: 40px;
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 24px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .form-input {
        width: 100%;
        padding: 16px 20px;
        border: 2px solid var(--neutral-sand);
        border-radius: 12px;
        background: var(--neutral-light);
        font-family: 'Open Sans', sans-serif;
        font-size: 1rem;
        transition: all 0.3s ease;
        color: var(--dark-text);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--pear);
        background: var(--neutral-white);
        box-shadow: 0 0 0 4px rgba(204, 213, 55, 0.15);
    }

    .form-input::placeholder {
        color: var(--light-text);
    }

    textarea.form-input {
        resize: vertical;
        min-height: 120px;
    }

    .form-row-split {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    /* Checkboxes modernos */
    .checkbox-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 12px;
    }

    .checkbox-option {
        display: flex;
        align-items: center;
    }

    .checkbox-option input[type="checkbox"] {
        width: 20px;
        height: 20px;
        margin-right: 8px;
        border: 2px solid var(--neutral-sand);
        border-radius: 4px;
        cursor: pointer;
        accent-color: var(--pear);
    }

    .checkbox-option label {
        margin: 0;
        cursor: pointer;
        font-weight: 500;
        color: var(--medium-text);
    }

    /* Botón WhatsApp */
    .btn-whatsapp-main {
        width: 100%;
        padding: 18px;
        background: #25D366;
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-bottom: 16px;
    }

    .btn-whatsapp-main:hover {
        background: #20BA5A;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 211, 102, 0.3);
        color: white;
    }

    .form-divider {
        display: flex;
        align-items: center;
        gap: 20px;
        margin: 24px 0;
        color: var(--light-text);
        font-size: 0.9rem;
    }

    .form-divider::before,
    .form-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--neutral-sand);
    }

    /* Botón Submit */
    .btn-submit-form {
        width: 100%;
        padding: 18px;
        background: var(--pear);
        color: var(--dark-purple);
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-submit-form:hover {
        background: #b8c230;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(204, 213, 55, 0.4);
    }

    /* Info Cards Horizontales */
    .info-cards-horizontal {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        max-width: 900px;
        margin: 0 auto;
    }

    .info-card-h {
        background: var(--neutral-white);
        padding: 32px 24px;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .info-card-h:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .info-icon-h {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 1.5rem;
    }

    .info-card-h:nth-child(1) .info-icon-h {
        background: rgba(204, 213, 55, 0.15);
        color: var(--pear);
    }

    .info-card-h:nth-child(2) .info-icon-h {
        background: rgba(255, 45, 241, 0.15);
        color: var(--steel-pink);
    }

    .info-card-h:nth-child(3) .info-icon-h {
        background: rgba(165, 21, 140, 0.15);
        color: var(--tropical-indigo);
    }

    .info-card-h h6 {
        font-size: 1rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 8px;
    }

    .info-card-h a,
    .info-card-h p {
        font-size: 0.95rem;
        color: var(--medium-text);
        text-decoration: none;
        margin: 0;
    }

    .info-card-h a:hover {
        color: var(--steel-pink);
    }

    /* Responsive */
    @media (max-width: 968px) {
        .info-cards-horizontal {
            grid-template-columns: 1fr;
            max-width: 500px;
        }

        .form-card-floating {
            padding: 50px 35px;
        }

        .form-row-split {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .contact-hero-minimal {
            padding-top: 140px;
        }

        .form-card-floating {
            padding: 40px 25px;
        }

        .hero-content-minimal h1 {
            font-size: 2.2rem;
        }

        .checkbox-container {
            flex-direction: column;
            gap: 12px;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
    }
</style>

<!-- Contact Hero Section - Minimalista -->
<section class="contact-hero-minimal">
    <div class="container">
        <div class="hero-content-minimal">
            <h1>
                Hablemos de tu
                <span class="highlight">Transformación</span>
            </h1>
            <p>
                Contáctame para conocer todos los detalles del Move Challenge y comenzar tu cambio hoy.
            </p>

            <!-- Social Icons -->
            <div class="social-inline">
                <a href="https://www.instagram.com/anabelleibalu/" target="_blank" class="social-btn" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@anabelleibalu" target="_blank" class="social-btn" title="TikTok">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="https://facebook.com/anabelleibalu" target="_blank" class="social-btn" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://threads.net/@anabelleibalu" target="_blank" class="social-btn" title="Threads">
                    <i class="fas fa-at"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Form Section Centrada -->
<section class="form-section-centered">
    <div class="container">
        <div class="form-wrapper">
            <!-- Form Card Flotante -->
            <div class="form-card-floating">
                <span class="form-badge">
                    <i class="fas fa-envelope me-2"></i>
                    Contacto
                </span>

                <h2>Escríbeme directamente</h2>
                <p class="subtitle">Respondo en menos de 24 horas</p>

                <!-- WhatsApp Button -->
                <a href="https://wa.link/nq2ezt" target="_blank" class="btn-whatsapp-main">
                    <i class="fab fa-whatsapp" style="font-size: 1.5rem;"></i>
                    <span>Escribir por WhatsApp</span>
                </a>

                <!-- Divider -->
                <div class="form-divider">
                    <span>o envía un mensaje</span>
                </div>

                <!-- Contact Form -->
                <form action="" method="POST">
                    @csrf
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Tu nombre completo" required>
                    </div>

                    <!-- Email y Teléfono -->
                    <div class="form-row-split">
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="tu@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="tel" id="phone" name="phone" class="form-input" placeholder="+57" required>
                        </div>
                    </div>

                    <!-- Objetivo -->
                    <div class="form-group">
                        <label for="goal">Tu mensaje</label>
                        <textarea id="goal" name="goal" class="form-input" placeholder="Cuéntame qué te motivó a buscar un cambio..." required></textarea>
                    </div>

                    <!-- Intereses -->
                    <!-- <div class="form-group">
                        <label>Te interesa</label>
                        <div class="checkbox-container">
                            <div class="checkbox-option">
                                <input type="checkbox" id="entrenamiento" name="interests[]" value="entrenamiento">
                                <label for="entrenamiento">Entrenamiento</label>
                            </div>
                            <div class="checkbox-option">
                                <input type="checkbox" id="nutricion" name="interests[]" value="nutricion">
                                <label for="nutricion">Nutrición</label>
                            </div>
                            <div class="checkbox-option">
                                <input type="checkbox" id="mindfulness" name="interests[]" value="mindfulness">
                                <label for="mindfulness">Mindfulness</label>
                            </div>
                        </div>
                    </div> -->

                    <!-- Submit -->
                    <button type="submit" class="btn-submit-form">
                        Enviar Mensaje
                        <i class="fas fa-paper-plane ms-2"></i>
                    </button>
                </form>
            </div>

            <!-- Info Cards Horizontales -->
            <div class="info-cards-horizontal">
                <!-- Email -->
                <div class="info-card-h">
                    <div class="info-icon-h">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h6>Email</h6>
                    <a href="mailto:hola@anabelleibalu.com">hola@anabelleibalu.com</a>
                </div>

                <!-- Instagram -->
                <div class="info-card-h">
                    <div class="info-icon-h">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h6>Instagram</h6>
                    <a href="https://www.instagram.com/anabelleibalu/" target="_blank">@anabelleibalu</a>
                </div>

                <!-- Response Time -->
                <div class="info-card-h">
                    <div class="info-icon-h">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h6>Respuesta</h6>
                    <p>Menos de 24h</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection