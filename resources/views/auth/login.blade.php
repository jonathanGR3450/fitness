<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="alert alert-success mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   id="email" name="email" value="{{ old('email') }}"
                   required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   id="password" name="password"
                   required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input"
                   id="remember_me" name="remember">
            <label class="form-check-label" for="remember_me">
                {{ __('Recordarme') }}
            </label>
        </div>

        <div class="d-flex justify-content-between align-items-center">
      
            
            <button type="submit" class="btn btn-primary">
                {{ __('Iniciar Sesión') }}
            </button>
        </div>
    </form>
</x-guest-layout>