@extends('layouts.app')
@section('content')

@include('partials.hero')

<section id="testimonios" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Lo que dice la comunidad</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card">
                    <img src="{{ asset('images/testimonial-1.jpg') }}" alt="Participante 1" class="testimonial-avatar"
                         onerror="this.src='{{ asset('images/user.png') }}'">
                    <h5>María G.</h5>
                    <p class="text-muted">MOVE Challenge</p>
                    <p>"En 30 días recuperé mi energía. Las rutinas son realistas y la comunidad te sostiene."</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card">
                    <img src="{{ asset('images/testimonial-2.jpg') }}" alt="Participante 2" class="testimonial-avatar"
                         onerror="this.src='{{ asset('images/user.png') }}'">
                    <h5>Carlos R.</h5>
                    <p class="text-muted">MOVE Challenge</p>
                    <p>"La mezcla de ejercicio y gratitud diaria me cambió el chip. ¡Super recomendado!"</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card">
                    <img src="{{ asset('images/testimonial-3.jpg') }}" alt="Participante 3" class="testimonial-avatar"
                         onerror="this.src='{{ asset('images/user.png') }}'">
                    <h5>Ana M.</h5>
                    <p class="text-muted">MOVE Challenge</p>
                    <p>"Me sentí acompañada todo el tiempo. Aprendí a moverme y a comer sin culpa."</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
