<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="icon.png">

    <!-- Para dispositivos Apple -->
    <link rel="apple-touch-icon" href="icon.png">

    <!-- Para diferentes tamaños -->
    <link rel="icon" type="image/png" sizes="32x32" href="icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon.png">
    
    <title>{{ config('app.name', 'JUFMAN Kitchen Designs') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #FF9B28;     /* Princeton Orange */
            --secondary-color: #7A88FE;  /* Tropical Indigo */
            --text-color: #333333;       /* Neutral dark for legibility */
            --light-color: #F8F9FA;      /* Light background */
            --accent-pink: #F055A5;      /* Steel Pink */
            --accent-green: #CCD537;     /* Pear */
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand img {
            height: 60px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 20px;
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background-color: #e09a2d;
            border-color: #e09a2d;
        }
        
        .auth-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        
        .auth-header {
            text-align: center;
            padding: 2rem 0;
        }
        
        .auth-footer {
            text-align: center;
            margin-top: auto;
            padding: 1rem 0;
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME') }}">
            </a>
            
            <!-- Language Selector -->
       
    </nav>

    <main class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="auth-card">
                    <div class="auth-header">
                        <img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME') }}" height="80">
                        <h2 class="mt-3">{{ __('Iniciar Sesión') }}</h2>
                    </div>
                    
                    <div class="card-body p-5">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="auth-footer">
        <div class="container">
            <p>Copyright {{ env('APP_NAME') }} LLC © {{ date('Y') }}</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>