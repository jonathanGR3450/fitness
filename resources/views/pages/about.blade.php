@extends('layouts.app')
@section('content')

@include('partials.hero')

{{-- Contenido de la sección "Sobre mí" que hoy tienes dentro de <section id="nosotros" ...> --}}
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="video-wrapper">
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
                            <div>
                                <h5 class="mb-0">Plan de entrenamiento semipersonalizados<br><small>(en casa o en el gym)</small></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-apple-alt me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div>
                                <h5 class="mb-0">Plan de alimentación que nutre tu cuerpo y tus metas<br><small>(adaptado a tus requerimientos y gustos)</small></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-utensils me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div>
                                <h5 class="mb-0">Recetas fáciles y nutritivas</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-spa me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div>
                                <h5 class="mb-0">Guía de meditación y respiración consciente</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-lightbulb me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div>
                                <h5 class="mb-0">Tips y consejos prácticos de conexión interior</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-running me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div>
                                <h5 class="mb-0">Guía de movilidad y estiramientos</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-users me-3 mt-1" style="font-size:1.4rem; color: var(--primary-color);"></i>
                            <div>
                                <h5 class="mb-0">Acompañamiento de un equipo de profesionales + apoyo constante</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
