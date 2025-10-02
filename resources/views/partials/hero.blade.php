
<section id="inicio" class="hero-section" style="position: relative; min-height: 100vh; display: flex; align-items: center; background-image: url('{{ asset('images/banner1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    
    <!-- Overlay con gradiente -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(240, 85, 165, 0.75) 0%, rgba(204, 213, 55, 0.6) 100%); z-index: 1;"></div>
    
    <!-- Contenido -->
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-8 ps-lg-5">
                <div style="animation: fadeInUp 1s ease-out;">
                    <h1 style="color: white; font-size: 3.5rem; font-weight: 800; margin-bottom: 1.5rem; text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4); line-height: 1.2;">
                        MOVE Challenge con Anabelle Ibalu
                    </h1>
                    <p style="color: white; font-size: 1.5rem; font-weight: 300; margin-bottom: 2rem; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);">
                        30 días para moverte, agradecer y transformar tu energía.
                    </p>
                    <a target="_blank" 
                       href="https://wa.link/nq2ezt" 
                       style="display: inline-block; background: white; color: #F055A5; padding: 18px 40px; font-size: 1.2rem; font-weight: 700; text-decoration: none; border-radius: 50px; box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3); transition: all 0.3s ease; border: 3px solid white;"
                       onmouseover="this.style.background='#CCD537'; this.style.color='white'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 12px 35px rgba(0, 0, 0, 0.4)';"
                       onmouseout="this.style.background='white'; this.style.color='#F055A5'; this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(0, 0, 0, 0.3)';">
                        <i class="fas fa-rocket me-2"></i>Inscríbete ahora
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Flecha scroll down -->
    <a href="#nosotros" 
       style="position: absolute; bottom: 40px; left: 50%; transform: translateX(-50%); z-index: 2; color: white; font-size: 2rem; text-decoration: none; animation: bounce 2s infinite;"
       title="Descubre más">
        <i class="fas fa-chevron-down"></i>
    </a>
</section>
