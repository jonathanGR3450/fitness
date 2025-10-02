@extends('layouts.app')
@section('content')

@include('partials.hero')

<section id="servicios" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">¿Qué encontrarás aquí?</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-running"></i></div>
                    <h4>MOVE Challenge</h4>
                    <p>Reto de 30 días con rutinas, calendario y seguimiento.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-book-open"></i></div>
                    <h4>Blog</h4>
                    <p>Deporte, nutrición y hábitos saludables que sí se sostienen.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-hands-helping"></i></div>
                    <h4>Comunidad</h4>
                    <p>Historias reales, retos, lives e integración con Instagram.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-handshake"></i></div>
                    <h4>Trabaja conmigo</h4>
                    <p>Media Kit y colaboraciones con marcas alineadas.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
