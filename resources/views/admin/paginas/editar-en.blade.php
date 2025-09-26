@extends('layouts.admin')

{{-- Si tu layout usa @yield('content'), descomenta estas líneas
@section('content')
--}}

<div class="container-fluid" style="margin-top: 120px; padding-top: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-12">

            {{-- Mensajes de estado --}}
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
            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <h6><i class="fas fa-exclamation-triangle"></i> Errors:</h6>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            @php($contenido = $contenido ?? DB::table('contenido_ingles')->first())

            {{-- ===========================
                 FORM: HERO
            ============================ --}}
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center">
                <h4 class="mb-0"><i class="fas fa-images me-2"></i> Hero Carousel</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('contenido-ingles.update') }}" method="POST" enctype="multipart/form-data" id="formHero">
                  @csrf
                  <input type="hidden" name="section" value="hero">
                  <div class="row">
                    @for ($i = 1; $i <= 4; $i++)
                      <div class="col-md-6 mb-4">
                        <div class="card border-secondary">
                          <div class="card-header bg-light">
                            <h6 class="mb-0">Slide {{ $i }}</h6>
                          </div>
                          <div class="card-body">
                            <div class="mb-3">
                              <label class="form-label">H1 Title</label>
                              <input type="text" class="form-control"
                                    name="h1_hero_carrusel_{{ $i }}"
                                    value="{{ $contenido->{'h1_hero_carrusel_' . $i} ?? '' }}"
                                    placeholder="Main title">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Paragraph</label>
                              <textarea class="form-control" rows="3"
                                        name="p_hero_carrusel_{{ $i }}"
                                        placeholder="Description">{{ $contenido->{'p_hero_carrusel_' . $i} ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Link</label>
                              <input type="url" class="form-control"
                                    name="a_hero_carrusel_{{ $i }}"
                                    value="{{ $contenido->{'a_hero_carrusel_' . $i} ?? '' }}"
                                    placeholder="https://example.com">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Image</label>
                              @if(!empty($contenido->{'img_hero_carrusel_' . $i}))
                                <div class="mb-2">
                                  <img src="{{ asset('storage/' . $contenido->{'img_hero_carrusel_' . $i}) }}"
                                       alt="Slide {{ $i }}" class="img-thumbnail" style="max-width:120px;height:auto;">
                                  <small class="text-muted d-block">Current image</small>
                                </div>
                              @endif
                              <input type="file" class="form-control" name="img_hero_carrusel_{{ $i }}" accept="image/*">
                              <small class="text-muted">JPG/PNG/GIF up to 2MB</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endfor
                  </div>
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Save Hero
                  </button>
                </form>
              </div>
            </div>

            {{-- ===========================
                 FORM: ABOUT
            ============================ --}}
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center">
                <h4 class="mb-0"><i class="fas fa-info-circle me-2"></i> About</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('contenido-ingles.update') }}" method="POST" enctype="multipart/form-data" id="formAbout">
                  @csrf
                  <input type="hidden" name="section" value="about">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Section Title</label>
                        <input type="text" class="form-control" name="h2_about_us"
                               value="{{ $contenido->h2_about_us ?? '' }}" placeholder="About">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="5" name="p_about_us"
                                  placeholder="Section description">{{ $contenido->p_about_us ?? '' }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Image</label>
                        @if(!empty($contenido->img_about_us))
                          <div class="mb-2">
                            <img src="{{ asset('storage/' . $contenido->img_about_us) }}"
                                 alt="About image" class="img-thumbnail" style="max-width:160px;height:auto;">
                            <small class="text-muted d-block">Current image</small>
                          </div>
                        @endif
                        <input type="file" class="form-control" name="img_about_us" accept="image/*">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    @for ($i = 1; $i <= 4; $i++)
                      <div class="col-md-3 mb-3">
                        <div class="card border-light">
                          <div class="card-header bg-light"><h6 class="mb-0">Feature {{ $i }}</h6></div>
                          <div class="card-body">
                            <div class="mb-3">
                              <label class="form-label">Icon (FontAwesome class)</label>
                              <input type="text" class="form-control" name="i__about_us_{{ $i }}"
                                     value="{{ $contenido->{'i__about_us_' . $i} ?? '' }}" placeholder="fas fa-icon">
                            </div>
                            <div class="mb-0">
                              <label class="form-label">Title</label>
                              <input type="text" class="form-control" name="h5__about_us_{{ $i }}"
                                     value="{{ $contenido->{'h5__about_us_' . $i} ?? '' }}" placeholder="Feature title">
                            </div>
                          </div>
                        </div>
                      </div>
                    @endfor
                  </div>

                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Save About
                  </button>
                </form>
              </div>
            </div>

            {{-- ===========================
                 FORM: SERVICES
            ============================ --}}
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center">
                <h4 class="mb-0"><i class="fas fa-tools me-2"></i> Services</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('contenido-ingles.update') }}" method="POST" id="formServices">
                  @csrf
                  <input type="hidden" name="section" value="services">

                  <div class="mb-3">
                    <label class="form-label">Section Title</label>
                    <input type="text" class="form-control" name="h2_services"
                           value="{{ $contenido->h2_services ?? '' }}" placeholder="Services">
                  </div>

                  <div class="row">
                    @for ($i = 1; $i <= 4; $i++)
                      <div class="col-md-6 mb-3">
                        <div class="card border-light">
                          <div class="card-header bg-light"><h6 class="mb-0">Service {{ $i }}</h6></div>
                          <div class="card-body">
                            <div class="mb-3">
                              <label class="form-label">Icon (FontAwesome class)</label>
                              <input type="text" class="form-control" name="i_services_{{ $i }}"
                                     value="{{ $contenido->{'i_services_' . $i} ?? '' }}" placeholder="fas fa-icon">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Title</label>
                              <input type="text" class="form-control" name="h4__services_{{ $i }}"
                                     value="{{ $contenido->{'h4__services_' . $i} ?? '' }}" placeholder="Service title">
                            </div>
                            <div class="mb-0">
                              <label class="form-label">Description</label>
                              <textarea class="form-control" rows="3" name="p__services_{{ $i }}"
                                        placeholder="Service description">{{ $contenido->{'p__services_' . $i} ?? '' }}</textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endfor
                  </div>

                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Save Services
                  </button>
                </form>
              </div>
            </div>

            {{-- ===========================
                 FORM: PORTFOLIO
            ============================ --}}
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center">
                <h4 class="mb-0"><i class="fas fa-image me-2"></i> Portfolio</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('contenido-ingles.update') }}" method="POST" enctype="multipart/form-data" id="formPortfolio">
                  @csrf
                  <input type="hidden" name="section" value="portfolio">

                  <div class="mb-3">
                    <label class="form-label">Section Title</label>
                    <input type="text" class="form-control" name="h2_portfolio"
                           value="{{ $contenido->h2_portfolio ?? '' }}" placeholder="Portfolio">
                  </div>

                  <div class="row">
                    @for ($i = 1; $i <= 6; $i++)
                      <div class="col-md-4 mb-3">
                        <div class="card border-light">
                          <div class="card-header bg-light"><h6 class="mb-0">Item {{ $i }}</h6></div>
                          <div class="card-body">
                            @if(!empty($contenido->{'img_portfolio_' . $i}))
                              <div class="mb-2">
                                <img src="{{ asset('storage/' . $contenido->{'img_portfolio_' . $i}) }}"
                                     alt="Portfolio {{ $i }}" class="img-thumbnail" style="max-width:100%;height:auto;">
                                <small class="text-muted d-block">Current image</small>
                              </div>
                            @endif
                            <input type="file" class="form-control" name="img_portfolio_{{ $i }}" accept="image/*">
                          </div>
                        </div>
                      </div>
                    @endfor
                  </div>

                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Save Portfolio
                  </button>
                </form>
              </div>
            </div>

            {{-- ===========================
                 FORM: TESTIMONIALS
            ============================ --}}
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center">
                <h4 class="mb-0"><i class="fas fa-comments me-2"></i> Testimonials</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('contenido-ingles.update') }}" method="POST" enctype="multipart/form-data" id="formTestimonials">
                  @csrf
                  <input type="hidden" name="section" value="testimonials">

                  <div class="mb-3">
                    <label class="form-label">Section Title</label>
                    <input type="text" class="form-control" name="h2_testimonials"
                           value="{{ $contenido->h2_testimonials ?? '' }}" placeholder="What the community says">
                  </div>

                  <div class="row">
                    @for ($i = 1; $i <= 3; $i++)
                      <div class="col-md-4 mb-3">
                        <div class="card border-light">
                          <div class="card-header bg-light"><h6 class="mb-0">Testimonial {{ $i }}</h6></div>
                          <div class="card-body">
                            @if(!empty($contenido->{'img_testimonials_' . $i}))
                              <div class="mb-2">
                                <img src="{{ asset('storage/' . $contenido->{'img_testimonials_' . $i}) }}"
                                     alt="Client {{ $i }}" class="img-thumbnail rounded-circle"
                                     style="width:80px;height:80px;object-fit:cover;">
                                <small class="text-muted d-block">Current photo</small>
                              </div>
                            @endif
                            <div class="mb-3">
                              <label class="form-label">Client Photo</label>
                              <input type="file" class="form-control" name="img_testimonials_{{ $i }}" accept="image/*">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Client Name</label>
                              <input type="text" class="form-control" name="h5_testimonials_{{ $i }}"
                                     value="{{ $contenido->{'h5_testimonials_' . $i} ?? '' }}" placeholder="Name">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">City</label>
                              <input type="text" class="form-control" name="p_testimonials_city_{{ $i }}"
                                     value="{{ $contenido->{'p_testimonials_city_' . $i} ?? '' }}" placeholder="City">
                            </div>
                            <div class="mb-0">
                              <label class="form-label">Testimonial</label>
                              <textarea class="form-control" rows="4" name="p_testimonials_{{ $i }}"
                                        placeholder="Client testimonial">{{ $contenido->{'p_testimonials_' . $i} ?? '' }}</textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endfor
                  </div>

                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Save Testimonials
                  </button>
                </form>
              </div>
            </div>

            {{-- ===========================
                 FORM: CALL TO ACTION (CTA)
            ============================ --}}
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center">
                <h4 class="mb-0"><i class="fas fa-bullhorn me-2"></i> Call to Action</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('contenido-ingles.update') }}" method="POST" id="formCTA">
                  @csrf
                  <input type="hidden" name="section" value="cta">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Title</label>
                      <input type="text" class="form-control" name="h2_call"
                             value="{{ $contenido->h2_call ?? '' }}" placeholder="Ready to start the MOVE Challenge?">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Button Text</label>
                      <input type="text" class="form-control" name="btn_call"
                             value="{{ $contenido->btn_call ?? '' }}" placeholder="Get my spot">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Save CTA
                  </button>
                </form>
              </div>
            </div>

            {{-- ===========================
                 FORM: CONTACT
            ============================ --}}
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center">
                <h4 class="mb-0"><i class="fas fa-envelope me-2"></i> Contact</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('contenido-ingles.update') }}" method="POST" id="formContact">
                  @csrf
                  <input type="hidden" name="section" value="contact">

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Contact Title</label>
                      <input type="text" class="form-control" name="h2_contact_title"
                             value="{{ $contenido->h2_contact_title ?? '' }}" placeholder="Contact">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Description</label>
                      <input type="text" class="form-control" name="p_contact_title"
                             value="{{ $contenido->p_contact_title ?? '' }}" placeholder="Message me and I’ll share the details">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Block 1 Title (e.g., Instagram)</label>
                      <input type="text" class="form-control" name="h4_contact_1"
                             value="{{ $contenido->h4_contact_1 ?? '' }}" placeholder="Instagram">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Block 1 Content</label>
                      <input type="text" class="form-control" name="p_contact_1"
                             value="{{ $contenido->p_contact_1 ?? '' }}" placeholder="@anabelleibalu">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Email Title</label>
                      <input type="text" class="form-control" name="h4_contact_email_1"
                             value="{{ $contenido->h4_contact_email_1 ?? '' }}" placeholder="Email">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" name="p_contact_email_1"
                             value="{{ $contenido->p_contact_email_1 ?? '' }}" placeholder="hola@anabelleibalu.com">
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Save Contact
                  </button>
                </form>
              </div>
            </div>

        </div>
    </div>
</div>

{{-- JS opcional: reset por sección / validación mínima --}}
<script>
  // Ejemplo: impedir submit accidental con Enter en inputs de texto
  document.querySelectorAll('form').forEach(f => {
    f.addEventListener('keydown', e => {
      if (e.key === 'Enter' && e.target.tagName.toLowerCase() !== 'textarea') {
        e.preventDefault();
      }
    });
  });

  // Preview básico en consola al elegir archivos
  document.querySelectorAll('input[type="file"]').forEach(input => {
    input.addEventListener('change', e => {
      const file = e.target.files?.[0];
      if (file) console.log('Selected file:', file.name, file.size, 'bytes');
    });
  });
</script>

{{-- Si tu layout usa @yield('content'), descomenta esta línea
@endsection
--}}
