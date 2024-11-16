@php
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    @if ($type === 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}"
            name="{{ $name }}">{{ old($name, $value) }}</textarea>
    @else
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}"
            name="{{ $name }}" value="{{ old($name, $value) }}">
    @endif
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


{{--
Voici une explication détaillée de chaque élément de votre code :

1. Conteneur <div> avec Classe Conditionnelle @class
<div @class(["form-group", $class])>
@class : Cette directive ajoute la classe CSS "form-group" au div. Si la variable
$class est définie, sa valeur sera aussi ajoutée comme classe.
Exemple de rendu : Si $class = 'mb-3', le div aura les classes "form-group mb-3".


2. Étiquette <label> pour le Champ
<label for="{{ $name }}">{{ $label }}</label>
for="{{ $name }}" : Associe l’attribut for de l’étiquette au champ de formulaire
ayant l’ID $name, ce qui facilite l’accessibilité.
{{ $label }} : Affiche le contenu de $label, qui est le texte de l’étiquette.


3. Condition @if pour Différents Types de Champs de Formulaire
@if ($type === 'textarea')
    <textarea class="form-control @error($name) is-invalid @enderror"
type="{{ $type }}" id="{{ $name }}" name="{{ $name }}">{{ old( $name, $value )}}</textarea>
@else
    <input class="form-control @error($name) is-invalid @enderror"
type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old( $name, $value )}}">
@endif
@if ($type === 'textarea') : Vérifie si le type de champ est 'textarea'.
Si c’est le cas, un champ <textarea> est rendu ; sinon, un champ <input> est utilisé.
Champ <textarea>

class="form-control @error($name) is-invalid @enderror" : Ajoute la classe
form-control pour le style Bootstrap et, si une erreur est associée à $name, ajoute aussi
is-invalid pour signaler une erreur visuelle.
type="{{ $type }}" : Bien que non nécessaire pour <textarea>, le type est défini
dynamiquement (souvent un champ texte).
id="{{ $name }}" et name="{{ $name }}" : Affectent l’identifiant et le nom du champ
avec la valeur de $name.
{{ old( $name, $value ) }} : Affiche la valeur précédente saisie dans le champ
(si disponible), ou $value si aucune donnée ancienne n'est disponible. La fonction old()
est utile pour garder les valeurs en cas de validation échouée.
Champ <input>

type="{{ $type }}" : Définit dynamiquement le type de l’élément <input> en fonction
de la valeur de $type (comme text, password, email, etc.).
value="{{ old( $name, $value )}}" : Définit la valeur de l’input avec les données
précédemment soumises ou avec la valeur initiale $value. --}}
