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

    /* Blog Hero Section */
    .blog-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background: rgba(165, 21, 140, 0.06);
        padding: 180px 0 80px;
        text-align: center;
        overflow: hidden;
    }

    /* Formas orgánicas decorativas */
    .blog-hero::before {
        content: '';
        position: absolute;
        top: -10%;
        left: -5%;
        width: 450px;
        height: 450px;
        background: var(--pear);
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        opacity: 0.06;
        animation: morph 15s ease-in-out infinite;
        z-index: 1;
    }

    .blog-hero::after {
        content: '';
        position: absolute;
        bottom: -15%;
        right: -8%;
        width: 400px;
        height: 400px;
        background: var(--steel-pink);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        opacity: 0.05;
        animation: morph 18s ease-in-out infinite reverse;
        z-index: 1;
    }

    @keyframes morph {
        0%, 100% {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            transform: rotate(0deg);
        }
        50% {
            border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
            transform: rotate(180deg);
        }
    }

    .blog-hero-content {
        position: relative;
        z-index: 2;
        max-width: 700px;
        margin: 0 auto;
    }

    .hero-badge-blog {
        display: inline-block;
        padding: 12px 32px;
        background: var(--dark-purple);
        color: white;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 24px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .blog-hero h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        color: var(--dark-text);
        margin-bottom: 24px;
        line-height: 1.2;
    }

    .blog-hero .highlight {
        color: var(--steel-pink);
    }

    .blog-hero p {
        font-size: 1.25rem;
        color: var(--medium-text);
        line-height: 1.7;
        margin-bottom: 40px;
    }

    /* Categories Filter */
    .categories-filter {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .category-btn {
        padding: 10px 24px;
        background: var(--neutral-white);
        color: var(--dark-text);
        border: 2px solid var(--neutral-sand);
        border-radius: 50px;
        font-weight: 500;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .category-btn:hover,
    .category-btn.active {
        background: var(--pear);
        color: var(--dark-purple);
        border-color: var(--pear);
        transform: translateY(-2px);
    }

    /* Blog Posts Section */
    .blog-posts-section {
        padding: 100px 0;
        background: rgba(250, 249, 247, 0.7);
        position: relative;
    }

    /* Featured Post */
    .featured-post {
        margin-bottom: 80px;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease-out 0.2s forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .featured-card {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 40px;
        background: var(--neutral-white);
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.12);
        transition: all 0.4s ease;
    }

    .featured-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 70px rgba(0, 0, 0, 0.18);
    }

    .featured-image {
        position: relative;
        height: 450px;
        overflow: hidden;
    }

    .featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .featured-card:hover .featured-image img {
        transform: scale(1.08);
    }

    .featured-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        padding: 8px 20px;
        background: var(--steel-pink);
        color: white;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        z-index: 2;
    }

    .featured-content {
        padding: 50px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .featured-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
        font-size: 0.9rem;
        color: var(--medium-text);
    }

    .featured-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .featured-content h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--dark-text);
        margin-bottom: 16px;
        line-height: 1.3;
    }

    .featured-excerpt {
        font-size: 1.05rem;
        color: var(--medium-text);
        line-height: 1.7;
        margin-bottom: 28px;
    }

    .btn-read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 32px;
        background: var(--pear);
        color: var(--dark-purple);
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        align-self: flex-start;
    }

    .btn-read-more:hover {
        background: #b8c230;
        transform: translateX(5px);
        color: var(--dark-purple);
    }

    /* Posts Grid */
    .posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 40px;
    }

    .post-card {
        background: var(--neutral-white);
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        opacity: 0;
        transform: translateY(30px);
    }

    .post-card.animate-in {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .post-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.15);
    }

    .post-image {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .post-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .post-card:hover .post-image img {
        transform: scale(1.1);
    }

    .post-category {
        position: absolute;
        top: 16px;
        left: 16px;
        padding: 6px 18px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .category-fitness {
        background: var(--steel-pink);
        color: white;
    }

    .category-nutricion {
        background: var(--pear);
        color: var(--dark-text);
    }

    .category-mindfulness {
        background: var(--tropical-indigo);
        color: white;
    }

    .category-wellness {
        background: var(--princeton-orange);
        color: var(--dark-purple);
    }

    .post-content {
        padding: 32px 28px;
    }

    .post-meta {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 16px;
        font-size: 0.85rem;
        color: var(--medium-text);
    }

    .post-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .post-content h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--dark-text);
        margin-bottom: 12px;
        line-height: 1.4;
    }

    .post-content h3 a {
        color: var(--dark-text);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .post-content h3 a:hover {
        color: var(--steel-pink);
    }

    .post-excerpt {
        font-size: 0.95rem;
        color: var(--medium-text);
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .post-read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--pear);
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .post-read-more:hover {
        gap: 12px;
        color: #b8c230;
    }

    /* Pagination */
    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        margin-top: 80px;
    }

    .pagination-btn {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--neutral-white);
        color: var(--dark-text);
        border: 2px solid var(--neutral-sand);
        border-radius: 50%;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .pagination-btn:hover,
    .pagination-btn.active {
        background: var(--pear);
        color: var(--dark-purple);
        border-color: var(--pear);
        transform: scale(1.1);
    }

    .pagination-btn.disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }

    .pagination-btn.disabled:hover {
        background: var(--neutral-white);
        color: var(--dark-text);
        transform: scale(1);
    }

    /* Newsletter CTA */
    .newsletter-cta {
        margin-top: 100px;
        padding: 60px;
        background: var(--dark-purple);
        border-radius: 30px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .newsletter-cta::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
    }

    .newsletter-cta h3 {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 16px;
        position: relative;
        z-index: 2;
    }

    .newsletter-cta p {
        font-size: 1.1rem;
        margin-bottom: 32px;
        opacity: 0.95;
        position: relative;
        z-index: 2;
    }

    .newsletter-form {
        display: flex;
        gap: 12px;
        max-width: 500px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .newsletter-input {
        flex: 1;
        padding: 16px 24px;
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .newsletter-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .newsletter-input:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .newsletter-btn {
        padding: 16px 36px;
        background: var(--pear);
        color: var(--dark-purple);
        border: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .newsletter-btn:hover {
        background: #b8c230;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(204, 213, 55, 0.4);
    }

    /* Responsive */
    @media (max-width: 968px) {
        .featured-card {
            grid-template-columns: 1fr;
        }

        .featured-image {
            height: 350px;
        }

        .featured-content {
            padding: 40px 30px;
        }

        .posts-grid {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .newsletter-cta {
            padding: 50px 30px;
        }

        .newsletter-form {
            flex-direction: column;
        }
    }

    @media (max-width: 640px) {
        .blog-hero {
            padding-top: 140px;
        }

        .posts-grid {
            grid-template-columns: 1fr;
        }

        .featured-content h2 {
            font-size: 1.6rem;
        }

        .newsletter-cta h3 {
            font-size: 1.5rem;
        }

        .categories-filter {
            gap: 8px;
        }

        .category-btn {
            padding: 8px 18px;
            font-size: 0.85rem;
        }
    }
</style>

<!-- Blog Hero Section -->
<section class="blog-hero">
    <div class="container">
        <div class="blog-hero-content">
            <span class="hero-badge-blog">
                <i class="fas fa-pen-fancy me-2"></i>
                Blog
            </span>
            <h1>
                Historias de
                <span class="highlight d-block">Transformación</span>
            </h1>
            <p>
                Consejos, guías y motivación para tu viaje hacia un estilo de vida más saludable y consciente.
            </p>

            <!-- Categories Filter -->
            <div class="categories-filter">
                <a href="#" class="category-btn active">Todos</a>
                <a href="#" class="category-btn">Fitness</a>
                <a href="#" class="category-btn">Nutrición</a>
                <a href="#" class="category-btn">Mindfulness</a>
                <a href="#" class="category-btn">Wellness</a>
            </div>
        </div>
    </div>
</section>

<!-- Blog Posts Section -->
<section class="blog-posts-section">
    <div class="container">
        <!-- Featured Post -->
        <div class="featured-post">
            <div class="featured-card">
                <div class="featured-image">
                    <span class="featured-badge">Destacado</span>
                    <img src="{{ asset('images/blog-featured.jpg') }}" alt="Post destacado" 
                         onerror="this.src='{{ asset('images/banner3.jpeg') }}'">
                </div>
                <div class="featured-content">
                    <div class="featured-meta">
                        <span>
                            <i class="fas fa-calendar-alt"></i>
                            15 Enero 2025
                        </span>
                        <span>
                            <i class="fas fa-user"></i>
                            Anabelle Ibalu
                        </span>
                        <span>
                            <i class="fas fa-clock"></i>
                            5 min
                        </span>
                    </div>
                    <h2>Cómo el Move Challenge transformó mi relación con el ejercicio</h2>
                    <p class="featured-excerpt">
                        Descubre cómo 30 días de movimiento consciente pueden cambiar completamente tu perspectiva 
                        sobre el fitness y crear hábitos sostenibles que duran toda la vida.
                    </p>
                    <a href="#" class="btn-read-more">
                        Leer más
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Posts Grid -->
        <div class="posts-grid">
            <!-- Post 1 -->
            <article class="post-card" data-index="0">
                <div class="post-image">
                    <span class="post-category category-fitness">Fitness</span>
                    <img src="{{ asset('images/blog-1.jpg') }}" alt="Post 1" 
                         onerror="this.src='{{ asset('images/ana1.png') }}'">
                </div>
                <div class="post-content">
                    <div class="post-meta">
                        <span>
                            <i class="fas fa-calendar-alt"></i>
                            10 Enero 2025
                        </span>
                        <span>
                            <i class="fas fa-clock"></i>
                            4 min
                        </span>
                    </div>
                    <h3>
                        <a href="#">5 ejercicios para empezar tu día con energía</a>
                    </h3>
                    <p class="post-excerpt">
                        Rutina matutina de 10 minutos que activará tu cuerpo y mente para un día productivo.
                    </p>
                    <a href="#" class="post-read-more">
                        Leer artículo
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Post 2 -->
            <article class="post-card" data-index="1">
                <div class="post-image">
                    <span class="post-category category-nutricion">Nutrición</span>
                    <img src="{{ asset('images/blog-2.jpg') }}" alt="Post 2" 
                         onerror="this.src='{{ asset('images/ana2.png') }}'">
                </div>
                <div class="post-content">
                    <div class="post-meta">
                        <span>
                            <i class="fas fa-calendar-alt"></i>
                            8 Enero 2025
                        </span>
                        <span>
                            <i class="fas fa-clock"></i>
                            6 min
                        </span>
                    </div>
                    <h3>
                        <a href="#">Alimentación consciente: qué es y cómo practicarla</a>
                    </h3>
                    <p class="post-excerpt">
                        Aprende a conectar con tu comida y transformar tu relación con la alimentación.
                    </p>
                    <a href="#" class="post-read-more">
                        Leer artículo
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Post 3 -->
            <article class="post-card" data-index="2">
                <div class="post-image">
                    <span class="post-category category-mindfulness">Mindfulness</span>
                    <img src="{{ asset('images/blog-3.jpg') }}" alt="Post 3" 
                         onerror="this.src='{{ asset('images/ana3.png') }}'">
                </div>
                <div class="post-content">
                    <div class="post-meta">
                        <span>
                            <i class="fas fa-calendar-alt"></i>
                            5 Enero 2025
                        </span>
                        <span>
                            <i class="fas fa-clock"></i>
                            5 min
                        </span>
                    </div>
                    <h3>
                        <a href="#">Meditación para principiantes: guía práctica</a>
                    </h3>
                    <p class="post-excerpt">
                        Los primeros pasos para incorporar la meditación a tu rutina diaria.
                    </p>
                    <a href="#" class="post-read-more">
                        Leer artículo
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Post 4 -->
            <article class="post-card" data-index="3">
                <div class="post-image">
                    <span class="post-category category-wellness">Wellness</span>
                    <img src="{{ asset('images/blog-4.jpg') }}" alt="Post 4" 
                         onerror="this.src='{{ asset('images/ana4.png') }}'">
                </div>
                <div class="post-content">
                    <div class="post-meta">
                        <span>
                            <i class="fas fa-calendar-alt"></i>
                            3 Enero 2025
                        </span>
                        <span>
                            <i class="fas fa-clock"></i>
                            7 min
                        </span>
                    </div>
                    <h3>
                        <a href="#">Hábitos que transformarán tu vida en 30 días</a>
                    </h3>
                    <p class="post-excerpt">
                        Pequeños cambios diarios que generan grandes resultados a largo plazo.
                    </p>
                    <a href="#" class="post-read-more">
                        Leer artículo
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Post 5 -->
            <article class="post-card" data-index="4">
                <div class="post-image">
                    <span class="post-category category-fitness">Fitness</span>
                    <img src="{{ asset('images/blog-5.jpg') }}" alt="Post 5" 
                         onerror="this.src='{{ asset('images/ana5.png') }}'">
                </div>
                <div class="post-content">
                    <div class="post-meta">
                        <span>
                            <i class="fas fa-calendar-alt"></i>
                            1 Enero 2025
                        </span>
                        <span>
                            <i class="fas fa-clock"></i>
                            5 min
                        </span>
                    </div>
                    <h3>
                        <a href="#">Entrenamiento en casa: equipamiento básico</a>
                    </h3>
                    <p class="post-excerpt">
                        Todo lo que necesitas para crear tu gym en casa sin gastar una fortuna.
                    </p>
                    <a href="#" class="post-read-more">
                        Leer artículo
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Post 6 -->
            <article class="post-card" data-index="5">
                <div class="post-image">
                    <span class="post-category category-nutricion">Nutrición</span>
                    <img src="{{ asset('images/blog-6.jpg') }}" alt="Post 6" 
                         onerror="this.src='{{ asset('images/ana6.png') }}'">
                </div>
                <div class="post-content">
                    <div class="post-meta">
                        <span>
                            <i class="fas fa-calendar-alt"></i>
                            28 Diciembre 2024
                        </span>
                        <span>
                            <i class="fas fa-clock"></i>
                            8 min
                        </span>
                    </div>
                    <h3>
                        <a href="#">Recetas saludables para después del entrenamiento</a>
                    </h3>
                    <p class="post-excerpt">
                        Nutrición post-workout para maximizar tus resultados y recuperación.
                    </p>
                    <a href="#" class="post-read-more">
                        Leer artículo
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            <a href="#" class="pagination-btn disabled">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a href="#" class="pagination-btn active">1</a>
            <a href="#" class="pagination-btn">2</a>
            <a href="#" class="pagination-btn">3</a>
            <a href="#" class="pagination-btn">4</a>
            <a href="#" class="pagination-btn">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>

        <!-- Newsletter CTA -->
        <div class="newsletter-cta">
            <h3>Recibe contenido exclusivo</h3>
            <p>Suscríbete a nuestro newsletter y recibe tips semanales de wellness</p>
            <form class="newsletter-form">
                <input type="email" class="newsletter-input" placeholder="tu@email.com" required>
                <button type="submit" class="newsletter-btn">
                    Suscribirme
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- JavaScript para animación en scroll -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.post-card');
    
    // Intersection Observer para animar cards al hacer scroll
    const observerOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -80px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = parseInt(entry.target.dataset.index) * 100;
                setTimeout(() => {
                    entry.target.classList.add('animate-in');
                }, delay);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    cards.forEach(card => {
        observer.observe(card);
    });
});
</script>

@endsection