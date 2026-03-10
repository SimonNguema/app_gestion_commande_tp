@extends('layouts.app')

@section('title', 'Liste des Commandes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Commandes</h2>
    <a href="{{ route('commandes.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nouvelle commande
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Client</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Actions</th>
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
                    <td>
                        <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-sm btn-info text-white">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Supprimer cette commande ?')">
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
                    <td colspan="6" class="text-center text-muted py-3">Aucune commande trouvée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $commandes->links() }}
</div>
@endsection
