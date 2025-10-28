@extends('layouts.admin')

@section('title', 'Editar SEO - ' . ($page->title ?? ucfirst(str_replace('-', ' ', $page->slug))))

@section('content')
@php
    // URL pública "Ver página" (ajusta según tus routes)
    $publicUrl = match($page->slug) {
        'sobre-mi'  => Route::has('about') ? route('about') : url('/sobre-mi'),
        'inicio'    => url('/'),
        'move'      => url('/move'),
        'community' => url('/community'),
        'contact'   => Route::has('contact') ? route('contact') : url('/contact'),
        'blog'      => Route::has('blog') ? route('blog') : url('/blog'),
        default     => url('/' . $page->slug),
    };
@endphp

<div class="container-fluid py-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card" style="position: sticky; top: 80px;">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">🔎 SEO de la página</h5>
                    <small class="opacity-75">“{{ $page->title ?? ucfirst(str_replace('-', ' ', $page->slug)) }}”</small>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#seccion-meta" class="list-group-item list-group-item-action active" data-section="meta">
                        🏷️ Meta Tags
                    </a>
                    <a href="#seccion-og" class="list-group-item list-group-item-action" data-section="og">
                        🌐 Open Graph
                    </a>
                    <a href="#seccion-twitter" class="list-group-item list-group-item-action" data-section="twitter">
                        🕊️ Twitter Cards
                    </a>
                    <a href="#seccion-extra" class="list-group-item list-group-item-action" data-section="extra">
                        ⚙️ Extra / Sitemap
                    </a>
                    <a href="#seccion-schema" class="list-group-item list-group-item-action" data-section="schema">
                        📦 JSON-LD (Schema)
                    </a>
                </div>
            </div>
        </div>

        <!-- Main -->
        <div class="col-md-9">
            <!-- Header -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-1">✏️ Editar SEO</h2>
                            <div class="text-muted">Página: <strong>{{ $page->slug }}</strong></div>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ $publicUrl }}" class="btn btn-outline-primary" target="_blank">👁️ Ver página</a>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver al Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="btn-group w-100 section-tabs" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-target="seccion-meta">🏷️ Meta</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-og">🌐 Open Graph</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-twitter">🕊️ Twitter</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-extra">⚙️ Extra</button>
                        <button type="button" class="btn btn-outline-primary" data-target="seccion-schema">📦 Schema</button>
                    </div>
                </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ✅ {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Revisa los campos:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('admin.seo.update', $page->slug) }}" method="POST" class="section-form-all">
                @csrf
                @method('PUT')

                <!-- ===================== -->
                <!-- SECCION: META TAGS   -->
                <!-- ===================== -->
                <div class="card mb-4 section-form" id="seccion-meta" data-section="seccion-meta">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">🏷️ Meta Tags</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Título SEO</strong>
                                    <span class="badge bg-primary ms-2">150</span>
                                </label>
                                <input type="text" name="meta_title" class="form-control"
                                       value="{{ old('meta_title', $seo->meta_title) }}"
                                       maxlength="150" placeholder="Título optimizado">
                                <small class="text-muted">Aparece como título en buscadores. <span id="counter-title" class="ms-2 fw-semibold">0/150</span></small>
                            </div>

                            <div class="col-12">
                                <label class="form-label d-flex align-items-center">
                                    <strong>Meta descripción</strong>
                                    <span class="badge bg-primary ms-2">500</span>
                                </label>
                                <textarea name="meta_description" rows="3" class="form-control" maxlength="500"
                                          placeholder="Resumen atractivo">{{ old('meta_description', $seo->meta_description) }}</textarea>
                                <small class="text-muted">Se sugiere 120–155 caracteres. <span id="counter-desc" class="ms-2 fw-semibold">0/500</span></small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><strong>Palabras clave</strong></label>
                                <input type="text" name="meta_keywords" class="form-control"
                                       value="{{ old('meta_keywords', $seo->meta_keywords) }}"
                                       placeholder="coma, separadas, por, comas">
                                <small class="text-muted">Opcional. No son determinantes, pero pueden ayudarte internamente.</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><strong>URL canónica</strong></label>
                                <input type="url" name="canonical_url" class="form-control"
                                       value="{{ old('canonical_url', $seo->canonical_url) }}"
                                       placeholder="{{ url()->current() }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><strong>Directivas Robots</strong></label>
                                <select name="robots" class="form-select">
                                    @php
                                        $robots = old('robots', $seo->robots ?? 'index,follow');
                                    @endphp
                                    <option value="index,follow"   {{ $robots=='index,follow' ? 'selected' : '' }}>index, follow (recomendado)</option>
                                    <option value="noindex,follow" {{ $robots=='noindex,follow' ? 'selected' : '' }}>noindex, follow</option>
                                    <option value="index,nofollow" {{ $robots=='index,nofollow' ? 'selected' : '' }}>index, nofollow</option>
                                    <option value="noindex,nofollow" {{ $robots=='noindex,nofollow' ? 'selected' : '' }}>noindex, nofollow</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><strong>Breadcrumb Title</strong></label>
                                <input type="text" name="breadcrumb_title" class="form-control"
                                       value="{{ old('breadcrumb_title', $seo->breadcrumb_title) }}"
                                       placeholder="Título corto para breadcrumb">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================== -->
                <!-- SECCION: OPEN GRAPH  -->
                <!-- ===================== -->
                <div class="card mb-4 section-form" id="seccion-og" data-section="seccion-og" style="display:none;">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">🌐 Open Graph (Facebook/LinkedIn)</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"><strong>OG Title</strong></label>
                                <input type="text" name="og_title" class="form-control"
                                       value="{{ old('og_title', $seo->og_title) }}" maxlength="150"
                                       placeholder="Si vacío, toma meta title">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>OG Image (URL)</strong></label>
                                <input type="text" name="og_image" class="form-control"
                                       value="{{ old('og_image', $seo->og_image) }}"
                                       placeholder="https://... (1200x630 recomendado)">
                            </div>

                            <div class="col-12">
                                <label class="form-label"><strong>OG Description</strong></label>
                                <textarea name="og_description" rows="2" class="form-control"
                                          placeholder="Si vacío, toma meta description">{{ old('og_description', $seo->og_description) }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label"><strong>OG Type</strong></label>
                                @php $ogType = old('og_type', $seo->og_type ?? 'website'); @endphp
                                <select name="og_type" class="form-select">
                                    <option value="website" {{ $ogType=='website' ? 'selected' : '' }}>website</option>
                                    <option value="article" {{ $ogType=='article' ? 'selected' : '' }}>article</option>
                                    <option value="product" {{ $ogType=='product' ? 'selected' : '' }}>product</option>
                                    <option value="business.business" {{ $ogType=='business.business' ? 'selected' : '' }}>business.business</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><strong>OG URL</strong></label>
                                <input type="url" name="og_url" class="form-control"
                                       value="{{ old('og_url', $seo->og_url) }}" placeholder="Si vacío, toma canónica">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><strong>OG Site Name</strong></label>
                                <input type="text" name="og_site_name" class="form-control"
                                       value="{{ old('og_site_name', $seo->og_site_name ?? config('app.name')) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================== -->
                <!-- SECCION: TWITTER     -->
                <!-- ===================== -->
                <div class="card mb-4 section-form" id="seccion-twitter" data-section="seccion-twitter" style="display:none;">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">🕊️ Twitter Cards</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label"><strong>Card</strong></label>
                                @php $twCard = old('twitter_card', $seo->twitter_card ?? 'summary_large_image'); @endphp
                                <select name="twitter_card" class="form-select">
                                    <option value="summary" {{ $twCard=='summary' ? 'selected' : '' }}>summary</option>
                                    <option value="summary_large_image" {{ $twCard=='summary_large_image' ? 'selected' : '' }}>summary_large_image</option>
                                    <option value="app" {{ $twCard=='app' ? 'selected' : '' }}>app</option>
                                    <option value="player" {{ $twCard=='player' ? 'selected' : '' }}>player</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><strong>@site</strong></label>
                                <input type="text" name="twitter_site" class="form-control"
                                       value="{{ old('twitter_site', $seo->twitter_site) }}" placeholder="@tucuenta">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><strong>@creator</strong></label>
                                <input type="text" name="twitter_creator" class="form-control"
                                       value="{{ old('twitter_creator', $seo->twitter_creator) }}" placeholder="@autor">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><strong>Título</strong></label>
                                <input type="text" name="twitter_title" class="form-control"
                                       value="{{ old('twitter_title', $seo->twitter_title) }}"
                                       placeholder="Si vacío, toma OG title">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Imagen (URL)</strong></label>
                                <input type="text" name="twitter_image" class="form-control"
                                       value="{{ old('twitter_image', $seo->twitter_image) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label"><strong>Descripción</strong></label>
                                <textarea name="twitter_description" rows="2" class="form-control"
                                          placeholder="Si vacío, toma OG description">{{ old('twitter_description', $seo->twitter_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================== -->
                <!-- SECCION: EXTRA       -->
                <!-- ===================== -->
                <div class="card mb-4 section-form" id="seccion-extra" data-section="seccion-extra" style="display:none;">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">⚙️ Configuración adicional / Sitemap</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"><strong>Focus keyword</strong></label>
                                <input type="text" name="focus_keyword" class="form-control"
                                       value="{{ old('focus_keyword', $seo->focus_keyword) }}"
                                       placeholder="palabra clave principal">
                            </div>

                            <div class="col-md-6">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                           id="seo-active"
                                           {{ old('is_active', $seo->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="seo-active">
                                        Activar SEO de esta página
                                    </label>
                                </div>
                            </div>

                            <div class="col-12"><hr></div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sitemap_include" value="1"
                                           id="sitemap-include"
                                           {{ old('sitemap_include', $seo->sitemap_include ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sitemap-include">
                                        Incluir en sitemap.xml
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label"><strong>Prioridad</strong></label>
                                @php $prio = (string) old('sitemap_priority', $seo->sitemap_priority ?? '0.8'); @endphp
                                <select name="sitemap_priority" class="form-select">
                                    @foreach (['1.0','0.9','0.8','0.7','0.5','0.3'] as $p)
                                        <option value="{{ $p }}" {{ $prio===$p ? 'selected' : '' }}>{{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label"><strong>Changefreq</strong></label>
                                @php $cf = old('sitemap_changefreq', $seo->sitemap_changefreq ?? 'weekly'); @endphp
                                <select name="sitemap_changefreq" class="form-select">
                                    @foreach (['always','hourly','daily','weekly','monthly','yearly','never'] as $f)
                                        <option value="{{ $f }}" {{ $cf===$f ? 'selected' : '' }}>{{ $f }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================== -->
                <!-- SECCION: SCHEMA JSON -->
                <!-- ===================== -->
                <div class="card mb-4 section-form" id="seccion-schema" data-section="seccion-schema" style="display:none;">
                    <div class="card-header bg-light d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">📦 Schema.org (JSON-LD)</h4>
                        <small class="text-muted">Pega aquí tu JSON-LD válido</small>
                    </div>
                    <div class="card-body">
                        <textarea name="schema_markup" class="form-control" rows="10" placeholder='{"@context":"https://schema.org", ...}'>{{ old('schema_markup', is_array($seo->schema_markup) ? json_encode($seo->schema_markup, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) : $seo->schema_markup) }}</textarea>
                        <small class="text-muted d-block mt-2">
                            Tip: usa <a href="https://search.google.com/test/rich-results" target="_blank">Rich Results Test</a> para validar.
                        </small>
                    </div>
                </div>

                <!-- Footer actions -->
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                            ← Volver al Dashboard
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg" id="btn-submit-seo">
                            💾 Guardar SEO
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Estilos coherentes con tu editor existente --}}
<style>
    .list-group-item {
        border-left: 3px solid transparent;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .list-group-item:hover,
    .list-group-item.active {
        border-left-color: #0d6efd;
        background-color: #0d6efd
        font-weight: 600;
    }
    .card { box-shadow: 0 2px 4px rgba(0,0,0,.06); }
    .form-control:focus, .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13,110,253,.15);
    }
    .section-tabs { flex-wrap: wrap; }
    .section-tabs .btn { flex: 1 1 auto; min-width: 120px; margin-bottom: 6px; }
    .section-tabs .btn.active { background-color: #0d6efd; color: #fff; font-weight: 600; }
    .section-form { animation: fadeIn .25s ease-in; }
    @keyframes fadeIn { from {opacity:0; transform: translateY(8px);} to {opacity:1; transform:none;} }
</style>

{{-- Scripts: tabs/sidebar + contadores + prevención doble submit --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebarLinks = document.querySelectorAll('.list-group-item[data-section]');
    const tabButtons = document.querySelectorAll('.section-tabs .btn');
    const sections = document.querySelectorAll('.section-form');

    function showSection(sectionId) {
        sections.forEach(s => s.style.display = 'none');
        const target = document.querySelector(`.section-form#${sectionId}`);
        if (target) {
            target.style.display = 'block';
            setTimeout(() => target.scrollIntoView({behavior: 'smooth', block: 'start'}), 100);
        }
        // Sidebar active
        sidebarLinks.forEach(l => {
            l.classList.toggle('active', ('seccion-' + l.dataset.section) === sectionId);
        });
        // Tabs active
        tabButtons.forEach(b => {
            b.classList.toggle('active', b.dataset.target === sectionId);
        });
    }

    // Sidebar clicks
    sidebarLinks.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            showSection('seccion-' + link.dataset.section);
        });
    });

    // Tabs clicks
    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => showSection(btn.dataset.target));
    });

    // Default
    showSection('seccion-meta');

    // Contadores
    const titleInput = document.querySelector('input[name="meta_title"]');
    const descInput  = document.querySelector('textarea[name="meta_description"]');
    const ctTitle = document.getElementById('counter-title');
    const ctDesc  = document.getElementById('counter-desc');

    function paintCounter(el, tgt, max) {
        const len = (el?.value || '').length;
        if (tgt) {
            tgt.textContent = `${len}/${max}`;
            tgt.style.color = len > (max - 10) ? '#dc3545' : len > (max - 50) ? '#fd7e14' : '#198754';
        }
    }
    if (titleInput && ctTitle) {
        titleInput.addEventListener('input', () => paintCounter(titleInput, ctTitle, 150));
        paintCounter(titleInput, ctTitle, 150);
    }
    if (descInput && ctDesc) {
        descInput.addEventListener('input', () => paintCounter(descInput, ctDesc, 500));
        paintCounter(descInput, ctDesc, 500);
    }

    // Prevenir doble submit
    const form = document.querySelector('form.section-form-all');
    const btn = document.getElementById('btn-submit-seo');
    form?.addEventListener('submit', () => {
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Guardando...';
    });
});
</script>
@endsection
