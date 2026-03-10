@extends('layouts.app')

@section('title', 'Nouvelle Commande')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Nouvelle Commande</h2>
    <a href="{{ route('commandes.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Retour
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('commandes.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Date de commande</label>
                    <input type="datetime-local" name="date_commande"
                           value="{{ old('date_commande', now()->format('Y-m-d\TH:i')) }}"
                           class="form-control @error('date_commande') is-invalid @enderror" required>
                    @error('date_commande')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Quantité</label>
                    <input type="number" name="quantite" value="{{ old('quantite', 1) }}" min="1"
                           class="form-control @error('quantite') is-invalid @enderror" required>
                    @error('quantite')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Client</label>
                    <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                        <option value="">-- Choisir un client --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->nom }} {{ $user->prenom }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Produit</label>
                    <select name="produit_id" class="form-select @error('produit_id') is-invalid @enderror" required>
                        <option value="">-- Choisir un produit --</option>
                        @foreach($produits as $produit)
                            <option value="{{ $produit->id }}" {{ old('produit_id') == $produit->id ? 'selected' : '' }}>
                                {{ $produit->nom_produit }} (Stock: {{ $produit->stock }})
                            </option>
                        @endforeach
                    </select>
                    @error('produit_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
