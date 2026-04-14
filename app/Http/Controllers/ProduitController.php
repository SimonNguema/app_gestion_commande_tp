<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // -------------------------------------------------------
    // URL : GET /produits

    public function index()
    {
        $produits = Produit::paginate(10);
        return view('produits.index', compact('produits'));
    }

    // -------------------------------------------------------
    // create() → Afficher le formulaire d'ajout
    // URL : GET /produits/create
    // -------------------------------------------------------
    public function create()
    {
        return view('produits.create');
    }

    // -------------------------------------------------------
    // store() → Enregistrer le nouveau produit
    // URL : POST /produits
    // -------------------------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'nom_produit' => 'required|string|max:255',
            'description' => 'required|string',
            'prix'        => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $lastProduit = Produit::latest('id')->first();
        $nextNumber = $lastProduit ? $lastProduit->id + 1 : 1;
        $reference = 'PRD-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        Produit::create([
            'reference'   => $reference,
            'nom_produit' => $request->nom_produit,
            'description' => $request->description,
            'prix'        => $request->prix,
            'stock'       => $request->stock,
        ]);

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    // -------------------------------------------------------
    // show() → Afficher le détail d'un produit
    // URL : GET /produits/{id}
    // -------------------------------------------------------
    public function show(string $id)
    {
        $produit = Produit::findOrFail($id);

        return view('produits.show', compact('produit'));
    }

    // -------------------------------------------------------
    // edit() → Afficher le formulaire de modification
    // URL : GET /produits/{id}/edit
    // -------------------------------------------------------
    public function edit(string $id)
    {
        $produit = Produit::findOrFail($id);

        return view('produits.edit', compact('produit'));
    }

    // -------------------------------------------------------
    // update() → Sauvegarder les modifications
    // URL : PUT /produits/{id}
    // -------------------------------------------------------
    public function update(Request $request, string $id)
    {
        $produit = Produit::findOrFail($id);

        $request->validate([
            'reference'   => 'required|string|max:100|unique:produits,reference,' . $produit->id,
            'nom_produit' => 'required|string|max:255',
            'description' => 'required|string',
            'prix'        => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $produit->reference   = $request->reference;
        $produit->nom_produit = $request->nom_produit;
        $produit->description = $request->description;
        $produit->prix        = $request->prix;
        $produit->stock       = $request->stock;
        $produit->save();

        return redirect()->route('produits.index')->with('success', 'Produit modifié avec succès.');
    }

    // -------------------------------------------------------
    // destroy() → Supprimer un produit
    // URL : DELETE /produits/{id}
    // -------------------------------------------------------
    public function destroy(string $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
