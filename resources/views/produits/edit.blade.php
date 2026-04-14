@extends('layouts.app')

@section('title', 'Modifier Produit')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Modifier Produit</h2>
    <a href="{{ route('produits.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Retour
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <form action="{{ route('produits.update', $produit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Référence</label>
                    <input type="text" name="reference" value="{{ old('reference', $produit->reference) }}"
                           class="form-control @error('reference') is-invalid @enderror" required>
                    @error('reference')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nom du produit</label>
                    <input type="text" name="nom_produit" value="{{ old('nom_produit', $produit->nom_produit) }}"
                           class="form-control @error('nom_produit') is-invalid @enderror" required>
                    @error('nom_produit')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="3"
                              class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $produit->description) }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Prix (DA)</label>
                    <input type="number" name="prix" value="{{ old('prix', $produit->prix) }}" min="0"
                           class="form-control @error('prix') is-invalid @enderror" required>
                    @error('prix')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Stock</label>
                    <!-- Champ stock : quantité de produit disponible en inventaire, ne peut pas être négative -->
                    <input type="number" name="stock" value="{{ old('stock', $produit->stock) }}" min="0"
                           class="form-control @error('stock') is-invalid @enderror" required>
                    @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-warning button-soft shadow-sm">
                    <i class="bi bi-save me-2"></i> Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
