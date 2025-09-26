@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="margin-top: 120px; padding-top: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-success mb-0">✏️ Edición Global del Sitio</h1>
                    <p class="text-muted mb-0">Configuración general, redes sociales y SEO</p>
                </div>
                <div class="card-body">
                    
                    <!-- Mensajes de éxito/error -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <h6><i class="fas fa-exclamation-triangle"></i> Errores encontrados:</h6>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('global.update') }}" method="POST" enctype="multipart/form-data" id="globalForm">
                        @csrf
                        
                        <!-- Sección Logo y Branding -->
                        <div class="mb-5">
                            <h4 style="color: black; border-bottom: 2px solid #28a745; padding-bottom: 10px;">
                                <i class="fas fa-image"></i> Logo y Branding
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="logo" style="color: black;">Logo del sitio:</label>
                                        @if(isset($global) && isset($global->logo) && $global->logo)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $global->logo) }}" 
                                                     alt="Logo actual" 
                                                     style="max-width: 200px; height: auto;" 
                                                     class="img-thumbnail">
                                                <small class="d-block text-muted">Logo actual</small>
                                            </div>
                                        @endif
                                        <input type="file" 
                                               class="form-control" 
                                               name="logo" 
                                               id="logo"
                                               accept="image/*">
                                        <small class="text-muted">Formatos: PNG, JPG, SVG. Tamaño recomendado: 300x100px</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="site_name" style="color: black;">Nombre del sitio:</label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="site_name" 
                                               id="site_name"
                                               style="color: black;"
                                               value="@if(isset($global) && isset($global->site_name)){{ $global->site_name }}@endif"
                                               placeholder="Nombre de tu empresa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="site_slogan" style="color: black;">Slogan/Tagline:</label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="site_slogan" 
                                               id="site_slogan"
                                               style="color: black;"
                                               value="@if(isset($global) && isset($global->site_slogan)){{ $global->site_slogan }}@endif"
                                               placeholder="Tu slogan o frase descriptiva">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección Redes Sociales -->
                        <div class="mb-5">
                            <h4 style="color: black; border-bottom: 2px solid #1877f2; padding-bottom: 10px;">
                                <i class="fas fa-share-alt"></i> Redes Sociales
                            </h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="link_facebook" style="color: black;">
                                            <i class="fab fa-facebook" style="color: #1877f2;"></i> Facebook:
                                        </label>
                                        <input type="url" 
                                               class="form-control" 
                                               name="link_facebook" 
                                               id="link_facebook"
                                               style="color: black;"
                                               value="@if(isset($global) && isset($global->link_facebook)){{ $global->link_facebook }}@endif"
                                               placeholder="https://facebook.com/tu-pagina">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="link_instagram" style="color: black;">
                                            <i class="fab fa-instagram" style="color: #E4405F;"></i> Instagram:
                                        </label>
                                        <input type="url" 
                                               class="form-control" 
                                               name="link_instagram" 
                                               id="link_instagram"
                                               style="color: black;"
                                               value="@if(isset($global) && isset($global->link_instagram)){{ $global->link_instagram }}@endif"
                                               placeholder="https://instagram.com/tu-cuenta">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="link_pinterest" style="color: black;">
                                            <i class="fab fa-pinterest" style="color: #BD081C;"></i> Pinterest:
                                        </label>
                                        <input type="url" 
                                               class="form-control" 
                                               name="link_pinterest" 
                                               id="link_pinterest"
                                               style="color: black;"
                                               value="@if(isset($global) && isset($global->link_pinterest)){{ $global->link_pinterest }}@endif"
                                               placeholder="https://pinterest.com/tu-perfil">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección SEO Básico -->
                        <div class="mb-5">
                            <h4 style="color: black; border-bottom: 2px solid #ff6b35; padding-bottom: 10px;">
                                <i class="fas fa-search"></i> SEO Básico
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="meta_title" style="color: black;">Título SEO (Meta Title):</label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="meta_title" 
                                               id="meta_title"
                                               style="color: black;"
                                               value="@if(isset($global) && isset($global->meta_title)){{ $global->meta_title }}@endif"
                                               placeholder="Título principal del sitio (60 caracteres)"
                                               maxlength="60">
                                        <small class="text-muted">Recomendado: 50-60 caracteres <span id="title-count" class="fw-bold">0</span>/60</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="meta_description" style="color: black;">Meta Description:</label>
                                        <textarea class="form-control" 
                                                  name="meta_description" 
                                                  id="meta_description"
                                                  rows="3"
                                                  style="color: black;"
                                                  placeholder="Descripción del sitio para motores de búsqueda (160 caracteres)"
                                                  maxlength="160">@if(isset($global) && isset($global->meta_description)){{ $global->meta_description }}@endif</textarea>
                                        <small class="text-muted">Recomendado: 150-160 caracteres <span id="desc-count" class="fw-bold">0</span>/160</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="meta_keywords" style="color: black;">Meta Keywords:</label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="meta_keywords" 
                                               id="meta_keywords"
                                               style="color: black;"
                                               value="@if(isset($global) && isset($global->meta_keywords)){{ $global->meta_keywords }}@endif"
                                               placeholder="palabra1, palabra2, palabra3">
                                        <small class="text-muted">Separa las palabras clave con comas</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="meta_author" style="color: black;">Autor:</label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="meta_author" 
                                               id="meta_author"
                                               style="color: black;"
                                               value="@if(isset($global) && isset($global->meta_author)){{ $global->meta_author }}@endif"
                                               placeholder="Nombre del autor o empresa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="meta_robots" style="color: black;">Meta Robots:</label>
                                        <select class="form-control" name="meta_robots" id="meta_robots" style="color: black;">
                                            <option value="index,follow" @if(isset($global) && $global->meta_robots == 'index,follow') selected @endif>index,follow (Recomendado)</option>
                                            <option value="index,nofollow" @if(isset($global) && $global->meta_robots == 'index,nofollow') selected @endif>index,nofollow</option>
                                            <option value="noindex,follow" @if(isset($global) && $global->meta_robots == 'noindex,follow') selected @endif>noindex,follow</option>
                                            <option value="noindex,nofollow" @if(isset($global) && $global->meta_robots == 'noindex,nofollow') selected @endif>noindex,nofollow</option>
                                        </select>
                                        <small class="text-muted">Controla cómo los motores de búsqueda indexan tu sitio</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="canonical_url" style="color: black;">URL Canónica:</label>
                                        <input type="url" 
                                               class="form-control" 
                                               name="canonical_url" 
                                               id="canonical_url"
                                               style="color: black;"
                                               value="@if(isset($global) && isset($global->canonical_url)){{ $global->canonical_url }}@endif"
                                               placeholder="https://tu-sitio.com">
                                        <small class="text-muted">URL principal de tu sitio web</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección Favicon y Configuraciones Adicionales -->
                        <div class="mb-5">
                            <h4 style="color: black; border-bottom: 2px solid #6c757d; padding-bottom: 10px;">
                                <i class="fas fa-cog"></i> Favicon y Configuraciones Adicionales
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="favicon" style="color: black;">Favicon:</label>
                                        @if(isset($global) && isset($global->favicon) && $global->favicon)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $global->favicon) }}" 
                                                     alt="Favicon actual" 
                                                     style="max-width: 32px; height: auto;" 
                                                     class="img-thumbnail">
                                                <small class="d-block text-muted">Favicon actual</small>
                                            </div>
                                        @endif
                                        <input type="file" 
                                               class="form-control" 
                                               name="favicon" 
                                               id="favicon"
                                               accept=".ico,.png">
                                        <small class="text-muted">Formatos: ICO, PNG. Tamaño: 32x32px o 16x16px</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="google_analytics" style="color: black;">Google Analytics ID:</label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="google_analytics" 
                                               id="google_analytics"
                                               style="color: black;"
                                               value="@if(isset($global) && isset($global->google_analytics)){{ $global->google_analytics }}@endif"
                                               placeholder="G-XXXXXXXXXX">
                                        <small class="text-muted">Ejemplo: G-1234567890 o UA-123456789-1</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="row">
                            <div class="col-12">
                                <hr>
                                <button type="submit" class="btn btn-success btn-lg me-3">
                                    <i class="fas fa-save"></i> Guardar Configuración Global
                                </button>
                                <button type="button" class="btn btn-secondary btn-lg me-3" onclick="resetForm()">
                                    <i class="fas fa-undo"></i> Restablecer
                                </button>
                                <button type="button" class="btn btn-info btn-lg" onclick="previewSEO()">
                                    <i class="fas fa-eye"></i> Vista Previa SEO
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
function resetForm() {
    if (confirm('¿Estás seguro de que quieres restablecer el formulario? Se perderán todos los cambios no guardados.')) {
        document.getElementById('globalForm').reset();
        updateCharacterCount();
    }
}

function previewSEO() {
    const title = document.getElementById('meta_title').value || 'Título del sitio';
    const description = document.getElementById('meta_description').value || 'Descripción del sitio';
    
    alert(`Vista Previa SEO:\n\nTítulo: ${title}\nDescripción: ${description}\n\nAsí aparecerá en Google.`);
}

function updateCharacterCount() {
    // Contador para meta title
    const titleInput = document.getElementById('meta_title');
    const titleCount = document.getElementById('title-count');
    if (titleInput && titleCount) {
        titleCount.textContent = titleInput.value.length;
        titleCount.style.color = titleInput.value.length > 60 ? 'red' : titleInput.value.length > 50 ? 'orange' : 'green';
    }
    
    // Contador para meta description
    const descInput = document.getElementById('meta_description');
    const descCount = document.getElementById('desc-count');
    if (descInput && descCount) {
        descCount.textContent = descInput.value.length;
        descCount.style.color = descInput.value.length > 160 ? 'red' : descInput.value.length > 150 ? 'orange' : 'green';
    }
}

// Event listeners para contadores de caracteres
document.addEventListener('DOMContentLoaded', function() {
    const titleInput = document.getElementById('meta_title');
    const descInput = document.getElementById('meta_description');
    
    if (titleInput) {
        titleInput.addEventListener('input', updateCharacterCount);
        updateCharacterCount(); // Inicializar contador
    }
    
    if (descInput) {
        descInput.addEventListener('input', updateCharacterCount);
        updateCharacterCount(); // Inicializar contador
    }
});

// Validación del formulario
document.getElementById('globalForm').addEventListener('submit', function(e) {
    const submitBtn = e.target.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Guardando...';
    submitBtn.disabled = true;
});

// Preview de imágenes
document.querySelectorAll('input[type="file"]').forEach(function(input) {
    input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Buscar imagen existente o crear preview
                let existingImg = input.parentElement.querySelector('.img-thumbnail');
                if (existingImg) {
                    existingImg.src = e.target.result;
                } else {
                    const preview = document.createElement('img');
                    preview.src = e.target.result;
                    preview.className = 'img-thumbnail mt-2';
                    preview.style.maxWidth = '100px';
                    preview.style.height = 'auto';
                    input.parentElement.appendChild(preview);
                }
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endsection