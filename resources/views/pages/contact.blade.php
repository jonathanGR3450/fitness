@extends('layouts.app')

@section('content')

{{-- Hero banner para contacto --}}
<section class="contact-hero position-relative overflow-hidden" style="min-height: 65vh; background: #2c3e50;">
    <div class="position-absolute w-100 h-100" style="top: 0; left: 0;">
        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, rgba(204, 213, 55, 0.9), rgba(240, 85, 165, 0.85));"></div>
    </div>

    <div class="container position-relative" style="z-index: 2; padding-top: 5rem; padding-bottom: 3rem;">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center text-white">
                <span class="badge bg-white px-4 py-2 mb-4" style="color: #CCD537; font-weight: bold;">
                    CONTÁCTAME
                </span>
                
                <h1 class="display-3 fw-bold mb-4">
                    Comencemos tu transformación
                </h1>
                
                <p class="lead mb-5" style="font-size: 1.3rem; max-width: 700px; margin: 0 auto;">
                    Escríbeme y te comparto el detalle del programa Move Challenge
                </p>

                <div class="social-links d-flex gap-3 justify-content-center mb-4">
                    <a href="https://www.instagram.com/anabelleibalu/" target="_blank" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.tiktok.com/@anabelleibalu" target="_blank" class="social-icon">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://facebook.com/anabelleibalu" target="_blank" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://threads.net/@anabelleibalu" target="_blank" class="social-icon">
                        <i class="fab fa-threads"></i>
                    </a>
                </div>

                <a href="https://wa.link/nq2ezt" target="_blank" class="btn btn-lg btn-light px-5 py-3 rounded-pill fw-bold">
                    <i class="fab fa-whatsapp me-2"></i>
                    Escríbeme por WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Formulario --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="bg-white p-5 rounded-4 shadow-sm">
                    <h2 class="fw-bold mb-4" style="color: #2c3e50;">Envíame un mensaje</h2>
                    <p class="text-secondary mb-4">Te respondo en menos de 24 horas</p>

                    <form>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Nombre completo</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Tu nombre" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Correo</label>
                                <input type="email" class="form-control form-control-lg" placeholder="tu@email.com" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Teléfono</label>
                                <input type="tel" class="form-control form-control-lg" placeholder="+57" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Tu objetivo</label>
                            <textarea class="form-control form-control-lg" rows="4" placeholder="Cuéntame..." required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold mb-3">Te interesa</label>
                            <div class="d-flex gap-2 flex-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="entrenamiento">
                                    <label class="form-check-label" for="entrenamiento">Entrenamiento</label>
                                </div>
                                <div class="form-check ms-3">
                                    <input class="form-check-input" type="checkbox" id="nutricion">
                                    <label class="form-check-label" for="nutricion">Nutrición</label>
                                </div>
                                <div class="form-check ms-3">
                                    <input class="form-check-input" type="checkbox" id="mindfulness">
                                    <label class="form-check-label" for="mindfulness">Mindfulness</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-lg w-100 text-white fw-bold" style="background: linear-gradient(135deg, #CCD537, #F055A5); border: none;">
                            Enviar mensaje
                            <i class="fas fa-paper-plane ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="ps-lg-4">
                    <h4 class="fw-bold mb-4" style="color: #2c3e50;">Información</h4>
                    
                    <div class="contact-info-item mb-4 p-3 rounded-3" style="background: white;">
                        <div class="d-flex align-items-center">
                            <div class="icon-box me-3" style="background: rgba(204, 213, 55, 0.15); width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-envelope" style="color: #CCD537; font-size: 1.3rem;"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Email</h6>
                                <a href="mailto:hola@anabelleibalu.com" style="color: #6c757d; text-decoration: none;">hola@anabelleibalu.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="contact-info-item mb-4 p-3 rounded-3" style="background: white;">
                        <div class="d-flex align-items-center">
                            <div class="icon-box me-3" style="background: rgba(240, 85, 165, 0.15); width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-instagram" style="color: #F055A5; font-size: 1.3rem;"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Instagram</h6>
                                <a href="https://www.instagram.com/anabelleibalu/" target="_blank" style="color: #6c757d; text-decoration: none;">@anabelleibalu</a>
                            </div>
                        </div>
                    </div>

                    <div class="contact-info-item mb-4 p-3 rounded-3" style="background: white;">
                        <div class="d-flex align-items-center">
                            <div class="icon-box me-3" style="background: rgba(122, 136, 254, 0.15); width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-clock" style="color: #7A88FE; font-size: 1.3rem;"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Respuesta</h6>
                                <p class="mb-0" style="color: #6c757d;">Menos de 24 horas</p>
                            </div>
                        </div>
                    </div>

                    <div class="alert" style="background: rgba(204, 213, 55, 0.1); border: 2px solid rgba(204, 213, 55, 0.3); border-radius: 12px;">
                        <h6 class="fw-bold mb-2" style="color: #2c3e50;">
                            <i class="fas fa-users me-2"></i>Comunidad
                        </h6>
                        <p class="mb-0 small" style="color: #6c757d;">
                            Más de 500 personas transformando su vida
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.social-icon {
    width: 50px;
    height: 50px;
    background: white;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #2c3e50;
    font-size: 1.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-icon:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    color: #CCD537;
}

.form-control:focus {
    border-color: #CCD537;
    box-shadow: 0 0 0 0.25rem rgba(204, 213, 55, 0.25);
}

.form-check-input:checked {
    background-color: #CCD537;
    border-color: #CCD537;
}
</style>

@endsection