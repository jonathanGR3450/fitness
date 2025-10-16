@extends('layouts.admin')
@section('title','Editar Layout (Header & Footer)')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
      <div class="card" style="position: sticky; top: 80px;">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">📋 Secciones</h5>
        </div>
        <div class="list-group list-group-flush">
          <a href="#seccion-header" class="list-group-item list-group-item-action active" data-section="header">🧭 Header</a>
          <a href="#seccion-footer" class="list-group-item list-group-item-action" data-section="footer">🔻 Footer</a>
        </div>
      </div>
    </div>

    <!-- Formularios -->
    <div class="col-md-9">
      <!-- Header de página -->
      <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
          <h2 class="mb-1">✏️ Editar “Layout”</h2>
          <a href="{{ route('welcome') }}" class="btn btn-outline-primary" target="_blank">👁️ Ver sitio</a>
        </div>
      </div>

      <!-- Tabs -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="btn-group w-100 section-tabs" role="group">
            <button type="button" class="btn btn-outline-primary active" data-target="seccion-header">🧭 Header</button>
            <button type="button" class="btn btn-outline-primary" data-target="seccion-footer">🔻 Footer</button>
          </div>
        </div>
      </div>

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          ✅ {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      @php
        $idioma = $idioma ?? 'es';
        $pagina = 'configuracion';
        $get = fn($sec,$key,$def=null)=> optional(($contenidos[$sec] ?? collect())->firstWhere('clave',$key))->valor ?? $def;
      @endphp

      {{-- ============== FORM 1: HEADER ============== --}}
      <form action="{{ route('layout.update.header') }}" method="POST" enctype="multipart/form-data" class="section-form" id="seccion-header" data-section="seccion-header">
        @csrf @method('PUT')
        <input type="hidden" name="idioma" value="{{ $idioma }}">
        <input type="hidden" name="pagina" value="{{ $pagina }}">

        <div class="card mb-4">
          <div class="card-header bg-light"><h4 class="mb-0">🧭 Header</h4></div>
          <div class="card-body">
            <div class="row g-3">
              {{-- Logo --}}
              <div class="col-md-12">
                <label class="form-label d-flex align-items-center">
                  <strong>Logo Header</strong><span class="badge bg-success ms-2">IMAGEN</span>
                </label>

                <ul class="nav nav-tabs mb-3">
                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#logo-header-upload" type="button">📤 Subir</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#logo-header-url" type="button">🔗 URL</button>
                  </li>
                </ul>

                @php $logoVal = $get('header','logo','images/logo.png'); @endphp
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="logo-header-upload">
                    <input type="file" name="header__logo_file" class="form-control mb-2" accept="image/*">
                    <small class="text-muted">JPG/PNG/WEBP/SVG máx. 2MB</small>
                  </div>
                  <div class="tab-pane fade" id="logo-header-url">
                    <input type="text" name="header__logo_url" class="form-control" value="{{ $logoVal }}" placeholder="images/logo.png">
                  </div>
                </div>

                <div class="mt-2">
                  <img src="{{ asset($logoVal) }}" class="img-thumbnail" style="max-height:100px" onerror="this.style.display='none'">
                  <small class="text-muted d-block">Actual: <code>{{ $logoVal }}</code></small>
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label"><strong>CTA Texto</strong></label>
                <input type="text" name="header__cta_texto" class="form-control" value="{{ $get('header','cta_texto','ÚNETE AL CHALLENGE') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>CTA URL</strong></label>
                <input type="text" name="header__cta_url" class="form-control" value="{{ $get('header','cta_url', route('contact')) }}">
              </div>
            </div>
          </div>
          <div class="card-footer bg-light d-flex justify-content-end">
            <button class="btn btn-primary btn-lg">💾 Guardar Header</button>
          </div>
        </div>
      </form>

      {{-- ============== FORM 2: FOOTER ============== --}}
      <form action="{{ route('layout.update.footer') }}" method="POST" enctype="multipart/form-data" class="section-form" id="seccion-footer" data-section="seccion-footer" style="display:none;">
        @csrf @method('PUT')
        <input type="hidden" name="idioma" value="{{ $idioma }}">
        <input type="hidden" name="pagina" value="{{ $pagina }}">

        <div class="card mb-4">
          <div class="card-header bg-light"><h4 class="mb-0">🔻 Footer</h4></div>
          <div class="card-body">
            <div class="row g-3">
              {{-- Logo footer --}}
              <div class="col-md-12">
                <label class="form-label d-flex align-items-center">
                  <strong>Logo Footer</strong><span class="badge bg-success ms-2">IMAGEN</span>
                </label>

                <ul class="nav nav-tabs mb-3">
                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#logo-footer-upload" type="button">📤 Subir</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#logo-footer-url" type="button">🔗 URL</button>
                  </li>
                </ul>

                @php $fLogoVal = $get('footer','logo','images/logo_blanco.png'); @endphp
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="logo-footer-upload">
                    <input type="file" name="footer__logo_file" class="form-control mb-2" accept="image/*">
                  </div>
                  <div class="tab-pane fade" id="logo-footer-url">
                    <input type="text" name="footer__logo_url" class="form-control" value="{{ $fLogoVal }}" placeholder="images/logo_blanco.png">
                  </div>
                </div>

                <div class="mt-2">
                  <img src="{{ asset($fLogoVal) }}" class="img-thumbnail" style="max-height:100px" onerror="this.style.display='none'">
                  <small class="text-muted d-block">Actual: <code>{{ $fLogoVal }}</code></small>
                </div>
              </div>

              <div class="col-md-12">
                <label class="form-label"><strong>Descripción</strong></label>
                <textarea name="footer__descripcion" class="form-control" rows="2">{{ $get('footer','descripcion','Transformando vidas a través del movimiento consciente.') }}</textarea>
              </div>

              <div class="col-12"><hr></div>

              <div class="col-md-4">
                <label class="form-label"><strong>Facebook URL</strong></label>
                <input type="text" name="footer__facebook_url" class="form-control" value="{{ $get('footer','facebook_url','#') }}">
              </div>
              <div class="col-md-4">
                <label class="form-label"><strong>Instagram URL</strong></label>
                <input type="text" name="footer__instagram_url" class="form-control" value="{{ $get('footer','instagram_url','#') }}">
              </div>
              <div class="col-md-4">
                <label class="form-label"><strong>WhatsApp URL</strong></label>
                <input type="text" name="footer__whatsapp_url" class="form-control" value="{{ $get('footer','whatsapp_url','#') }}">
              </div>

              <div class="col-12"><hr></div>

              <div class="col-md-6">
                <label class="form-label"><strong>Política de privacidad (URL)</strong></label>
                <input type="text" name="footer__privacy_url" class="form-control" value="{{ $get('footer','privacy_url','#') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>Términos & condiciones (URL)</strong></label>
                <input type="text" name="footer__terms_url" class="form-control" value="{{ $get('footer','terms_url','#') }}">
              </div>

              <div class="col-md-12">
                <label class="form-label"><strong>Copyright</strong></label>
                <input type="text" name="footer__copyright" class="form-control" value="{{ $get('footer','copyright',"Copyright ".config('app.name')." © ".date('Y')) }}">
              </div>
            </div>
          </div>
          <div class="card-footer bg-light d-flex justify-content-end">
            <button class="btn btn-primary btn-lg">💾 Guardar Footer</button>
          </div>
        </div>
      </form>

      <div class="card">
        <div class="card-body">
          <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver</a>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Scripts de tabs/side como en Contact --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  const sidebar = document.querySelectorAll('.list-group-item[data-section]');
  const tabs = document.querySelectorAll('.section-tabs .btn');
  const forms = document.querySelectorAll('.section-form');

  function showSection(id){
    forms.forEach(f=>f.style.display='none');
    const t = document.querySelector(`#${id}`);
    if(t){ t.style.display='block'; t.scrollIntoView({behavior:'smooth', block:'start'}); }

    sidebar.forEach(a=>a.classList.toggle('active', 'seccion-'+a.dataset.section===id));
    tabs.forEach(b=>b.classList.toggle('active', b.dataset.target===id));
  }

  sidebar.forEach(a=>a.addEventListener('click', e=>{
    e.preventDefault(); showSection('seccion-'+a.dataset.section);
  }));
  tabs.forEach(b=>b.addEventListener('click', ()=> showSection(b.dataset.target)));

  showSection('seccion-header');
});
</script>

<style>
  .section-tabs{ flex-wrap:wrap; }
  .section-tabs .btn{ flex:1 1 auto; min-width:120px; margin-bottom:6px; }
  .section-tabs .btn.active{ background:#0d6efd; color:#fff; font-weight:600; }
  .list-group-item{ border-left:3px solid transparent; transition:.2s; cursor:pointer; }
  .list-group-item:hover,.list-group-item.active{ border-left-color:#0d6efd; background:#f8f9fa; font-weight:600; }
</style>
@endsection
