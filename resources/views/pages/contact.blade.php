@extends('layouts.app')
@section('content')

@include('partials.hero')

<section id="contacto" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5">
                <h2 class="section-title text-center">Contacto</h2>
                <p class="lead">Escríbeme y te comparto el detalle del programa y próximos inicios.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <form class="contact-form">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nombre completo" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Correo electrónico" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" placeholder="Teléfono" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Cuéntame tu objetivo (ganar energía, bajar grasa, crear hábito, etc.)" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar mensaje</button>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="ps-lg-5">
                    <div class="mb-4">
                        <h4>Email</h4>
                        <p>hola@anabelleibalu.com</p>
                    </div>
                    <div class="mb-4">
                        <h4>Instagram</h4>
                        <p>@anabelleibalu</p>
                    </div>
                    <div class="mb-4">
                        <h4>Comunidad</h4>
                        <p>Sigue los retos y tips diarios en historias destacadas.</p>
                    </div>
                    <div>
                        <a target="_blank" href="https://wa.link/nq2ezt" class="whatsapp-btn">
                            <i class="fab fa-whatsapp"></i> Habla conmigo por WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
