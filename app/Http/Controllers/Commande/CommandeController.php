<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with(['produit', 'user'])->latest()->paginate(10);
        return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
        $produits = Produit::orderBy('nom_produit')->get();
        $users    = User::orderBy('nom')->get();
        return view('commandes.create', compact('produits', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_commande' => 'required|date',
            'produit_id'    => 'required|exists:produits,id',
            'user_id'       => 'required|exists:users,id',
            'quantite'      => 'required|integer|min:1',
        ]);

        Commande::create($validated);

        return redirect()->route('commandes.index')->with('success', 'Commande créée avec succès.');
    }

    public function show(string $id)
    {
        $commande = Commande::with(['produit', 'user'])->findOrFail($id);
        return view('commandes.show', compact('commande'));
    }

    public function edit(string $id)
    {
        $commande = Commande::findOrFail($id);
        $produits = Produit::orderBy('nom_produit')->get();
        $users    = User::orderBy('nom')->get();
        return view('commandes.edit', compact('commande', 'produits', 'users'));
    }

    public function update(Request $request, string $id)
    {
        $commande = Commande::findOrFail($id);

        $validated = $request->validate([
            'date_commande' => 'required|date',
            'produit_id'    => 'required|exists:produits,id',
            'user_id'       => 'required|exists:users,id',
            'quantite'      => 'required|integer|min:1',
        ]);

        $commande->update($validated);

        return redirect()->route('commandes.index')->with('success', 'Commande mise à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();

        return redirect()->route('commandes.index')->with('success', 'Commande supprimée avec succès.');
    }
}
