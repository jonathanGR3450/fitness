@php
    $idioma = 'es';
    $pagina = 'configuracion';
    $layoutContents = App\Models\Contenido::where('pagina',$pagina)
        ->where('idioma',$idioma)
        ->orderBy('seccion')->orderBy('orden')
        ->get()
        ->groupBy('seccion');

    $get = function($sec,$key,$def=null) use ($layoutContents) {
        return optional(($layoutContents[$sec] ?? collect())->firstWhere('clave',$key))->valor ?? $def;
    };

    $fLogo    = $get('footer','logo','images/logo_blanco.png'); // imagen
    $fDesc    = $get('footer','descripcion','Transformando vidas a través del movimiento consciente.');

    $fb  = $get('footer','facebook_url','#');
    $ig  = $get('footer','instagram_url','#');
    $wa  = $get('footer','whatsapp_url','#');

    $copy = $get('footer','copyright',"Copyright ".config('app.name')." © ".date('Y'));
    $priv = $get('footer','privacy_url','#');
    $terms= $get('footer','terms_url','#');
@endphp

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="{{ asset($fLogo) }}" alt="{{ config('app.name') }}" class="footer-logo">
                <p class="footer-description">{{ $fDesc }}</p>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="footer-links">
                    <h5>Enlaces rápidos</h5>
                    <div class="footer-menu">
                        <a href="{{ route('welcome') }}">Inicio</a>
                        <a href="{{ route('about') }}">Sobre mí</a>
                        <a href="{{ route('move') }}">MOVE Challenge</a>
                        <a href="{{ route('community') }}">Programas</a>
                        <a href="{{ route('contact') }}">Contacto</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="social-section">
                    <h5>Síguenos</h5>
                    <div class="social-links">
                        <a href="{{ $fb }}" title="Facebook" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="{{ $ig }}" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $wa }}" title="WhatsApp" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>{{ $copy }}</p>
            <div>
                <a href="{{ $priv }}" target="_blank">Política de privacidad</a> |
                <a href="{{ $terms }}" target="_blank">Términos y condiciones</a>
            </div>
        </div>
    </div>
</footer>
