@extends('layouts.app')

@section('title', 'Liste des Commandes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-0">Commandes</h2>
        <p class="text-muted mb-0">Suivez les commandes clients et renseignez les livraisons rapidement.</p>
    </div>

    <a href="{{ route('commandes.create') }}" class="btn btn-primary btn-lg shadow-sm">
        <i class="bi bi-plus-circle me-2"></i> Nouvelle commande
    </a>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Client</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($commandes as $commande)
                    <tr>
                        <td>{{ $commande->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($commande->date_commande)->format('d/m/Y H:i') }}</td>
                        <td>{{ $commande->user->nom ?? '–' }} {{ $commande->user->prenom ?? '' }}</td>
                        <td>{{ $commande->produit->nom_produit ?? '–' }}</td>
                        <td>{{ $commande->quantite }}</td>
                        <td class="text-end">
                            <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-sm btn-outline-info me-1">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Supprimer cette commande ?')">
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
                        <td colspan="6" class="text-center text-muted py-4">Aucune commande trouvée.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            {{ $commandes->links() }}
        </div>
    </div>
</div>
@endsection
