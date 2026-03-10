<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Modèle Produit
|--------------------------------------------------------------------------
| Représente la table "produits" en base de données.
| Hérite de Model qui fournit toutes les méthodes (find, create, save…).
*/
class Produit extends Model
{
    // Champs autorisés à être remplis en masse
    protected $fillable = [
        'reference',
        'nom_produit',
        'description',
        'prix',
        'stock',
    ];

    // -------------------------------------------------------
    // Relation : Un produit peut apparaître dans plusieurs commandes
    // -------------------------------------------------------
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'produit_id');
    }
}
