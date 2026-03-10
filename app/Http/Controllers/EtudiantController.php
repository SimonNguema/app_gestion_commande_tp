<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }

    public function create()
    {
        return view('etudiants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'matricule' => 'required|unique:etudiants',
            'prenom' => 'required|string',
            'nom' => 'required',
            'email' => 'required|email|unique:etudiants',
            'telephone' => 'nullable',
            'date_naissance' => 'nullable|date',
        ]);

        Etudiant::create($validated);
        return redirect()->route('etudiants.index')->with('success', 'Étudiant créé avec succès.');
    }

    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', compact('etudiant'));
    }

    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }
}
