<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Modèle Commande
|--------------------------------------------------------------------------
| Représente la table "commandes" en base de données.
| Une commande appartient à un utilisateur ET à un produit.
*/
class Commande extends Model
{
    // Champs autorisés à être remplis en masse
    protected $fillable = [
        'date_commande',
        'produit_id',
        'user_id',
        'quantite',
    ];

    // -------------------------------------------------------
    // Relation : Une commande appartient à UN produit
    // belongsTo = "appartient à"
    // -------------------------------------------------------
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    // -------------------------------------------------------
    // Relation : Une commande appartient à UN utilisateur
    // -------------------------------------------------------
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
