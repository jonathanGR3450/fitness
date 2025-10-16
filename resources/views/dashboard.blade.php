@extends('layouts.app')

@section('content')
<style>
    .dashboard-container {
        min-height: calc(100vh - 100px);
        padding-top: 100px;
        padding-bottom: 50px;
    }

    .dashboard-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 1rem;
    }

    .dashboard-subtitle {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 3rem;
    }

    .page-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        border: 2px solid transparent;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .page-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(240, 85, 165, 0.15);
        border-color: #F055A5;
    }

    .page-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, #F055A5 0%, #B8437D 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 1.8rem;
        color: white;
    }

    .page-card.config .page-icon {
        background: linear-gradient(135deg, #410445 0%, #2a022c 100%);
    }

    .page-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.8rem;
    }

    .page-description {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }

    .btn-edit {
        background: #410445;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-edit:hover {
        background: #2a022c;
        color: white;
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(65, 4, 69, 0.3);
    }

    .section-divider {
        margin: 3rem 0 2rem;
        text-align: center;
        position: relative;
    }

    .section-divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent 0%, #ddd 50%, transparent 100%);
    }

    .section-divider span {
        background: white;
        padding: 0 20px;
        position: relative;
        color: #999;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>

<div class="dashboard-container">
    <div class="container">
        <div class="text-center">
            <h1 class="dashboard-title">Panel de Administración</h1>
            <p class="dashboard-subtitle">Edita el contenido de todas las páginas de tu sitio web</p>
        </div>

        <!-- Páginas del Sitio -->
        <div class="row g-4 mb-4">
            <!-- Inicio -->
            <div class="col-md-6 col-lg-4">
                <div class="page-card">
                    <div>
                        <div class="page-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3 class="page-title">Inicio</h3>
                        <p class="page-description">Edita la página principal con el carrusel hero y secciones destacadas</p>
                    </div>
                    <a href="{{ url('/admin/paginas/inicio') }}" class="btn-edit">
                        <i class="fas fa-edit me-2"></i>Editar Página
                    </a>
                    <a href="{{ route('admin.seo.edit', 'inicio') }}" class="btn-edit mt-2">
                        <i class="fas fa-search me-2"></i>SEO
                    </a>
                </div>
            </div>

            <!-- Sobre mí -->
            <div class="col-md-6 col-lg-4">
                <div class="page-card">
                    <div>
                        <div class="page-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3 class="page-title">Sobre mí</h3>
                        <p class="page-description">Actualiza tu biografía, misión, visión y valores personales</p>
                    </div>
                    <a href="{{ url('/admin/paginas/sobre-mi') }}" class="btn-edit">
                        <i class="fas fa-edit me-2"></i>Editar Página
                    </a>
                    <a href="{{ route('admin.seo.edit', 'sobre-mi') }}" class="btn-edit mt-2">
                        <i class="fas fa-search me-2"></i>SEO
                    </a>
                </div>
            </div>

            <!-- MOVE Challenge -->
            <div class="col-md-6 col-lg-4">
                <div class="page-card">
                    <div>
                        <div class="page-icon">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                        <h3 class="page-title">MOVE Challenge</h3>
                        <p class="page-description">Gestiona información del programa, beneficios y planes</p>
                    </div>
                    <a href="{{ url('/admin/paginas/move-challenge') }}" class="btn-edit">
                        <i class="fas fa-edit me-2"></i>Editar Página
                    </a>
                    <a href="{{ route('admin.seo.edit', 'move') }}" class="btn-edit mt-2">
                        <i class="fas fa-search me-2"></i>SEO
                    </a>
                </div>
            </div>

            <!-- Programas -->
            <div class="col-md-6 col-lg-4">
                <div class="page-card">
                    <div>
                        <div class="page-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="page-title">Programas</h3>
                        <p class="page-description">Administra tus programas de entrenamiento y comunidad</p>
                    </div>
                    <a href="{{ url('/admin/paginas/programas') }}" class="btn-edit">
                        <i class="fas fa-edit me-2"></i>Editar Página
                    </a>
                    <a href="{{ route('admin.seo.edit', 'community') }}" class="btn-edit mt-2">
                        <i class="fas fa-search me-2"></i>SEO
                    </a>
                </div>
            </div>

            <!-- Blog -->
            <div class="col-md-6 col-lg-4">
                <div class="page-card">
                    <div>
                        <div class="page-icon">
                            <i class="fas fa-blog"></i>
                        </div>
                        <h3 class="page-title">Blog</h3>
                        <p class="page-description">Publica y edita artículos, tips y contenido educativo</p>
                    </div>
                    <a href="{{ url('/admin/paginas/blog') }}" class="btn-edit">
                        <i class="fas fa-edit me-2"></i>Editar Página
                    </a>
                    <a href="{{ route('admin.seo.edit', 'blog') }}" class="btn-edit mt-2">
                        <i class="fas fa-search me-2"></i>SEO
                    </a>
                </div>
            </div>

            <!-- Contacto -->
            <div class="col-md-6 col-lg-4">
                <div class="page-card">
                    <div>
                        <div class="page-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="page-title">Contacto</h3>
                        <p class="page-description">Actualiza información de contacto y formulario</p>
                    </div>
                    <a href="{{ url('/admin/paginas/contacto') }}" class="btn-edit">
                        <i class="fas fa-edit me-2"></i>Editar Página
                    </a>
                    <a href="{{ route('admin.seo.edit', 'contact') }}" class="btn-edit mt-2">
                        <i class="fas fa-search me-2"></i>SEO
                    </a>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="section-divider">
            <span>Configuración</span>
        </div>

        <!-- Configuración Global -->
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="page-card config">
                    <div>
                        <div class="page-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <h3 class="page-title">Configuración Global</h3>
                        <p class="page-description">
                            Administra configuraciones generales: redes sociales, footer, 
                            información de contacto, logo y colores del sitio
                        </p>
                    </div>
                    <a href="{{ route('admin.configuracion') }}" class="btn-edit">
                        <i class="fas fa-cog me-2"></i>Configurar Sitio
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection