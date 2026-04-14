@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-0">Produits</h2>
        <p class="text-muted mb-0">Catalogue de vos produits avec état du stock et actions rapides.</p>
    </div>

    <a href="{{ route('produits.create') }}" class="btn btn-success btn-lg shadow-sm">
        <i class="bi bi-plus-circle me-2"></i> Nouveau produit
    </a>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Référence</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produits as $produit)
                    <tr>
                        <td>{{ $produit->id }}</td>
                        <td>{{ $produit->reference }}</td>
                        <td>{{ $produit->nom_produit }}</td>
                        <td>{{ number_format($produit->prix, 0, ',', ' ') }} DA</td>
                        <td>
                            <span class="badge bg-{{ $produit->stock > 0 ? 'success' : 'danger' }}">
                                {{ $produit->stock }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-sm btn-outline-info me-1">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Supprimer ce produit ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Aucun produit trouvé.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            {{ $produits->links() }}
        </div>
    </div>
</div>
@endsection
