<?php

namespace App\Http\Controllers\Produit;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        return view('produits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference'   => 'required|string|max:100|unique:produits,reference',
            'nom_produit' => 'required|string|max:255',
            'description' => 'required|string',
            'prix'        => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        Produit::create($validated);

        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
    }

    public function show(string $id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.show', compact('produit'));
    }

    public function edit(string $id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.edit', compact('produit'));
    }

    public function update(Request $request, string $id)
    {
        $produit = Produit::findOrFail($id);

        $validated = $request->validate([
            'reference'   => 'required|string|max:100|unique:produits,reference,' . $produit->id,
            'nom_produit' => 'required|string|max:255',
            'description' => 'required|string',
            'prix'        => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $produit->update($validated);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
