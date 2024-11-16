@php
    $class ??= null;
@endphp

<div @class(['form-check form-switch', $class])>
    <input type="hidden" value="0" name="{{ $name }}">
    <input @checked(old($name, $value ?? false)) type="checkbox" name="{{ $name }}" value="1" class="form-check-input" @error($name) is-invalid @enderror role="switch" id="{{ $name }}">
    <label for="{{ $name }}" class="form-check-label">{{ $label }}</label>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


{{--
Voici une explication de chaque élément de ce code :

1. Conteneur <div> avec Classe Conditionnelle @class
<div @class(['form-check form-switch', $class])>
@class(['form-check form-switch', $class]) : Cette directive Blade ajoute les classes
"form-check form-switch" au conteneur <div>, ce qui permet d'afficher un commutateur
    (switch) en utilisant le style Bootstrap. Si la variable $class est définie, sa
    valeur sera également ajoutée comme classe supplémentaire.



2. Champ Caché <input type="hidden"> pour Valeur de Base
<input type="hidden" value="0" name="{{ $name }}">
Ce champ caché assure qu’une valeur de 0 est envoyée pour ce champ lorsqu'il est décoché.
Cela est nécessaire car, en HTML, les cases à cocher non cochées ne transmettent pas de valeur,
donc la valeur par défaut de 0 garantit une soumission correcte.



3. Case à Cocher <input type="checkbox"> avec Attribut @checked
<input @checked(old($name, $value ?? false)) type="checkbox" name="{{ $name }}" value="1"
class="form-check-input" @error($name) is-invalid @enderror role="switch" id="{{ $name }}">
@checked(old($name, $value ?? false)) : Utilise la directive @checked pour cocher
automatiquement la case si old($name, $value ?? false) est true.
old($name, $value ?? false) : La fonction old() vérifie si une valeur précédente
existe pour $name. Si oui, elle est utilisée ; sinon, $value ou false est utilisé par défaut.
type="checkbox" : Indique que cet élément est une case à cocher.
name="{{ $name }}" : Définit le nom de la case à cocher avec la valeur de $name.
value="1" : Si la case est cochée, elle enverra une valeur de 1 au serveur.
class="form-check-input" : Classe Bootstrap qui stylise la case à cocher en tant que
commutateur.
@error($name) is-invalid @enderror : Si une erreur de validation existe pour $name,
ajoute la classe is-invalid pour indiquer visuellement l’erreur.
role="switch" : Fournit une meilleure accessibilité en spécifiant que cet élément
fonctionne comme un commutateur.
id="{{ $name }}" : Définit l’attribut id pour correspondre avec le for de l’étiquette
associée.



4. Étiquette <label> Associée
<label for="{{ $name }}" class="form-check-label">{{ $label }}</label>
for="{{ $name }}" : Associe l’étiquette à la case à cocher avec un identifiant $name,
facilitant le clic pour activer/désactiver la case.
class="form-check-label" : Classe Bootstrap qui stylise l’étiquette pour l’aligner
correctement avec le commutateur.
{{ $label }} : Affiche le texte de l’étiquette, défini par la variable $label.
--}}
