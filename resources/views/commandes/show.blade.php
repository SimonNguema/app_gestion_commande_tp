@extends('layouts.app')

@section('title', 'Détails Commande')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Détails Commande #{{ $commande->id }}</h2>
    <div>
        <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning me-1">
            <i class="bi bi-pencil"></i> Modifier
        </a>
        <a href="{{ route('commandes.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Retour
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $commande->id }}</dd>

            <dt class="col-sm-3">Date</dt>
            <dd class="col-sm-9">{{ \Carbon\Carbon::parse($commande->date_commande)->format('d/m/Y H:i') }}</dd>

            <dt class="col-sm-3">Client</dt>
            <dd class="col-sm-9">
                @if($commande->user)
                    <a href="{{ route('users.show', $commande->user->id) }}">
                        {{ $commande->user->nom }} {{ $commande->user->prenom }}
                    </a>
                @else
                    –
                @endif
            </dd>

            <dt class="col-sm-3">Produit</dt>
            <dd class="col-sm-9">
                @if($commande->produit)
                    <a href="{{ route('produits.show', $commande->produit->id) }}">
                        {{ $commande->produit->nom_produit }}
                    </a>
                    <small class="text-muted">(Réf: {{ $commande->produit->reference }})</small>
                @else
                    –
                @endif
            </dd>

            <dt class="col-sm-3">Quantité</dt>
            <dd class="col-sm-9">{{ $commande->quantite }}</dd>

            @if($commande->produit)
            <dt class="col-sm-3">Montant total</dt>
            <dd class="col-sm-9">{{ number_format($commande->quantite * $commande->produit->prix, 0, ',', ' ') }} FCFA</dd>
            @endif

            <dt class="col-sm-3">Créée le</dt>
            <dd class="col-sm-9">{{ $commande->created_at->format('d/m/Y H:i') }}</dd>
        </dl>
    </div>
</div>
@endsection
