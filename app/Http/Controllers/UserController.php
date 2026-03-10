<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // -------------------------------------------------------
    // index() → Afficher la liste de tous les utilisateurs
    // URL : GET /users
    // -------------------------------------------------------
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    // -------------------------------------------------------
    // create() → Afficher le formulaire de création
    // URL : GET /users/create
    // -------------------------------------------------------
    public function create()
    {
        return view('users.create');
    }

    // -------------------------------------------------------
    // store() → Enregistrer le nouvel utilisateur en base
    // URL : POST /users
    // -------------------------------------------------------
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom'                   => 'required|string|max:100',
            'prenom'                => 'required|string|max:100',
            'email'                 => 'required|email|unique:users,email',
            'role'                  => 'required|in:admin,client',
            'password'              => 'required|string|min:8|confirmed',
        ]);

        // Création de l'utilisateur (le mot de passe est hashé automatiquement via le cast du modèle)
        User::create([
            'nom'      => $request->nom,
            'prenom'   => $request->prenom,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    // -------------------------------------------------------
    // show() → Afficher les détails d'un utilisateur
    // URL : GET /users/{id}
    // -------------------------------------------------------
    public function show(string $id)
    {
        // findOrFail() renvoie une erreur 404 automatiquement si l'id n'existe pas
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    // -------------------------------------------------------
    // edit() → Afficher le formulaire de modification
    // URL : GET /users/{id}/edit
    // -------------------------------------------------------
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    // -------------------------------------------------------
    // update() → Sauvegarder les modifications
    // URL : PUT /users/{id}
    // -------------------------------------------------------
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nom'      => 'required|string|max:100',
            'prenom'   => 'required|string|max:100',
            // On ignore l'email de cet utilisateur pour l'unicité (règle "ignore")
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role'     => 'required|in:admin,client',
            // Le mot de passe est facultatif lors d'une mise à jour
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->nom    = $request->nom;
        $user->prenom = $request->prenom;
        $user->email  = $request->email;
        $user->role   = $request->role;

        // On ne change le mot de passe que si l'utilisateur en a saisi un
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès.');
    }

    // -------------------------------------------------------
    // destroy() → Supprimer un utilisateur
    // URL : DELETE /users/{id}
    // -------------------------------------------------------
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
