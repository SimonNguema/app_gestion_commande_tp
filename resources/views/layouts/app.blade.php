<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @yield('title') sera remplacé par le titre défini dans chaque vue enfant --}}
    <title>@yield('title', 'Mon Application Laravel')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">🏠 Mon App</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produits.index') }}">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('commandes.index') }}">Commandes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- ===== CONTENU PRINCIPAL ===== --}}
<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- @yield('content') sera remplacé par le contenu de chaque vue enfant --}}
    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

