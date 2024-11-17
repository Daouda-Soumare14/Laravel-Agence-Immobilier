<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;


class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query()->orderBy('created_at', 'desc');

        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }
        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }
        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property) // utilisation du system de model binding
    {
        $expectedSlug = $property->getSlug();

        if ($slug !== $expectedSlug) {
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property]);
        }

        return view('property.show', [
            'property' => $property
        ]);
    }
}





// 1. Méthode index
// Fonctionnalité :

// La méthode index récupère et affiche une liste paginée de propriétés en fonction de critères de recherche fournis par l'utilisateur (comme le prix, la surface, le nombre de pièces, etc.).

// Détail du fonctionnement :

// $query = Property::query()->orderBy('created_at', 'desc');
// Property::query() : Crée une requête de base sur le modèle Property.
// orderBy('created_at', 'desc') : Trie les résultats par date de création, du plus récent au plus ancien.
// Filtres conditionnels :
// Des filtres sont appliqués uniquement si l'utilisateur a spécifié des critères de recherche dans sa requête.

// if ($price = $request->validated('price')) {
//     $query = $query->where('price', '<=', $price);
// }
// $request->validated('price') : Récupère la valeur du champ price validée par la classe de requête SearchPropertiesRequest.
// where('price', '<=', $price) : Filtre les propriétés dont le prix est inférieur ou égal à la valeur saisie.
// Les autres filtres fonctionnent de manière similaire :

// Surface minimale : where('surface', '>=', $surface)
// Nombre de pièces minimal : where('rooms', '>=', $rooms)
// Recherche dans le titre :
// if ($title = $request->validated('title')) {
//     $query = $query->where('title', 'like', "%{$title}%");
// }
// Utilise une recherche partielle avec l'opérateur SQL LIKE.
// Rendu dans la vue :
// return view('property.index', [
//     'properties' => $query->paginate(16),
//     'input' => $request->validated()
// ]);
// $query->paginate(16) : Récupère les résultats en lots de 16 par page pour une pagination efficace.
// 'input' => $request->validated() : Passe les critères de recherche validés à la vue pour les afficher ou les réutiliser (par exemple, dans un formulaire de recherche).
// 2. Méthode show
// Fonctionnalité :

// Cette méthode affiche les détails d'une propriété spécifique en fonction de son slug et de son identifiant.

// Modèle de liaison (Model Binding) :

// public function show(string $slug, Property $property)
// string $slug : Paramètre représentant le slug de la propriété, passé via l'URL.
// Property $property : Laravel utilise l'identifiant de la propriété fourni dans l'URL pour récupérer automatiquement l'objet correspondant dans la base de données.
// Vérification du slug :

// $expectedSlug = $property->getSlug();

// if ($slug !== $expectedSlug) {
//     return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property]);
// }
// $property->getSlug() : Méthode définie dans le modèle Property pour générer dynamiquement le slug basé sur le titre.
// Vérifie si le slug fourni dans l'URL correspond au slug attendu. Si ce n'est pas le cas, redirige l'utilisateur vers l'URL correcte.
