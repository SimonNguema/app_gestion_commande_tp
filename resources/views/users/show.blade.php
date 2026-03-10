@extends('layouts.app')

@section('title', 'Détails Utilisateur')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Détails Utilisateur</h2>
    <div>
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning me-1">
            <i class="bi bi-pencil"></i> Modifier
        </a>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Retour
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $user->id }}</dd>

            <dt class="col-sm-3">Nom</dt>
            <dd class="col-sm-9">{{ $user->nom }}</dd>

            <dt class="col-sm-3">Prénom</dt>
            <dd class="col-sm-9">{{ $user->prenom }}</dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{ $user->email }}</dd>

            <dt class="col-sm-3">Rôle</dt>
            <dd class="col-sm-9">
                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'secondary' }}">
                    {{ ucfirst($user->role) }}
                </span>
            </dd>

            <dt class="col-sm-3">Créé le</dt>
            <dd class="col-sm-9">{{ $user->created_at->format('d/m/Y H:i') }}</dd>
        </dl>
    </div>
</div>

@if($user->commandes->isNotEmpty())
<div class="card shadow-sm mt-4">
    <div class="card-header"><strong>Commandes de cet utilisateur</strong></div>
    <div class="card-body p-0">
        <table class="table table-sm mb-0">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->produit->nom_produit ?? '–' }}</td>
                    <td>{{ $commande->quantite }}</td>
                    <td>{{ \Carbon\Carbon::parse($commande->date_commande)->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
