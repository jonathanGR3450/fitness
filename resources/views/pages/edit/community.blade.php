@extends('layouts.admin')

@section('title', 'Editar Página - Community')

@section('content')
@php
    // $contenidos llega agrupado por seccion->clave desde el controlador
    // helpers:
    $getSec = fn($sec) => $contenidos[$sec] ?? collect();
    $cv = function($sec,$key,$default=null) use ($getSec) {
        return optional($getSec($sec)->firstWhere('clave',$key))->valor ?? $default;
    };
    $idioma = $idioma ?? 'es';
    $pagina = $pagina ?? 'community';
@endphp

<div class="container-fluid py-4">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
      <div class="card" style="position: sticky; top: 80px;">
        <div class="card-header bg-primary text-white"><h5 class="mb-0">📋 Secciones</h5></div>
        <div class="list-group list-group-flush">
          <a href="#seccion-programs-hero" class="list-group-item list-group-item-action active" data-section="programs-hero">🔥 Hero Programas</a>
          <a href="#seccion-programs-grid" class="list-group-item list-group-item-action" data-section="programs-grid">🧩 Grid de Programas (6)</a>
          <a href="#seccion-programs-cta" class="list-group-item list-group-item-action" data-section="programs-cta">🚀 CTA Programas</a>
        </div>
      </div>
    </div>

    <!-- Formularios -->
    <div class="col-md-9">
      <!-- Header -->
      <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
          <h2 class="mb-1">✏️ Editar “Community”</h2>
          <div>
            <a href="{{ route('community') }}" class="btn btn-outline-primary" target="_blank">👁️ Ver Página</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver al Dashboard</a>
          </div>
        </div>
      </div>

      <!-- Tabs -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="btn-group w-100 section-tabs" role="group">
            <button type="button" class="btn btn-outline-primary active" data-target="seccion-programs-hero">🔥 Hero</button>
            <button type="button" class="btn btn-outline-primary" data-target="seccion-programs-grid">🧩 Grid</button>
            <button type="button" class="btn btn-outline-primary" data-target="seccion-programs-cta">🚀 CTA</button>
          </div>
        </div>
      </div>

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          ✅ {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <!-- ========================= -->
      <!-- FORM 1: PROGRAMS HERO -->
      <!-- ========================= -->
      @php $sec = 'programs_hero'; @endphp
      <form action="{{ route('paginas.community.update.hero') }}" method="POST" class="section-form" id="seccion-programs-hero" data-section="seccion-programs-hero">
        @csrf @method('PUT')
        <input type="hidden" name="idioma" value="{{ $idioma }}">
        <input type="hidden" name="pagina" value="{{ $pagina }}">
        <input type="hidden" name="seccion" value="programs_hero">

        <div class="card mb-4">
          <div class="card-header bg-light"><h4 class="mb-0">🔥 Hero Programas</h4></div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-4">
                <label class="form-label d-flex align-items-center"><strong>Badge</strong><span class="badge bg-primary ms-2">TEXTO</span></label>
                <input type="text" name="programs_hero__badge" class="form-control" value="{{ $cv($sec,'badge','Nuestros Programas') }}">
              </div>
              <div class="col-md-8">
                <label class="form-label d-flex align-items-center"><strong>Título (permite HTML)</strong><span class="badge bg-primary ms-2">TEXTO</span></label>
                <input type="text" name="programs_hero__titulo" class="form-control" value="{{ $cv($sec,'titulo','Encuentra tu <span class=highlight>Programa Ideal</span>') }}">
              </div>
              <div class="col-md-12">
                <label class="form-label d-flex align-items-center"><strong>Subtítulo</strong><span class="badge bg-primary ms-2">TEXTO</span></label>
                <textarea name="programs_hero__subtitulo" rows="3" class="form-control">{{ $cv($sec,'subtitulo','Programas diseñados para cada objetivo y nivel de condición física. Descubre el que mejor se adapta a ti y comienza tu transformación hoy.') }}</textarea>
              </div>
            </div>
          </div>
          <div class="card-footer bg-light d-flex justify-content-end">
            <button class="btn btn-primary btn-lg">💾 Guardar Hero</button>
          </div>
        </div>
      </form>

      <!-- ========================= -->
      <!-- FORM 2: PROGRAMS GRID (6) -->
      <!-- ========================= -->
      @php $sec = 'programs_grid'; @endphp
      <form action="{{ route('paginas.community.update.grid') }}" method="POST" enctype="multipart/form-data" class="section-form" id="seccion-programs-grid" data-section="seccion-programs-grid" style="display:none;">
        @csrf @method('PUT')
        <input type="hidden" name="idioma" value="{{ $idioma }}">
        <input type="hidden" name="pagina" value="{{ $pagina }}">
        <input type="hidden" name="seccion" value="programs_grid">

        <div class="card mb-4">
          <div class="card-header bg-light"><h4 class="mb-0">🧩 Grid de Programas (6 tarjetas)</h4></div>
          <div class="card-body">
            <div class="row g-4">
              @for($i=1;$i<=6;$i++)
                @php
                  $img = $cv($sec,"prog_{$i}_imagen","images/ana{$i}.png");
                  $tit = $cv($sec,"prog_{$i}_titulo", match($i){
                    1=>'MOVE Challenge', 2=>'YOGA Flow', 3=>'HIIT Power', 4=>'Dance Fit', 5=>'Wellness 360', 6=>'Strong Body'
                  });
                  $desc = $cv($sec,"prog_{$i}_descripcion", match($i){
                    1=>'30 días de transformación integral con movimiento consciente, nutrición y mindfulness.',
                    2=>'Conecta cuerpo y mente con secuencias de yoga para todos los niveles.',
                    3=>'Alta intensidad para quemar calorías y ganar fuerza rápidamente.',
                    4=>'Baila, diviértete y quema calorías al ritmo de la mejor música.',
                    5=>'Bienestar integral: ejercicio, nutrición y salud mental.',
                    6=>'Fuerza y resistencia con entrenamiento funcional.'
                  });
                  $url = $cv($sec,"prog_{$i}_url", $i===1 ? (Route::has('move') ? route('move') : '#') : '#');
                @endphp

                <div class="col-12">
                  <h5 class="text-primary mb-2">📦 Programa {{ $i }}</h5>
                </div>

                <div class="col-md-6">
                  <label class="form-label d-flex align-items-center"><strong>Imagen</strong><span class="badge bg-success ms-2">IMAGEN</span></label>
                  <ul class="nav nav-tabs mb-2">
                    <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#grid-{{$i}}-upload" type="button">📤 Subir</button></li>
                    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#grid-{{$i}}-url" type="button">🔗 URL</button></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="grid-{{$i}}-upload">
                      <input type="file" name="programs_grid__prog_{{ $i }}_imagen_file" class="form-control mb-2" accept="image/*">
                      <small class="text-muted">JPG/PNG/WEBP/SVG máx. 4MB</small>
                    </div>
                    <div class="tab-pane fade" id="grid-{{$i}}-url">
                      <input type="text" name="programs_grid__prog_{{ $i }}_imagen_url" class="form-control" value="{{ $img }}" placeholder="images/ana{{ $i }}.png">
                    </div>
                  </div>
                  <div class="mt-2 border rounded p-2 bg-light">
                    <img src="{{ asset($img) }}" class="img-thumbnail" style="max-height:160px;max-width:100%;" onerror="this.src='{{ asset('images/sinfondo.png') }}'">
                    <small class="d-block text-muted mt-1">Actual: <code>{{ $img }}</code></small>
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="form-label"><strong>Título</strong></label>
                  <input type="text" name="programs_grid__prog_{{ $i }}_titulo" class="form-control" value="{{ $tit }}">
                  <label class="form-label mt-3"><strong>Descripción</strong></label>
                  <textarea name="programs_grid__prog_{{ $i }}_descripcion" rows="3" class="form-control">{{ $desc }}</textarea>
                  <label class="form-label mt-3"><strong>URL</strong></label>
                  <input type="text" name="programs_grid__prog_{{ $i }}_url" class="form-control" value="{{ $url }}" placeholder="https:// o #ancla">
                </div>

                @if($i<6)<div class="col-12"><hr></div>@endif
              @endfor
            </div>
          </div>
          <div class="card-footer bg-light d-flex justify-content-end">
            <button class="btn btn-primary btn-lg">💾 Guardar Grid</button>
          </div>
        </div>
      </form>

      <!-- ========================= -->
      <!-- FORM 3: CTA PROGRAMS -->
      <!-- ========================= -->
      @php $sec = 'programs_cta'; @endphp
      <form action="{{ route('paginas.community.update.cta') }}" method="POST" class="section-form" id="seccion-programs-cta" data-section="seccion-programs-cta" style="display:none;">
        @csrf @method('PUT')
        <input type="hidden" name="idioma" value="{{ $idioma }}">
        <input type="hidden" name="pagina" value="{{ $pagina }}">
        <input type="hidden" name="seccion" value="programs_cta">

        <div class="card mb-4">
          <div class="card-header bg-light"><h4 class="mb-0">🚀 CTA Programas</h4></div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-12">
                <label class="form-label"><strong>Título</strong></label>
                <input type="text" name="programs_cta__titulo" class="form-control" value="{{ $cv($sec,'titulo','¿No sabes cuál elegir?') }}">
              </div>
              <div class="col-md-12">
                <label class="form-label"><strong>Subtítulo</strong></label>
                <textarea name="programs_cta__subtitulo" rows="3" class="form-control">{{ $cv($sec,'subtitulo','Contáctame y te ayudaré a encontrar el programa perfecto para ti según tus objetivos y nivel actual.') }}</textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>Texto del botón</strong></label>
                <input type="text" name="programs_cta__boton_texto" class="form-control" value="{{ $cv($sec,'boton_texto','Habla Conmigo') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>URL del botón</strong></label>
                <input type="text" name="programs_cta__boton_url" class="form-control" value="{{ $cv($sec,'boton_url', (Route::has('contact') ? route('contact') : '#')) }}">
              </div>
            </div>
          </div>
          <div class="card-footer bg-light d-flex justify-content-end">
            <button class="btn btn-primary btn-lg">💾 Guardar CTA</button>
          </div>
        </div>
      </form>

      <div class="card">
        <div class="card-body">
          <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver al Dashboard</a>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Estilos y JS iguales a tus páginas previas (tabs/scroll) --}}
<style>
  .list-group-item{border-left:3px solid transparent;transition:.3s;cursor:pointer}
  .list-group-item:hover,.list-group-item.active{border-left-color:#0d6efd;background-color: #0d6efd;font-weight:600}
  .section-tabs{flex-wrap:wrap}
  .section-tabs .btn{flex:1 1 auto;min-width:100px;margin-bottom:5px}
  .section-tabs .btn.active{background:#0d6efd;color:#fff;font-weight:700}
  .section-form{animation:fadeIn .3s ease-in}
  @keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
</style>
<script>
  document.addEventListener('DOMContentLoaded',function(){
    const links=document.querySelectorAll('.list-group-item[data-section]');
    const tabs=document.querySelectorAll('.section-tabs .btn');
    const forms=document.querySelectorAll('.section-form');
    const show=(id)=>{
      forms.forEach(f=>f.style.display='none');
      const target=document.querySelector(`#${id}`);
      if(target){target.style.display='block'; setTimeout(()=>target.scrollIntoView({behavior:'smooth',block:'start'}),100);}
      links.forEach(l=>{l.classList.toggle('active', ('seccion-'+l.dataset.section)===id);});
      tabs.forEach(b=>{b.classList.toggle('active', b.dataset.target===id);});
    }
    links.forEach(l=>l.addEventListener('click',e=>{e.preventDefault(); show('seccion-'+l.dataset.section);}));
    tabs.forEach(b=>b.addEventListener('click',()=>show(b.dataset.target)));
    show('seccion-programs-hero');
  });
</script>
@endsection
