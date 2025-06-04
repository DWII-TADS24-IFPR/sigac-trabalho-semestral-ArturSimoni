<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGAC - Sistema de Gestão de Atividades Complementares</title>

    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Google Fonts (opcional) --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">

    {{-- Estilo personalizado --}}
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to top right, #121212, #1f1f1f);
            color: #f8f9fa;
        }

        .navbar-custom {
            background-color: #000;
        }

        .btn-outline-light:hover {
            background-color: #ffffff;
            color: #000000;
        }

        .hero-img {
            border: 4px solid #343a40;
            border-radius: 1rem;
            box-shadow: 0 0 30px rgba(0,0,0,0.4);
        }

        footer {
            background-color: #111;
            color: #bbb;
        }

        .glass {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-uppercase tracking-widest" href="#">SIGAC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Entrar</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="btn btn-light text-dark">Registrar</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <main class="container py-5 d-flex flex-column align-items-center text-center">
        <div class="glass mb-5">
            <h1 class="display-4 fw-bold mb-3">Sua vida acadêmica mais organizada</h1>
            <p class="lead mb-4">
                O SIGAC é o sistema ideal para gerenciar, acompanhar e validar suas atividades complementares universitárias. Simples, rápido e eficiente para alunos e coordenadores.
            </p>
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Acessar o sistema</a>
            @endif
        </div>

        {{-- Imagem --}}
        <div class="position-relative">
            <img src="https://img.freepik.com/vetores-gratis/ideia-de-estrategia-de-crescimento-de-lucro-solucao-de-desenvolvimento-de-negocios_335657-3160.jpg" class="img-fluid hero-img" alt="SIGAC Ilustração" style="max-width: 600px;">
        </div>
    </main>

    {{-- Rodapé --}}
    <footer class="text-center py-4 mt-auto">
        &copy; {{ date('Y') }} SIGAC - Sistema de Gestão de Atividades Complementares
    </footer>

</body>
</html>
