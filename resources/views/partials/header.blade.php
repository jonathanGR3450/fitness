@php
    $idioma = 'es';
    $pagina = 'configuracion';
    $layoutContents = App\Models\Contenido::where('pagina',$pagina)
        ->where('idioma',$idioma)
        ->orderBy('seccion')->orderBy('orden')
        ->get()
        ->groupBy('seccion');
    // Contenidos cargados por el layout o por el controlador que comparta a layouts:
    // $layoutContents: collection agrupada por seccion -> clave (opcional)
    $get = function($sec,$key,$def=null) use ($layoutContents) {
        return optional(($layoutContents[$sec] ?? collect())->firstWhere('clave',$key))->valor ?? $def;
    };

    $logo     = $get('header','logo','images/logo.png');             // imagen
    $ctaTxt   = $get('header','cta_texto','ÚNETE AL CHALLENGE');     // texto
    $ctaUrl   = $get('header','cta_url', route('contact'));          // url
@endphp

<header class="site-header sticky-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img src="{{ asset($logo) }}" alt="{{ config('app.name') }}">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu"
                    aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Sobre mí</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('move') ? 'active' : '' }}" href="{{ route('move') }}">MOVE Challenge</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('community') ? 'active' : '' }}" href="{{ route('community') }}">Programas</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contacto</a></li>
                </ul>

                <a href="{{ $ctaUrl }}" class="btn btn-primaryy ms-lg-3">{{ $ctaTxt }}</a>

                @auth
                    <div class="dropdown ms-3">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="bi bi-speedometer2 me-2"></i> Ir al Dashboard
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>
