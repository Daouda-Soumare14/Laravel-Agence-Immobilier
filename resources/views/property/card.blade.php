<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property])}}">{{ $property->title}}</a>
        </h5>
        <p class="card-text">{{ $property->surface }}m² - {{ $property->city }}({{ $property->postal_code }})</p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }}£
        </div>
    </div>
</div>




{{--
Structure générale
<div class="card">
    <div class="card-body">
        ...
    </div>
</div>
<div class="card"> : Crée une carte Bootstrap, un composant visuel utilisé pour présenter des informations succinctes.
<div class="card-body"> : Contient le contenu principal de la carte (titre, texte, prix).
1. Titre et lien
<h5 class="card-title">
    <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property])}}">
        {{ $property->title }}
    </a>
</h5>
<h5 class="card-title"> : Définit le titre de la carte avec un style standard.
Lien (<a>) :
href="{{ route('property.show', [...]) }}" : Génère une URL vers la route property.show avec deux paramètres :
slug : Utilise une méthode getSlug() pour obtenir un slug propre (URL-friendly) du titre de la propriété.
property : Passe l'objet $property comme paramètre à la route.
Le lien redirige vers une page dédiée aux détails de la propriété.
{{ $property->title }} : Affiche le titre de la propriété.
2. Description succincte
<p class="card-text">{{ $property->surface }}m² - {{ $property->city }}({{ $property->postal_code }})</p>
<p class="card-text"> : Ajoute une description concise :
$property->surface : Surface habitable de la propriété en mètres carrés.
$property->city et $property->postal_code : Ville et code postal où se situe la propriété.
3. Prix
<div class="text-primary fw-bold" style="font-size: 1.4rem;">
    {{ number_format($property->price, thousands_separator: ' ') }}£
</div>
<div class="text-primary fw-bold" style="font-size: 1.4rem;"> :
text-primary : Applique une couleur bleue pour indiquer une information importante.
fw-bold : Rend le texte en gras.
style="font-size: 1.4rem;" : Applique une taille de police personnalisée.
{{ number_format($property->price, thousands_separator: ' ') }}£ :
Utilise la fonction number_format pour formater le prix avec des espaces comme séparateurs de milliers (exemple : 120 000 £). --}}
