@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 100px); padding-top: 100px;">
    <div class="text-center">
        <h1 class="mb-5 fw-bold ">Editar contenido del sitio</h1>

        <div class="d-flex justify-content-center gap-3 flex-wrap">
          <a href="{{ url('/admin/paginas/en') }}" class="btn btn-primary btn-lg px-5 py-3">
                🇺🇸 Editar tu página en inglés
            </a>

            <a href="{{ url('/admin/paginas/es') }}" class="btn btn-outline-primary btn-lg px-5 py-3">
                Configuracion global
            </a>

        </div>
    </div>
</div>
@endsection
