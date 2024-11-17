@extends('base')

@section('titile', $property->title)

@section('content')
    <div class="container mt-3">
        <h1>{{ $property->title }}</h1>
    <h2>{{ $property->rooms }} pièces - {{ $property->surface }}m²</h2>

    <div class="text-primary fw-bold" style="font-size: 4rem;">
        {{ number_format($property->price, thousands_separator: ' ')}} £
    </div>

    <hr>

    <div class="mt-4">
        <h4>Interessé par ce bien ?</h4>

        <form action="" method="post" class="vstack gap-3">
            @csrf
            <div class="row">
                @include('shared.input', ['class' => 'col', 'label' => 'Prenom', 'name' => 'firstname'])
                @include('shared.input', ['class' => 'col', 'label' => 'Nom', 'name' => 'lastname'])
            </div>
            <div class="row">
                @include('shared.input', ['class' => 'col', 'label' => 'Telephone', 'name' => 'phone'])
                @include('shared.input', ['type' => 'email', 'class' => 'col', 'label' => 'Email', 'name' => 'email'])
            </div>
            @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'label' => 'Votre message', 'name' => 'message'])

            <div>
                <button class="btn btn-primary">Nous contacter</button>
            </div>
        </form>

        <div class="mt-4">
            <p>{{ nl2br($property->description) }}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caracteristique</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{$property->surface}} m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{$property->rooms}}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{$property->bedrooms}}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{$property->floor ?: 'Rez de chaussé'}}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{$property->address}}</br>
                                {{$property->city}} ({{$property->postal_code}})
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection




{{--
Voici une explication détaillée de chaque partie du code fourni, qui correspond à une vue Laravel pour afficher les détails d'un bien immobilier (par exemple, une maison ou un appartement) :

1. Extension d'un layout
@extends('base')
Cette directive indique que cette vue hérite d'une mise en page principale appelée base. Toutes les sections et structures communes (header, footer, etc.) sont définies dans cette mise en page.


2. Titre de la page
@section('titile', $property->title)
Définit la section titile (probablement une faute de frappe pour title) pour inclure le titre du bien immobilier. Cela est utilisé dans la mise en page base pour afficher un titre dynamique dans la balise <title> du HTML.


    3. Contenu principal
@section('content')
    <div class="container mt-3">
La section content contient le contenu principal de la page. Elle est définie dans un conteneur Bootstrap avec une marge en haut (mt-3).


4. Titre du bien
<h1>{{ $property->title }}</h1>
<h2>{{ $property->rooms }} pièces - {{ $property->surface }}m²</h2>
Affiche le titre du bien, le nombre de pièces et la surface habitable.
Ces informations proviennent des propriétés dynamiques du modèle $property.


5. Prix
<div class="text-primary fw-bold" style="font-size: 4rem;">
    {{ number_format($property->price, thousands_separator: ' ')}} £
</div>
Affiche le prix du bien avec un formatage des milliers (espace comme séparateur) suivi de la devise £.
Le texte est stylisé avec une taille de police importante et des classes CSS Bootstrap (text-primary pour une couleur bleue et fw-bold pour un texte en gras).


6. Formulaire de contact
<form action="" method="post" class="vstack gap-3">
    @csrf
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Prenom', 'name' => 'firstname'])
        @include('shared.input', ['class' => 'col', 'label' => 'Nom', 'name' => 'lastname'])
    </div>
    ...
    <button class="btn btn-primary">Nous contacter</button>
</form>
@csrf : Ajoute un token CSRF pour sécuriser le formulaire contre les attaques.
Le formulaire utilise des partials (shared.input) pour réutiliser les composants de champs d'entrée avec des paramètres (classe, label, type, et nom).
Exemple : ['class' => 'col', 'label' => 'Prenom', 'name' => 'firstname'] génère un champ de texte pour le prénom.
Le bouton envoie le formulaire via un POST à l'URL actuelle.


7. Description du bien
<p>{{ nl2br($property->description) }}</p>
Affiche la description du bien en convertissant les retours à la ligne (\n) en balises <br> avec la fonction nl2br.


8. Caractéristiques détaillées
<h2>Caracteristique</h2>
<table class="table table-striped">
    <tr>
        <td>Surface habitable</td>
        <td>{{$property->surface}} m²</td>
    </tr>
    ...
</table>
Utilise une table Bootstrap avec des lignes alternées (table-striped) pour afficher les caractéristiques détaillées comme :
Surface habitable
Nombre de pièces, chambres
Étage (affiche "Rez de chaussé" si $property->floor est null ou 0)
Adresse (avec code postal et ville)


9. Spécificités
<h2>Spécificités</h2>
<ul class="list-group">
    @foreach ($property->options as $option)
        <li class="list-group-item">{{ $option->name }}</li>
    @endforeach
</ul>
Liste les options spécifiques du bien (par exemple, garage, balcon) en utilisant une boucle @foreach sur $property->options.


10. Structure des colonnes
<div class="row">
    <div class="col-8">...</div>
    <div class="col-4">...</div>
</div>
Utilise une grille Bootstrap :
Colonne principale (8/12) : Contient les caractéristiques.
Colonne secondaire (4/12) : Contient les spécificités.Voici une explication détaillée de chaque partie du code fourni, qui correspond à une vue Laravel pour afficher les détails d'un bien immobilier (par exemple, une maison ou un appartement) :
