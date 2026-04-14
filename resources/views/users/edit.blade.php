@extends('layouts.app')

@section('title', 'Modifier Utilisateur')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Modifier Utilisateur</h2>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Retour
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom', $user->nom) }}"
                           class="form-control @error('nom') is-invalid @enderror" required>
                    @error('nom')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom', $user->prenom) }}"
                           class="form-control @error('prenom') is-invalid @enderror" required>
                    @error('prenom')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                           class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Rôle</label>
                    <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="client" {{ old('role', $user->role) === 'client' ? 'selected' : '' }}>Client</option>
                        <option value="admin"  {{ old('role', $user->role) === 'admin'  ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nouveau mot de passe <small class="text-muted">(laisser vide pour ne pas changer)</small></label>
                    <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror">
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Confirmation mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-control">
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
