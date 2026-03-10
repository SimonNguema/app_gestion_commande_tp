<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;



Route::get('/', function () {
    return view('home');
})->name('home');

// -------------------------------------------------------
// Gestion des utilisateurs
// -------------------------------------------------------
Route::get('/users',              [UserController::class, 'index'])->name('users.index');    // Liste des utilisateurs
Route::get('/users/create',       [UserController::class, 'create'])->name('users.create'); // Formulaire création
Route::post('/users',             [UserController::class, 'store'])->name('users.store');   // Enregistrer en base
Route::get('/users/{id}',         [UserController::class, 'show'])->name('users.show');     // Détail d'un utilisateur
Route::get('/users/{id}/edit',    [UserController::class, 'edit'])->name('users.edit');     // Formulaire modification
Route::put('/users/{id}',         [UserController::class, 'update'])->name('users.update'); // Sauvegarder modification
Route::delete('/users/{id}',      [UserController::class, 'destroy'])->name('users.destroy'); // Supprimer


Route::get('/produits',           [ProduitController::class, 'index'])->name('produits.index');    // Liste des produits
Route::get('/produits/create',    [ProduitController::class, 'create'])->name('produits.create'); // Formulaire création
Route::post('/produits',          [ProduitController::class, 'store'])->name('produits.store');   // Enregistrer en base
Route::get('/produits/{id}',      [ProduitController::class, 'show'])->name('produits.show');     // Détail d'un produit
Route::get('/produits/{id}/edit', [ProduitController::class, 'edit'])->name('produits.edit');     // Formulaire modification
Route::put('/produits/{id}',      [ProduitController::class, 'update'])->name('produits.update'); // Sauvegarder modification
Route::delete('/produits/{id}',   [ProduitController::class, 'destroy'])->name('produits.destroy'); // Supprimer

// -------------------------------------------------------
// Gestion des commandes
// -------------------------------------------------------
Route::get('/commandes',           [CommandeController::class, 'index'])->name('commandes.index');    // Liste des commandes
Route::get('/commandes/create',    [CommandeController::class, 'create'])->name('commandes.create'); // Formulaire création
Route::post('/commandes',          [CommandeController::class, 'store'])->name('commandes.store');   // Enregistrer en base
Route::get('/commandes/{id}',      [CommandeController::class, 'show'])->name('commandes.show');     // Détail d'une commande
Route::get('/commandes/{id}/edit', [CommandeController::class, 'edit'])->name('commandes.edit');     // Formulaire modification
Route::put('/commandes/{id}',      [CommandeController::class, 'update'])->name('commandes.update'); // Sauvegarder modification
Route::delete('/commandes/{id}',   [CommandeController::class, 'destroy'])->name('commandes.destroy'); // Supprimer


