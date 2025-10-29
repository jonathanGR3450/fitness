@extends('layouts.app')
@section('seo')
  @include('partials.seo', ['slug' => 'blog'])
@endsection
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');

    :root {
        --princeton-orange: #F6DC43;
        --steel-pink: #FF2DF1;
        --tropical-indigo: #A5158C;
        --pear: #CCD537;
        --dark-purple: #410445;
        --cream-text: #ffeac5;
        --neutral-light: #FAF9F7;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Hero del Post Individual */
    .post-hero {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background: linear-gradient(135deg, rgba(65, 4, 69, 0.95), rgba(165, 21, 140, 0.9));
        padding: 180px 0 80px;
        overflow: hidden;
    }

    .post-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: var(--hero-bg-image);
        background-size: cover;
        background-position: center;
        opacity: 0.15;
        z-index: 0;
    }

    .post-hero::after {
        content: '';
        position: absolute;
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%);
        width: 80%;
        height: 100px;
        background: var(--pear);
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.2;
    }

    .post-hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        padding: 0 20px;
    }

    .post-category-badge {
        display: inline-block;
        padding: 10px 28px;
        background: var(--pear);
        color: var(--dark-purple);
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 24px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .post-hero h1 {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 700;
        color: var(--cream-text);
        margin-bottom: 24px;
        line-height: 1.2;
    }

    .post-meta-hero {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 30px;
        font-size: 1rem;
        color: var(--cream-text);
        opacity: 0.9;
        flex-wrap: wrap;
    }

    .post-meta-hero span {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .post-meta-hero i {
        color: var(--pear);
    }

    /* Contenedor Principal del Artículo */
    .article-container {
        max-width: 900px;
        margin: -80px auto 80px;
        padding: 0 20px;
        position: relative;
        z-index: 10;
    }

    /* Imagen Destacada */
    .featured-image-container {
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
        margin-bottom: 60px;
        border: 3px solid rgba(255, 234, 197, 0.1);
    }

    .featured-image-container img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        display: block;
    }

    /* Contenido del Artículo */
    .article-content {
        background: rgba(45, 27, 61, 0.5);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 234, 197, 0.1);
        border-radius: 30px;
        padding: 60px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        color: var(--cream-text);
        line-height: 1.8;
        font-size: 1.1rem;
    }

    /* Estilos para el contenido HTML del editor Quill */
    .article-content h1,
    .article-content h2,
    .article-content h3,
    .article-content h4,
    .article-content h5,
    .article-content h6 {
        color: var(--cream-text);
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 700;
        line-height: 1.3;
    }

    .article-content h1 { font-size: 2.5rem; }
    .article-content h2 { font-size: 2rem; }
    .article-content h3 { font-size: 1.75rem; }
    .article-content h4 { font-size: 1.5rem; }
    .article-content h5 { font-size: 1.25rem; }
    .article-content h6 { font-size: 1.1rem; }

    .article-content p {
        margin-bottom: 1.5rem;
        color: var(--cream-text);
        opacity: 0.95;
    }

    .article-content strong {
        color: var(--pear);
        font-weight: 600;
    }

    .article-content em {
        font-style: italic;
        color: var(--cream-text);
    }

    .article-content ul,
    .article-content ol {
        margin: 1.5rem 0;
        padding-left: 2rem;
    }

    .article-content li {
        margin-bottom: 0.8rem;
        color: var(--cream-text);
        opacity: 0.95;
    }

    .article-content blockquote {
        border-left: 4px solid var(--pear);
        padding: 1.5rem 2rem;
        margin: 2rem 0;
        background: rgba(204, 213, 55, 0.1);
        border-radius: 10px;
        font-style: italic;
        color: var(--cream-text);
    }

    .article-content a {
        color: var(--pear);
        text-decoration: underline;
        transition: color 0.3s ease;
    }

    .article-content a:hover {
        color: var(--princeton-orange);
    }

    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 15px;
        margin: 2rem 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .article-content code {
        background: rgba(255, 234, 197, 0.1);
        padding: 3px 8px;
        border-radius: 5px;
        font-family: 'Courier New', monospace;
        color: var(--princeton-orange);
        font-size: 0.95rem;
    }

    .article-content pre {
        background: rgba(0, 0, 0, 0.3);
        padding: 1.5rem;
        border-radius: 10px;
        overflow-x: auto;
        margin: 2rem 0;
    }

    .article-content pre code {
        background: none;
        padding: 0;
        color: var(--cream-text);
    }

    /* Botón para volver al blog */
    .back-to-blog {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 32px;
        background: rgba(204, 213, 55, 0.2);
        color: var(--cream-text);
        border: 2px solid var(--pear);
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-bottom: 40px;
    }

    .back-to-blog:hover {
        background: var(--pear);
        color: var(--dark-purple);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(204, 213, 55, 0.4);
    }

    /* Posts Relacionados */
    .related-posts {
        padding: 80px 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .related-posts h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--cream-text);
        text-align: center;
        margin-bottom: 50px;
    }

    .related-posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .related-post-card {
        background: rgba(45, 27, 61, 0.5);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 234, 197, 0.1);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .related-post-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        background: rgba(45, 27, 61, 0.6);
    }

    .related-post-image {
        height: 200px;
        overflow: hidden;
    }

    .related-post-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .related-post-card:hover .related-post-image img {
        transform: scale(1.1);
    }

    .related-post-content {
        padding: 25px;
    }

    .related-post-content h3 {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--cream-text);
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .related-post-content h3 a {
        color: var(--cream-text);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .related-post-content h3 a:hover {
        color: var(--pear);
    }

    .related-post-meta {
        font-size: 0.9rem;
        color: var(--cream-text);
        opacity: 0.75;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .post-hero {
            padding-top: 140px;
        }

        .article-content {
            padding: 40px 30px;
            font-size: 1rem;
        }

        .featured-image-container img {
            height: 300px;
        }

        .article-container {
            margin-top: -60px;
        }
    }

    @media (max-width: 480px) {
        .article-content {
            padding: 30px 20px;
        }

        .post-meta-hero {
            gap: 15px;
            font-size: 0.9rem;
        }
    }
</style>

@php
    $heroImage = $postData['imagen'] ?? 'images/blog-featured.jpg';
@endphp

<!-- Hero del Post -->
<section class="post-hero" style="--hero-bg-image: url('{{ asset($heroImage) }}');">
    <div class="post-hero-content">
        <span class="post-category-badge">{{ $postData['categoria'] ?? 'Blog' }}</span>
        <h1>{{ $postData['titulo'] }}</h1>
        <div class="post-meta-hero">
            <span><i class="fas fa-calendar-alt"></i> {{ $postData['fecha'] }}</span>
            @if(isset($postData['autor']))
                <span><i class="fas fa-user"></i> {{ $postData['autor'] }}</span>
            @endif
            <span><i class="fas fa-clock"></i> {{ $postData['lectura'] }} min de lectura</span>
        </div>
    </div>
</section>

<!-- Contenido del Artículo -->
<div class="article-container">
    <a href="{{ route('blog') }}" class="back-to-blog">
        <i class="fas fa-arrow-left"></i> Volver al Blog
    </a>

    <!-- Imagen Destacada -->
    <div class="featured-image-container">
        <img src="{{ asset($postData['imagen']) }}" alt="{{ $postData['titulo'] }}" onerror="this.src='{{ asset('images/banner3.jpeg') }}'">
    </div>

    <!-- Contenido del Post -->
    <article class="article-content">
        {!! $postData['contenido'] !!}
    </article>
</div>

<!-- Posts Relacionados -->
<section class="related-posts">
    <h2>También te puede interesar</h2>
    <div class="related-posts-grid">
        @php
            $sec = $contenidos['blog_posts'] ?? collect();
            $relatedPosts = [];
            for($i = 1; $i <= 3; $i++) {
                $relatedPosts[] = [
                    'titulo' => optional($sec->firstWhere('clave', "post_{$i}_titulo"))->valor ?? 'Post relacionado',
                    'imagen' => optional($sec->firstWhere('clave', "post_{$i}_imagen"))->valor ?? "images/blog-{$i}.jpg",
                    'fecha' => optional($sec->firstWhere('clave', "post_{$i}_fecha"))->valor ?? date('d F Y'),
                    'lectura' => optional($sec->firstWhere('clave', "post_{$i}_lectura"))->valor ?? '5',
                    'url' => route('blog.show', ['tipo' => 'post', 'id' => $i]),
                ];
            }
        @endphp

        @foreach($relatedPosts as $related)
            <div class="related-post-card">
                <div class="related-post-image">
                    <img src="{{ asset($related['imagen']) }}" alt="{{ $related['titulo'] }}">
                </div>
                <div class="related-post-content">
                    <h3><a href="{{ $related['url'] }}">{{ $related['titulo'] }}</a></h3>
                    <p class="related-post-meta">
                        <i class="fas fa-calendar-alt"></i> {{ $related['fecha'] }} •
                        <i class="fas fa-clock"></i> {{ $related['lectura'] }} min
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection
