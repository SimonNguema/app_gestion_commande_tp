@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

<div class="text-center mb-5">
    <h1 class="display-5 fw-bold">Bienvenue sur Mon Application</h1>
    <p class="text-muted fs-5">Choisissez une section pour commencer</p>
</div>

<div class="row g-4 justify-content-center">

    {{-- Carte Utilisateurs --}}
    <div class="col-md-4">
        <div class="card text-center shadow-sm h-100">
            <div class="card-body py-5">
                <div class="display-4 mb-3">👤</div>
                <h4 class="card-title">Utilisateurs</h4>
                <p class="card-text text-muted">Gérer les comptes utilisateurs (clients et admins).</p>
                <a href="{{ route('users.index') }}" class="btn btn-primary mt-2">
                    Voir les utilisateurs
                </a>
            </div>
        </div>
    </div>

    {{-- Carte Produits --}}
    <div class="col-md-4">
        <div class="card text-center shadow-sm h-100">
            <div class="card-body py-5">
                <div class="display-4 mb-3">📦</div>
                <h4 class="card-title">Produits</h4>
                <p class="card-text text-muted">Gérer le catalogue de produits et les stocks.</p>
                <a href="{{ route('produits.index') }}" class="btn btn-success mt-2">
                    Voir les produits
                </a>
            </div>
        </div>
    </div>

    {{-- Carte Commandes --}}
    <div class="col-md-4">
        <div class="card text-center shadow-sm h-100">
            <div class="card-body py-5">
                <div class="display-4 mb-3">🛒</div>
                <h4 class="card-title">Commandes</h4>
                <p class="card-text text-muted">Consulter et gérer toutes les commandes.</p>
                <a href="{{ route('commandes.index') }}" class="btn btn-warning mt-2">
                    Voir les commandes
                </a>
            </div>
        </div>
    </div>

</div>

@endsection
