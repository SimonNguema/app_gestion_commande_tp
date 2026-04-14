<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Application Laravel')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(180deg, #eff3fb 0%, #ffffff 45%, #f8fafc 100%);
            color: #263238;
        }
        .navbar {
            background: linear-gradient(90deg, #0047b3 0%, #0d6efd 100%);
            box-shadow: 0 10px 30px rgba(13, 110, 253, 0.18);
        }
        .navbar-brand {
            letter-spacing: 0.03em;
        }
        .navbar-nav .nav-link {
            color: rgba(255,255,255,0.9);
            font-weight: 500;
            transition: color .2s ease;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #ffffff;
        }
        .hero {
            background: #0047b3;
            background: radial-gradient(circle at top left, rgba(255,255,255,0.18), transparent 40%),
                        linear-gradient(180deg, #0047b3 0%, #0d6efd 100%);
        }
        .card {
            border: 0;
            border-radius: 1rem;
        }
        .shadow-sm {
            box-shadow: 0 10px 30px rgba(0,0,0,.08) !important;
        }
        .button-soft {
            border-radius: 2rem;
            padding: 0.85rem 1.4rem;
        }
        .hover-translate:hover {
            transform: translateY(-6px);
            transition: transform .25s ease;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13,110,253,.18);
        }
        .table-responsive {
            overflow: hidden;
        }
        .badge {
            font-size: 0.8rem;
            padding: 0.6em 0.8em;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark py-3">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <i class="bi bi-box-seam me-2 fs-4"></i> P-Gestion
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item me-2">
                    <a class="nav-link" href="{{ route('home') }}"><i class="bi bi-house-door-fill me-1"></i> Accueil</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" href="{{ route('users.index') }}"><i class="bi bi-people-fill me-1"></i> Utilisateurs</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" href="{{ route('produits.index') }}"><i class="bi bi-box-seam me-1"></i> Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('commandes.index') }}"><i class="bi bi-cart-fill me-1"></i> Commandes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-5">
    @if (session('success'))
        <div class="alert alert-success rounded-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

