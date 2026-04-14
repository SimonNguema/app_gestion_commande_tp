@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

<div class="hero bg-primary text-white rounded-4 px-4 py-5 mb-5 shadow-lg">
    <div class="row align-items-center">
        <div class="col-lg-7">
            <h1 class="display-5 fw-semibold">Bienvenue dans l'application de gestion de commandes</h1>
            <p class="lead text-white-75">Gérez facilement vos utilisateurs, produits et commandes avec une interface moderne et fluide.</p>
            <div class="mt-4">
                <a href="{{ route('produits.index') }}" class="btn btn-light btn-lg me-2 shadow-sm">Voir les produits</a>
                <a href="{{ route('commandes.index') }}" class="btn btn-outline-light btn-lg shadow-sm">Voir les commandes</a>
            </div>
        </div>
        <div class="col-lg-5 text-center mt-4 mt-lg-0">
            <img src="https://img.freepik.com/vecteurs-premium/concept-illustration-isometrique-livraison-donnees-informatiques-marchandises_18660-1725.jpg?semt=ais_hybrid&w=740&q=80" alt="" class="img-fluid" style="max-height: 220px; filter: brightness(1.2);">
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 hover-translate">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                        <i class="bi bi-people-fill fs-2"></i>
                    </div>
                    <span class="badge bg-success">Rapide</span>
                </div>
                <h5 class="card-title">Gestion des utilisateurs</h5>
                <p class="card-text text-muted">Créez, modifiez et supprimez vos utilisateurs. Visualisez leurs commandes en un clic.</p>
                <a href="{{ route('users.index') }}" class="btn btn-outline-primary">Voir les utilisateurs</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 hover-translate">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                        <i class="bi bi-box-seam fs-2"></i>
                    </div>
                    <span class="badge bg-info text-dark">Inventaire</span>
                </div>
                <h5 class="card-title">Gestion des produits</h5>
                <p class="card-text text-muted">Ajoutez des produits, suivez les stocks, et facilitez la gestion commerciale.</p>
                <a href="{{ route('produits.index') }}" class="btn btn-outline-success">Voir les produits</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 hover-translate">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                        <i class="bi bi-cart-check-fill fs-2"></i>
                    </div>
                    <span class="badge bg-primary">Commande</span>
                </div>
                <h5 class="card-title">Gestion des commandes</h5>
                <p class="card-text text-muted">Créez, suivez et modifiez vos commandes en toute simplicité.</p>
                <a href="{{ route('commandes.index') }}" class="btn btn-outline-warning">Voir les commandes</a>
            </div>
        </div>
    </div>
</div>

@endsection
