@extends('layouts.app')

@section('title', 'Détails Produit')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Détails Produit</h2>
    <div>
        <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-warning me-1">
            <i class="bi bi-pencil"></i> Modifier
        </a>
        <a href="{{ route('produits.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Retour
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $produit->id }}</dd>

            <dt class="col-sm-3">Référence</dt>
            <dd class="col-sm-9">{{ $produit->reference }}</dd>

            <dt class="col-sm-3">Nom</dt>
            <dd class="col-sm-9">{{ $produit->nom_produit }}</dd>

            <dt class="col-sm-3">Description</dt>
            <dd class="col-sm-9">{{ $produit->description }}</dd>

            <dt class="col-sm-3">Prix</dt>
            <dd class="col-sm-9">{{ number_format($produit->prix, 0, ',', ' ') }} DA</dd>

            <dt class="col-sm-3">Stock</dt>
            <dd class="col-sm-9">
                <span class="badge bg-{{ $produit->stock > 0 ? 'success' : 'danger' }}">
                    {{ $produit->stock }}
                </span>
            </dd>

            <dt class="col-sm-3">Créé le</dt>
            <dd class="col-sm-9">{{ $produit->created_at->format('d/m/Y H:i') }}</dd>
        </dl>
    </div>
</div>
@endsection
