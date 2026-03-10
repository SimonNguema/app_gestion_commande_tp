@extends('layouts.app')

@section('title', 'Nouveau Produit')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Nouveau Produit</h2>
    <a href="{{ route('produits.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Retour
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('produits.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Référence</label>
                    <input type="text" name="reference" value="{{ old('reference') }}"
                           class="form-control @error('reference') is-invalid @enderror" required>
                    @error('reference')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nom du produit</label>
                    <input type="text" name="nom_produit" value="{{ old('nom_produit') }}"
                           class="form-control @error('nom_produit') is-invalid @enderror" required>
                    @error('nom_produit')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="3"
                              class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Prix (DA)</label>
                    <input type="number" name="prix" value="{{ old('prix') }}" min="0"
                           class="form-control @error('prix') is-invalid @enderror" required>
                    @error('prix')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" min="0"
                           class="form-control @error('stock') is-invalid @enderror" required>
                    @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
