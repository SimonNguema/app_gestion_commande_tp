<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    // -------------------------------------------------------
    // index() → Afficher la liste des commandes
    // URL : GET /commandes
    // On charge aussi le produit et l'utilisateur liés (eager loading)
    // -------------------------------------------------------
    public function index()
    {
        // with(['produit', 'user']) évite le problème N+1 (une requête au lieu de N)
        $commandes = Commande::with(['produit', 'user'])->get();

        return view('commandes.index', compact('commandes'));
    }

    // -------------------------------------------------------
    // create() → Afficher le formulaire de création
    // URL : GET /commandes/create
    // On passe la liste des produits et utilisateurs pour les selects
    // -------------------------------------------------------
    public function create()
    {
        $produits = Produit::all();
        $users    = User::all();

        return view('commandes.create', compact('produits', 'users'));
    }

    // -------------------------------------------------------
    // store() → Enregistrer la commande
    // URL : POST /commandes
    // -------------------------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'date_commande' => 'required|date',
            'produit_id'    => 'required|exists:produits,id',
            'user_id'       => 'required|exists:users,id',
            'quantite'      => 'required|integer|min:1',
        ]);

        Commande::create([
            'date_commande' => $request->date_commande,
            'produit_id'    => $request->produit_id,
            'user_id'       => $request->user_id,
            'quantite'      => $request->quantite,
        ]);

        return redirect()->route('commandes.index')->with('success', 'Commande créée avec succès.');
    }

    // -------------------------------------------------------
    // show() → Afficher le détail d'une commande
    // URL : GET /commandes/{id}
    // -------------------------------------------------------
    public function show(string $id)
    {
        $commande = Commande::with(['produit', 'user'])->findOrFail($id);

        return view('commandes.show', compact('commande'));
    }

    // -------------------------------------------------------
    // edit() → Afficher le formulaire de modification
    // URL : GET /commandes/{id}/edit
    // -------------------------------------------------------
    public function edit(string $id)
    {
        $commande = Commande::findOrFail($id);
        $produits = Produit::all();
        $users    = User::all();

        return view('commandes.edit', compact('commande', 'produits', 'users'));
    }

    // -------------------------------------------------------
    // update() → Sauvegarder les modifications
    // URL : PUT /commandes/{id}
    // -------------------------------------------------------
    public function update(Request $request, string $id)
    {
        $commande = Commande::findOrFail($id);

        $request->validate([
            'date_commande' => 'required|date',
            'produit_id'    => 'required|exists:produits,id',
            'user_id'       => 'required|exists:users,id',
            'quantite'      => 'required|integer|min:1',
        ]);

        $commande->date_commande = $request->date_commande;
        $commande->produit_id    = $request->produit_id;
        $commande->user_id       = $request->user_id;
        $commande->quantite      = $request->quantite;
        $commande->save();

        return redirect()->route('commandes.index')->with('success', 'Commande modifiée avec succès.');
    }

    // -------------------------------------------------------
    // destroy() → Supprimer une commande
    // URL : DELETE /commandes/{id}
    // -------------------------------------------------------
    public function destroy(string $id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();

        return redirect()->route('commandes.index')->with('success', 'Commande supprimée avec succès.');
    }
}
