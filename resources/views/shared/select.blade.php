@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(["form-group", $class])>
    <label for="{{$name}}">{{$label}}</label>
    <select name="{{$name}}[]" id="{{$name}}" multiple>
        @foreach ($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


{{--
Voici une explication détaillée de chaque ligne de votre code PHP/Blade :

1. Bloc PHP pour Initialiser les Variables avec l'Opérateur ??=
@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
$class ??= null; : Cela signifie "si $class n'est pas défini ou est null,
alors définis $class à null." L'opérateur ??= est une version abrégée
de $class = $class ?? null; qui permet d'initialiser une variable si elle
n'a pas déjà une valeur.
$name ??= ''; : De la même manière, $name est initialisé à une chaîne vide ''
s'il n'a pas déjà de valeur définie.
$value ??= ''; : Initialisation de $value à une chaîne vide s'il n'est pas déjà défini.
$label ??= ucfirst($name); : Définit $label en utilisant ucfirst($name) si $label n'est
pas déjà défini. La fonction ucfirst() met la première lettre de $name en majuscule.
Cela permet d'initialiser une étiquette ($label) à partir de $name avec la première
lettre en majuscule.


2. Définition de la Classe CSS avec @class
<div @class(["form-group", $class])>
@class : Cette directive Blade permet de définir des classes CSS conditionnelles.
Ici, "form-group" est toujours ajouté, et si $class est défini, il sera aussi ajouté.
Résultat : Si $class vaut "text-center", alors le div aura les classes "form-group
text-center" ; sinon, il aura simplement "form-group".


3. Étiquette <label>
<label for="{{$name}}">{{$label}}</label>
for="{{$name}}" : Attribue l'identifiant $name à l'attribut for du <label>,
ce qui lie le label au champ de formulaire <select>.
{{$label}} : Affiche le contenu de la variable $label, qui sera l’étiquette
descriptive du champ de sélection.


4. Champ <select> avec Sélection Multiple
<select name="{{$name}}[]" id="{{$name}}" multiple>
name="{{$name}}[]" : Définit le nom du champ <select> avec $name suivi de [],
indiquant un champ multiple. Cela signifie que les valeurs sélectionnées seront
envoyées comme un tableau lors de la soumission du formulaire.
id="{{$name}}" : Associe l’identifiant $name au champ <select> pour être lié au <label>.
multiple : Permet à l'utilisateur de sélectionner plusieurs options.


5. Boucle @foreach pour Générer les Options
@foreach ($options as $k => $v)
<option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
@endforeach
@foreach ($options as $k => $v) : Boucle sur $options où $k est la clé (généralement
la valeur d’option) et $v est l’étiquette affichée pour cette option.
<option @selected($value->contains($k)) : La directive @selected de Blade ajoute
automatiquement l'attribut selected à l'élément <option> si la condition est vraie.
Ici, $value->contains($k) vérifie si $value (qui devrait être une collection
ou un tableau) contient la clé $k, sélectionnant cette option si c'est le cas.
value="{{ $k }}" : Définit l’attribut value de l’option avec la clé $k.
{{ $v }} : Affiche l'étiquette de l'option, soit la valeur $v.


6. Affichage des Erreurs avec @error
@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
@error($name) : Cette directive vérifie si une erreur existe pour le champ $name.
Si c'est le cas, le bloc qui suit est exécuté.
<div class="invalid-feedback"> : Un div avec la classe invalid-feedback pour afficher
les messages d'erreur de validation.
{{ $message }} : Affiche le message d'erreur correspondant au champ $name. --}}
