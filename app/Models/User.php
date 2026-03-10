<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/*
|--------------------------------------------------------------------------
| Modèle User
|--------------------------------------------------------------------------
| Représente la table "users" en base de données.
| Ce modèle hérite de Authenticatable car Laravel l'utilise pour la connexion.
*/
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Champs autorisés à être remplis via User::create() ou $user->fill()
    // (protection contre le "mass assignment")
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'role',
        'password',
    ];

    // Champs cachés quand on convertit le modèle en JSON (ex : API)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Conversions automatiques de types
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed', // hash automatique du mot de passe
        ];
    }

    // -------------------------------------------------------
    // Relation : Un utilisateur peut avoir plusieurs commandes
    // hasMany = "a plusieurs"
    // -------------------------------------------------------
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'user_id');
    }
}
