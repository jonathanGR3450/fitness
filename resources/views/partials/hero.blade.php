<section id="inicio" class="hero-carousel">
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        </div>

        <!-- Slides del carrusel -->
        <div class="carousel-inner">
            <!-- Slide 1: MOVE Challenge -->
            <div class="carousel-item active">
                <div class="hero-slide" style="background-image: url('{{ asset('images/banner1.jpg') }}');">
                    <div class="hero-overlay"></div>
                    <div class="hero-content container">
                        <div class="row">
                            <div class="col-lg-8 ps-lg-5">
                                <h1>MOVE Challenge con Anabelle Ibalu</h1>
                                <p class="lead">30 días para moverte, agradecer y transformar tu energía.</p>
                                <a target="_blank" href="https://wa.link/nq2ezt" class="btn btn-primary btn-lg">
                                    Inscríbete ahora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Comunidad -->
            {{-- <div class="carousel-item">
                <div class="hero-slide" style="background-image: url('{{ asset('images/banner2.png') }}');">
                    <div class="hero-overlay"></div>
                    <div class="hero-content container">
                        <div class="row">
                            <div class="col-lg-8 ps-lg-5">
                                <h1>Una comunidad que irradia luz</h1>
                                <p class="lead">Contenido real, hábitos saludables y apoyo constante en cada paso.</p>
                                <a href="#testimonios" class="btn btn-primary btn-lg">Conoce la comunidad</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
  </div>
</section>