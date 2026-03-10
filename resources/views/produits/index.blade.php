@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Produits</h2>
    <a href="{{ route('produits.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nouveau produit
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Référence</th>
                    <th>Nom</th>
                    <th>Prix (DA)</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produits as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->reference }}</td>
                    <td>{{ $produit->nom_produit }}</td>
                    <td>{{ number_format($produit->prix, 0, ',', ' ') }}</td>
                    <td>
                        <span class="badge bg-{{ $produit->stock > 0 ? 'success' : 'danger' }}">
                            {{ $produit->stock }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-sm btn-info text-white">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Supprimer ce produit ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-3">Aucun produit trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $produits->links() }}
</div>
@endsection
