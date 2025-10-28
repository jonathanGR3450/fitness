@extends('layouts.admin')
@section('title','Editar Página - Contacto')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
      <div class="card" style="position: sticky; top: 80px;">
        <div class="card-header bg-primary text-white"><h5 class="mb-0">📋 Secciones</h5></div>
        <div class="list-group list-group-flush">
          <a href="#seccion-contact-hero" class="list-group-item list-group-item-action active" data-section="contact-hero">✨ Hero</a>
          <a href="#seccion-contact-form" class="list-group-item list-group-item-action" data-section="contact-form">📨 Formulario</a>
          <a href="#seccion-contact-info" class="list-group-item list-group-item-action" data-section="contact-info">ℹ️ Info Cards</a>
        </div>
      </div>
    </div>

    <!-- Formularios -->
    <div class="col-md-9">
      <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
          <h2 class="mb-1">✏️ Editar “Contacto”</h2>
          <div>
            <a href="{{ route('contact') }}" class="btn btn-outline-primary" target="_blank">👁️ Ver Página</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver al Dashboard</a>
          </div>
        </div>
      </div>

      <div class="card mb-4">
        <div class="card-body">
          <div class="btn-group w-100 section-tabs" role="group">
            <button type="button" class="btn btn-outline-primary active" data-target="seccion-contact-hero">✨ Hero</button>
            <button type="button" class="btn btn-outline-primary" data-target="seccion-contact-form">📨 Formulario</button>
            <button type="button" class="btn btn-outline-primary" data-target="seccion-contact-info">ℹ️ Info</button>
          </div>
        </div>
      </div>

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          ✅ {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      @php
        $idioma = $idioma ?? 'es';
        $pagina = $pagina ?? 'contact';
        $get = fn($sec,$key,$def=null)=> optional(($contenidos[$sec] ?? collect())->firstWhere('clave',$key))->valor ?? $def;
      @endphp

      {{-- =============== FORM 1: CONTACT HERO =============== --}}
      <form action="{{ route('paginas.contact.update.hero') }}" method="POST" class="section-form" id="seccion-contact-hero" data-section="seccion-contact-hero">
        @csrf @method('PUT')
        <input type="hidden" name="idioma" value="{{ $idioma }}">
        <input type="hidden" name="pagina" value="{{ $pagina }}">

        <div class="card mb-4">
          <div class="card-header bg-light"><h4 class="mb-0">✨ Contact Hero</h4></div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-12">
                <label class="form-label d-flex align-items-center"><strong>Título (permite HTML)</strong><span class="badge bg-primary ms-2">TEXTO</span></label>
                <input type="text" name="contact_hero__titulo" class="form-control" value="{{ $get('contact_hero','titulo','Hablemos de tu <span class=highlight>Transformación</span>') }}">
              </div>
              <div class="col-md-12">
                <label class="form-label d-flex align-items-center"><strong>Subtítulo</strong><span class="badge bg-primary ms-2">TEXTO</span></label>
                <textarea name="contact_hero__subtitulo" rows="2" class="form-control">{{ $get('contact_hero','subtitulo','Contáctame para conocer todos los detalles del Move Challenge y comenzar tu cambio hoy.') }}</textarea>
              </div>

              <div class="col-12"><hr></div>
              <div class="col-md-6">
                <label class="form-label"><strong>Instagram URL</strong></label>
                <input type="text" name="contact_hero__instagram_url" class="form-control" value="{{ $get('contact_hero','instagram_url','https://www.instagram.com/anabelleibalu/') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>TikTok URL</strong></label>
                <input type="text" name="contact_hero__tiktok_url" class="form-control" value="{{ $get('contact_hero','tiktok_url','https://www.tiktok.com/@anabelleibalu') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>Facebook URL</strong></label>
                <input type="text" name="contact_hero__facebook_url" class="form-control" value="{{ $get('contact_hero','facebook_url','https://facebook.com/anabelleibalu') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>Threads URL</strong></label>
                <input type="text" name="contact_hero__threads_url" class="form-control" value="{{ $get('contact_hero','threads_url','https://threads.net/@anabelleibalu') }}">
              </div>
            </div>
          </div>
          <div class="card-footer bg-light d-flex justify-content-end">
            <button class="btn btn-primary btn-lg">💾 Guardar Hero</button>
          </div>
        </div>
      </form>

      {{-- =============== FORM 2: CONTACT FORM =============== --}}
      <form action="{{ route('paginas.contact.update.form') }}" method="POST" class="section-form" id="seccion-contact-form" data-section="seccion-contact-form" style="display:none;">
        @csrf @method('PUT')
        <input type="hidden" name="idioma" value="{{ $idioma }}">
        <input type="hidden" name="pagina" value="{{ $pagina }}">

        <div class="card mb-4">
          <div class="card-header bg-light"><h4 class="mb-0">📨 Formulario</h4></div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-4">
                <label class="form-label"><strong>Badge</strong></label>
                <input type="text" name="contact_form__badge" class="form-control" value="{{ $get('contact_form','badge','Contacto') }}">
              </div>
              <div class="col-md-8">
                <label class="form-label"><strong>Título</strong></label>
                <input type="text" name="contact_form__titulo" class="form-control" value="{{ $get('contact_form','titulo','Escríbeme directamente') }}">
              </div>
              <div class="col-md-12">
                <label class="form-label"><strong>Subtítulo</strong></label>
                <textarea name="contact_form__subtitulo" rows="2" class="form-control">{{ $get('contact_form','subtitulo','Respondo en menos de 24 horas') }}</textarea>
              </div>

              <div class="col-12"><hr></div>
              <div class="col-md-6">
                <label class="form-label"><strong>WhatsApp URL</strong></label>
                <input type="text" name="contact_form__whatsapp_url" class="form-control" value="{{ $get('contact_form','whatsapp_url','https://wa.link/nq2ezt') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>WhatsApp Texto</strong></label>
                <input type="text" name="contact_form__whatsapp_texto" class="form-control" value="{{ $get('contact_form','whatsapp_texto','Escribir por WhatsApp') }}">
              </div>

              <div class="col-12"><hr></div>
              <div class="col-md-12">
                <label class="form-label"><strong>Action del formulario</strong></label>
                <input type="text" name="contact_form__form_action" class="form-control" value="{{ $get('contact_form','form_action','#') }}" placeholder="https://... o #">
              </div>

              <div class="col-12"><hr></div>
              <div class="col-md-6">
                <label class="form-label"><strong>PH Nombre</strong></label>
                <input type="text" name="contact_form__placeholder_nombre" class="form-control" value="{{ $get('contact_form','placeholder_nombre','Tu nombre completo') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>PH Email</strong></label>
                <input type="text" name="contact_form__placeholder_email" class="form-control" value="{{ $get('contact_form','placeholder_email','tu@email.com') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>PH Teléfono</strong></label>
                <input type="text" name="contact_form__placeholder_telefono" class="form-control" value="{{ $get('contact_form','placeholder_telefono','+57') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>PH Mensaje</strong></label>
                <input type="text" name="contact_form__placeholder_mensaje" class="form-control" value="{{ $get('contact_form','placeholder_mensaje','Cuéntame qué te motivó a buscar un cambio...') }}">
              </div>

              <div class="col-md-6">
                <label class="form-label"><strong>Texto botón enviar</strong></label>
                <input type="text" name="contact_form__boton_enviar" class="form-control" value="{{ $get('contact_form','boton_enviar','Enviar Mensaje') }}">
              </div>
            </div>
          </div>
          <div class="card-footer bg-light d-flex justify-content-end">
            <button class="btn btn-primary btn-lg">💾 Guardar Formulario</button>
          </div>
        </div>
      </form>

      {{-- =============== FORM 3: CONTACT INFO =============== --}}
      <form action="{{ route('paginas.contact.update.info') }}" method="POST" class="section-form" id="seccion-contact-info" data-section="seccion-contact-info" style="display:none;">
        @csrf @method('PUT')
        <input type="hidden" name="idioma" value="{{ $idioma }}">
        <input type="hidden" name="pagina" value="{{ $pagina }}">

        <div class="card mb-4">
          <div class="card-header bg-light"><h4 class="mb-0">ℹ️ Info Cards</h4></div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label"><strong>Email</strong></label>
                <input type="email" name="contact_info__email" class="form-control" value="{{ $get('contact_info','email','hola@anabelleibalu.com') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label"><strong>IG Handle</strong></label>
                <input type="text" name="contact_info__instagram_handle" class="form-control" value="{{ $get('contact_info','instagram_handle','@anabelleibalu') }}">
              </div>
              <div class="col-md-12">
                <label class="form-label"><strong>IG URL</strong></label>
                <input type="text" name="contact_info__instagram_url" class="form-control" value="{{ $get('contact_info','instagram_url','https://www.instagram.com/anabelleibalu/') }}">
              </div>
              <div class="col-md-12">
                <label class="form-label"><strong>Tiempo de respuesta</strong></label>
                <input type="text" name="contact_info__tiempo_respuesta" class="form-control" value="{{ $get('contact_info','tiempo_respuesta','Menos de 24h') }}">
              </div>
            </div>
          </div>
          <div class="card-footer bg-light d-flex justify-content-end">
            <button class="btn btn-primary btn-lg">💾 Guardar Info</button>
          </div>
        </div>
      </form>

      <div class="card">
        <div class="card-body"><a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver al Dashboard</a></div>
      </div>
    </div>
  </div>
</div>

{{-- Scripts de tabs/side como en tus otras vistas --}}
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

  showSection('seccion-contact-hero');
});
</script>
@endsection
