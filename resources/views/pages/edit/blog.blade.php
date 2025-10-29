@extends('layouts.admin')
@section('title','Editar Página - Blog')



@section('content')
@php
  // $contenidos llega agrupado por seccion->clave desde el controlador
  $getSec = fn($sec) => $contenidos[$sec] ?? collect();
  $cv = function($sec,$key,$default=null) use ($getSec) {
      return optional($getSec($sec)->firstWhere('clave',$key))->valor ?? $default;
  };
  $idioma = $idioma ?? 'es';
  $pagina = $pagina ?? 'blog';
@endphp

<div class="container-fluid py-4">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
      <div class="card" style="position:sticky;top:80px;">
        <div class="card-header bg-primary text-white"><h5 class="mb-0">📋 Secciones</h5></div>
        <div class="list-group list-group-flush">
          <a href="#seccion-blog-hero" class="list-group-item list-group-item-action active" data-section="blog-hero">📝 Blog Hero</a>
          <a href="#seccion-blog-posts" class="list-group-item list-group-item-action" data-section="blog-posts">🧩 Blog Posts</a>
          <a href="#seccion-newsletter" class="list-group-item list-group-item-action" data-section="newsletter">✉️ Newsletter CTA</a>
        </div>
      </div>
    </div>

    <!-- Formularios -->
    <div class="col-md-9">
      <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
          <h2 class="mb-0">✏️ Editar “Blog”</h2>
          <div>
            <a href="{{ route('blog') }}" class="btn btn-outline-primary" target="_blank">👁️ Ver Página</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver al Dashboard</a>
          </div>
        </div>
      </div>

      <div class="card mb-4">
        <div class="card-body">
          <div class="btn-group w-100 section-tabs" role="group">
            <button type="button" class="btn btn-outline-primary active" data-target="seccion-blog-hero">📝 Hero</button>
            <button type="button" class="btn btn-outline-primary" data-target="seccion-blog-posts">🧩 Posts</button>
            <button type="button" class="btn btn-outline-primary" data-target="seccion-newsletter">✉️ Newsletter</button>
          </div>
        </div>
      </div>

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          ✅ {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <!-- ===================== -->
      <!-- FORM 1: BLOG HERO    -->
      <!-- ===================== -->
      @php $sec='blog_hero'; @endphp
      <form action="{{ route('paginas.blog.update.hero') }}" method="POST" class="section-form" id="seccion-blog-hero" data-section="seccion-blog-hero">
        @csrf @method('PUT')
        <input type="hidden" name="idioma" value="{{ $idioma }}">
        <input type="hidden" name="pagina" value="{{ $pagina }}">
        <input type="hidden" name="seccion" value="blog_hero">

        <div class="card mb-4">
          <div class="card-header bg-light"><h4 class="mb-0">📝 Blog Hero</h4></div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-4">
                <label class="form-label"><strong>Badge</strong></label>
                <input type="text" name="blog_hero__badge" class="form-control" value="{{ $cv($sec,'badge','Blog') }}">
              </div>
              <div class="col-md-8">
                <label class="form-label"><strong>Título (línea 1)</strong></label>
                <input type="text" name="blog_hero__titulo_1" class="form-control" value="{{ $cv($sec,'titulo_1','Historias de') }}">
              </div>
              <div class="col-md-12">
                <label class="form-label"><strong>Título (línea 2, destacada)</strong></label>
                <input type="text" name="blog_hero__titulo_2" class="form-control" value="{{ $cv($sec,'titulo_2','Transformación') }}">
              </div>
              <div class="col-md-12">
                <label class="form-label"><strong>Subtítulo</strong></label>
                <textarea name="blog_hero__subtitulo" rows="3" class="form-control">{{ $cv($sec,'subtitulo','Consejos, guías y motivación para tu viaje hacia un estilo de vida más saludable y consciente.') }}</textarea>
              </div>

              <div class="col-12"><hr></div>
              <div class="col-12"><h5 class="text-primary">🏷️ Categorías (5)</h5></div>

              @for($i=1;$i<=5;$i++)
                <div class="col-md-4">
                  <label class="form-label"><strong>Categoría {{ $i }}</strong></label>
                  <input type="text" name="blog_hero__cat_{{ $i }}" class="form-control"
                    value="{{ $cv($sec,"cat_{$i}", match($i){1=>'Todos',2=>'Fitness',3=>'Nutrición',4=>'Mindfulness',5=>'Wellness'}) }}">
                </div>
              @endfor
            </div>
          </div>
          <div class="card-footer bg-light d-flex justify-content-end">
            <button class="btn btn-primary btn-lg">💾 Guardar Hero</button>
          </div>
        </div>
      </form>

      <!-- ===================== -->
      <!-- FORM 2: BLOG POSTS   -->
      <!-- ===================== -->
      @php $sec='blog_posts'; @endphp
      <form action="{{ route('paginas.blog.update.posts') }}" method="POST" enctype="multipart/form-data" class="section-form" id="seccion-blog-posts" data-section="seccion-blog-posts" style="display:none;">
        @csrf @method('PUT')
        <input type="hidden" name="idioma" value="{{ $idioma }}">
        <input type="hidden" name="pagina" value="{{ $pagina }}">
        <input type="hidden" name="seccion" value="blog_posts">

        <div class="card mb-4">
          <div class="card-header bg-light"><h4 class="mb-0">🌟 Post Destacado + 🧩 Grid (6)</h4></div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-12"><h5 class="text-primary">🌟 Destacado</h5></div>

              {{-- Imagen destacada --}}
              @php $featImg = $cv($sec,'featured_imagen','images/blog-featured.jpg'); @endphp
              <div class="col-md-6">
                <label class="form-label d-flex align-items-center"><strong>Imagen</strong><span class="badge bg-success ms-2">IMAGEN</span></label>
                <ul class="nav nav-tabs mb-2">
                  <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#feat-upload" type="button">📤 Subir</button></li>
                  <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#feat-url" type="button">🔗 URL</button></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="feat-upload">
                    <input type="file" name="blog_posts__featured_imagen_file" class="form-control mb-2" accept="image/*">
                    <small class="text-muted">JPG/PNG/WEBP/SVG máx. 4MB</small>
                  </div>
                  <div class="tab-pane fade" id="feat-url">
                    <input type="text" name="blog_posts__featured_imagen_url" class="form-control" value="{{ $featImg }}" placeholder="images/blog-featured.jpg">
                  </div>
                </div>
                <div class="mt-2 border rounded p-2 bg-light">
                  <img src="{{ asset($featImg) }}" class="img-thumbnail" style="max-height:160px;" onerror="this.src='{{ asset('images/banner3.jpeg') }}'">
                  <small class="d-block text-muted mt-1">Actual: <code>{{ $featImg }}</code></small>
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label"><strong>Fecha</strong></label>
                <input type="text" name="blog_posts__featured_fecha" class="form-control" value="{{ $cv($sec,'featured_fecha','15 Enero 2025') }}" placeholder="15 Enero 2025">
                <label class="form-label mt-2"><strong>Autor</strong></label>
                <input type="text" name="blog_posts__featured_autor" class="form-control" value="{{ $cv($sec,'featured_autor','Anabelle Ibalu') }}">
                <label class="form-label mt-2"><strong>Lectura (min)</strong></label>
                <input type="text" name="blog_posts__featured_lectura" class="form-control" value="{{ $cv($sec,'featured_lectura','5') }}" placeholder="5">
              </div>

              <div class="col-md-12">
                <label class="form-label"><strong>Título</strong></label>
                <input type="text" name="blog_posts__featured_titulo" class="form-control"
                  value="{{ $cv($sec,'featured_titulo','Cómo el Move Challenge transformó mi relación con el ejercicio') }}">
              </div>
              <div class="col-md-12">
                <label class="form-label"><strong>Extracto</strong></label>
                <textarea name="blog_posts__featured_extracto" rows="3" class="form-control">{{ $cv($sec,'featured_extracto','Descubre cómo 30 días de movimiento consciente pueden cambiar completamente tu perspectiva sobre el fitness y crear hábitos sostenibles que duran toda la vida.') }}</textarea>
              </div>
              <div class="col-md-12">
                <label class="form-label d-flex align-items-center"><strong>Contenido Completo del Post</strong><span class="badge bg-info ms-2">EDITOR RICO</span></label>
                <div id="editor-featured" style="min-height: 300px; background: white;">{!! $cv($sec,'featured_contenido','') !!}</div>
                <textarea name="blog_posts__featured_contenido" id="featured_contenido_hidden" style="display:none;">{{ $cv($sec,'featured_contenido','') }}</textarea>
                <small class="text-muted">Editor con formato: negrita, cursiva, listas, enlaces, encabezados, etc.</small>
              </div>
              <div class="col-md-12">
                <label class="form-label"><strong>URL "Leer más"</strong></label>
                <input type="text" name="blog_posts__featured_url" class="form-control" value="{{ $cv($sec,'featured_url','#') }}">
              </div>

              <div class="col-12"><hr></div>
              <div class="col-12"><h5 class="text-primary">🧩 Grid de Posts (6)</h5></div>

              @for($i=1;$i<=6;$i++)
                @php
                  $img = $cv($sec,"post_{$i}_imagen","images/blog-{$i}.jpg");
                  $cat = $cv($sec,"post_{$i}_categoria", match($i%4){1=>'Fitness',2=>'Nutrición',3=>'Mindfulness',0=>'Wellness'});
                  $fecha = $cv($sec,"post_{$i}_fecha", match($i){
                    1=>'10 Enero 2025',2=>'8 Enero 2025',3=>'5 Enero 2025',4=>'3 Enero 2025',5=>'1 Enero 2025',6=>'28 Diciembre 2024'
                  });
                  $lect = $cv($sec,"post_{$i}_lectura", match($i){1=>'4',2=>'6',3=>'5',4=>'7',5=>'5',6=>'8'});
                  $tit = $cv($sec,"post_{$i}_titulo", [
                    1=>'5 ejercicios para empezar tu día con energía',
                    2=>'Alimentación consciente: qué es y cómo practicarla',
                    3=>'Meditación para principiantes: guía práctica',
                    4=>'Hábitos que transformarán tu vida en 30 días',
                    5=>'Entrenamiento en casa: equipamiento básico',
                    6=>'Recetas saludables para después del entrenamiento',
                  ][$i]);
                  $exc = $cv($sec,"post_{$i}_extracto", [
                    1=>'Rutina matutina de 10 minutos que activará tu cuerpo y mente para un día productivo.',
                    2=>'Aprende a conectar con tu comida y transformar tu relación con la alimentación.',
                    3=>'Los primeros pasos para incorporar la meditación a tu rutina diaria.',
                    4=>'Pequeños cambios diarios que generan grandes resultados a largo plazo.',
                    5=>'Todo lo que necesitas para crear tu gym en casa sin gastar una fortuna.',
                    6=>'Nutrición post-workout para maximizar tus resultados y recuperación.',
                  ][$i]);
                  $url = $cv($sec,"post_{$i}_url","#");
                @endphp

                <div class="col-12"><h6 class="text-secondary mt-3">📦 Post {{ $i }}</h6></div>

                <div class="col-md-6">
                  <label class="form-label d-flex align-items-center"><strong>Imagen</strong><span class="badge bg-success ms-2">IMAGEN</span></label>
                  <ul class="nav nav-tabs mb-2">
                    <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#p{{$i}}-upload" type="button">📤 Subir</button></li>
                    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#p{{$i}}-url" type="button">🔗 URL</button></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="p{{$i}}-upload">
                      <input type="file" name="blog_posts__post_{{ $i }}_imagen_file" class="form-control mb-2" accept="image/*">
                      <small class="text-muted">JPG/PNG/WEBP/SVG máx. 4MB</small>
                    </div>
                    <div class="tab-pane fade" id="p{{$i}}-url">
                      <input type="text" name="blog_posts__post_{{ $i }}_imagen_url" class="form-control" value="{{ $img }}" placeholder="images/blog-{{ $i }}.jpg">
                    </div>
                  </div>
                  <div class="mt-2 border rounded p-2 bg-light">
                    <img src="{{ asset($img) }}" class="img-thumbnail" style="max-height:140px;" onerror="this.src='{{ asset("images/ana{$i}.png") }}'">
                    <small class="d-block text-muted mt-1">Actual: <code>{{ $img }}</code></small>
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="form-label"><strong>Categoría</strong></label>
                  <input type="text" name="blog_posts__post_{{ $i }}_categoria" class="form-control" value="{{ $cat }}">
                  <div class="row g-2 mt-1">
                    <div class="col-md-6">
                      <label class="form-label"><strong>Fecha</strong></label>
                      <input type="text" name="blog_posts__post_{{ $i }}_fecha" class="form-control" value="{{ $fecha }}">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label"><strong>Lectura (min)</strong></label>
                      <input type="text" name="blog_posts__post_{{ $i }}_lectura" class="form-control" value="{{ $lect }}">
                    </div>
                  </div>
                  <label class="form-label mt-2"><strong>Título</strong></label>
                  <input type="text" name="blog_posts__post_{{ $i }}_titulo" class="form-control" value="{{ $tit }}">
                  <label class="form-label mt-2"><strong>Extracto</strong></label>
                  <textarea name="blog_posts__post_{{ $i }}_extracto" rows="2" class="form-control">{{ $exc }}</textarea>
                  <label class="form-label mt-2"><strong>URL</strong></label>
                  <input type="text" name="blog_posts__post_{{ $i }}_url" class="form-control" value="{{ $url }}">
                </div>

                <div class="col-12">
                  <label class="form-label d-flex align-items-center"><strong>Contenido Completo del Post {{ $i }}</strong><span class="badge bg-info ms-2">EDITOR RICO</span></label>
                  <div id="editor-post-{{ $i }}" style="min-height: 250px; background: white;">{!! $cv($sec,"post_{$i}_contenido",'') !!}</div>
                  <textarea name="blog_posts__post_{{ $i }}_contenido" id="post_{{ $i }}_contenido_hidden" style="display:none;">{{ $cv($sec,"post_{$i}_contenido",'') }}</textarea>
                  <small class="text-muted">Editor con formato: negrita, cursiva, listas, enlaces, encabezados, etc.</small>
                </div>

                @if($i<6)<div class="col-12"><hr></div>@endif
              @endfor

            </div>
          </div>
          <div class="card-footer bg-light d-flex justify-content-end" style="margin-top: 3rem; padding: 1.5rem;">
            <button class="btn btn-primary btn-lg">💾 Guardar Posts</button>
          </div>
        </div>
      </form>

      @php
          $sec = 'newsletter_cta';
          $news = $contenidos[$sec] ?? collect();
          $nv = fn($k,$d=null)=> optional($news->firstWhere('clave',$k))->valor ?? $d;

          $idioma = $idioma ?? 'es';
          $pagina = 'blog';
      @endphp

      <form action="{{ route('paginas.blog.update.newsletter') }}" method="POST"
            class="section-form" id="seccion-newsletter" data-section="seccion-newsletter" style="display:none;">
          @csrf
          @method('PUT')

          <input type="hidden" name="idioma" value="{{ $idioma }}">
          <input type="hidden" name="pagina" value="{{ $pagina }}">
          <input type="hidden" name="seccion" value="newsletter_cta">

          <div class="card mb-4">
              <div class="card-header bg-light">
                  <h4 class="mb-0">✉️ Newsletter CTA</h4>
              </div>
              <div class="card-body">
                  <div class="row g-3">
                      <!-- Título -->
                      <div class="col-md-12">
                          <label class="form-label d-flex align-items-center">
                              <strong>Título</strong>
                              <span class="badge bg-primary ms-2">TEXTO</span>
                          </label>
                          <input type="text" name="newsletter__titulo" class="form-control"
                                value="{{ old('newsletter__titulo', $nv('titulo','Recibe contenido exclusivo')) }}">
                      </div>

                      <!-- Subtítulo -->
                      <div class="col-md-12">
                          <label class="form-label d-flex align-items-center">
                              <strong>Subtítulo</strong>
                              <span class="badge bg-primary ms-2">TEXTO</span>
                          </label>
                          <textarea name="newsletter__subtitulo" rows="2" class="form-control">{{ old('newsletter__subtitulo', $nv('subtitulo','Suscríbete a nuestro newsletter y recibe tips semanales de wellness')) }}</textarea>
                      </div>

                      <!-- Placeholder -->
                      <div class="col-md-6">
                          <label class="form-label d-flex align-items-center">
                              <strong>Placeholder del email</strong>
                              <span class="badge bg-primary ms-2">TEXTO</span>
                          </label>
                          <input type="text" name="newsletter__placeholder" class="form-control"
                                value="{{ old('newsletter__placeholder', $nv('placeholder','tu@email.com')) }}">
                      </div>

                      <!-- Botón -->
                      <div class="col-md-6">
                          <label class="form-label d-flex align-items-center">
                              <strong>Texto del botón</strong>
                              <span class="badge bg-primary ms-2">TEXTO</span>
                          </label>
                          <input type="text" name="newsletter__boton_texto" class="form-control"
                                value="{{ old('newsletter__boton_texto', $nv('boton_texto','Suscribirme')) }}">
                      </div>

                      <!-- Action (opcional) -->
                      <div class="col-md-12">
                          <label class="form-label d-flex align-items-center">
                              <strong>Action del formulario (opcional)</strong>
                              <span class="badge bg-info ms-2">URL</span>
                          </label>
                          <input type="text" name="newsletter__form_action" class="form-control"
                                value="{{ old('newsletter__form_action', $nv('form_action', route('paginas.blog.update.newsletter') ?? '#')) }}"
                                placeholder="https://... o #">
                          <small class="text-muted">Deja vacío si usarás la ruta por defecto del sitio.</small>
                      </div>
                  </div>
              </div>

              <div class="card-footer bg-light">
                  <div class="d-flex justify-content-end">
                      <button class="btn btn-primary btn-lg">💾 Guardar Newsletter</button>
                  </div>
              </div>
          </div>
      </form>


      <div class="card">
        <div class="card-body"><a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver al Dashboard</a></div>
      </div>
    </div>
  </div>
</div>

<style>
  .list-group-item{border-left:3px solid transparent;transition:.3s;cursor:pointer}
  .list-group-item:hover,.list-group-item.active{border-left-color:#0d6efd;background-color: #0d6efd;font-weight:600}
  .section-tabs{flex-wrap:wrap}
  .section-tabs .btn{flex:1 1 auto;min-width:100px;margin-bottom:5px}
  .section-tabs .btn.active{background:#0d6efd;color:#fff;font-weight:700}
  .section-form{animation:fadeIn .3s ease-in}
  @keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
  .ql-editor{min-height:200px;font-size:15px;line-height:1.6;max-height:500px;overflow-y:auto}
  .ql-toolbar{background:#f8f9fa;border-radius:5px 5px 0 0;position:sticky;top:0;z-index:10}
  .ql-container{border-radius:0 0 5px 5px;border:1px solid #dee2e6;margin-bottom:1rem}
  .card-footer{box-shadow:0 -2px 10px rgba(0,0,0,0.05);position:sticky;bottom:0;z-index:100;background:#f8f9fa !important}
</style>

<script>
  document.addEventListener('DOMContentLoaded',function(){
    // === Navegación entre secciones ===
    const links=document.querySelectorAll('.list-group-item[data-section]');
    const tabs=document.querySelectorAll('.section-tabs .btn');
    const forms=document.querySelectorAll('.section-form');
    const show=(id)=>{
      forms.forEach(f=>f.style.display='none');
      const t=document.querySelector('#'+id); if(t){t.style.display='block'; setTimeout(()=>t.scrollIntoView({behavior:'smooth',block:'start'}),100);}
      links.forEach(l=>l.classList.toggle('active',('seccion-'+l.dataset.section)===id));
      tabs.forEach(b=>b.classList.toggle('active',b.dataset.target===id));
    };
    links.forEach(l=>l.addEventListener('click',e=>{e.preventDefault();show('seccion-'+l.dataset.section)}));
    tabs.forEach(b=>b.addEventListener('click',()=>show(b.dataset.target)));
    show('seccion-blog-hero');

    // === Configuración de Quill.js ===
    const toolbarOptions = [
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      ['bold', 'italic', 'underline', 'strike'],
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      [{ 'align': [] }],
      ['blockquote', 'code-block'],
      ['link', 'image', 'video'],
      [{ 'color': [] }, { 'background': [] }],
      ['clean']
    ];

    // Array para almacenar todas las instancias de Quill
    const quillEditors = [];

    // Editor del post destacado
    const editorFeatured = new Quill('#editor-featured', {
      theme: 'snow',
      modules: { toolbar: toolbarOptions },
      placeholder: 'Escribe aquí el contenido completo del post destacado...'
    });
    quillEditors.push({
      editor: editorFeatured,
      hiddenInput: document.getElementById('featured_contenido_hidden')
    });

    // Editores para los 6 posts del grid
    for(let i = 1; i <= 6; i++) {
      const editor = new Quill(`#editor-post-${i}`, {
        theme: 'snow',
        modules: { toolbar: toolbarOptions },
        placeholder: `Escribe aquí el contenido completo del post ${i}...`
      });
      quillEditors.push({
        editor: editor,
        hiddenInput: document.getElementById(`post_${i}_contenido_hidden`)
      });
    }

    // === Sincronizar contenido de Quill con los inputs hidden antes de enviar ===
    const formPosts = document.querySelector('#seccion-blog-posts');
    if(formPosts) {
      formPosts.addEventListener('submit', function(e) {
        // Sincronizar todos los editores
        quillEditors.forEach(item => {
          const htmlContent = item.editor.root.innerHTML;
          item.hiddenInput.value = htmlContent;
        });
      });
    }

    // === Sincronización en tiempo real (opcional, para depuración) ===
    quillEditors.forEach(item => {
      item.editor.on('text-change', function() {
        item.hiddenInput.value = item.editor.root.innerHTML;
      });
    });
  });
</script>
@endsection
