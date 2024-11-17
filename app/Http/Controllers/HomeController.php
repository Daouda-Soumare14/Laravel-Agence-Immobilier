<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->limit(4)->get();
        return view('home', [
            'properties' => $properties
        ]);
    }
}




// 1. Récupération des propriétés

// $properties = Property::orderBy('created_at', 'desc')->limit(4)->get();
// Property::orderBy('created_at', 'desc') :
// Utilise le Query Builder pour trier les propriétés par la colonne created_at.
// L'argument 'desc' indique un ordre décroissant, pour afficher les propriétés les plus récemment créées.
// limit(4) :
// Limite le nombre de propriétés récupérées à 4, correspondant aux 4 dernières propriétés ajoutées.
// get() :
// Exécute la requête et retourne les résultats sous forme d'une collection d'objets Property.
// 2. Envoi des données à la vue

// return view('home', [
//     'properties' => $properties
// ]);
// view('home') :
// Charge la vue home, probablement utilisée pour la page d'accueil.
// 'properties' => $properties :
// Passe la liste des 4 propriétés récupérées à la vue sous la variable $properties.
// Cela permet à la vue d'accéder et d'afficher ces propriétés.
