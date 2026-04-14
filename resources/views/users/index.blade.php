@extends('layouts.app')

@section('title', 'Liste des Utilisateurs')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-0">Utilisateurs</h2>
        <p class="text-muted mb-0">Liste des comptes clients et administrateurs.</p>
    </div>

    <a href="{{ route('users.create') }}" class="btn btn-primary btn-lg shadow-sm">
        <i class="bi bi-person-plus me-2"></i> Nouvel utilisateur
    </a>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'secondary' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-outline-info me-1">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Supprimer cet utilisateur ?')">
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
                        <td colspan="6" class="text-center text-muted py-4">Aucun utilisateur trouvé.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
