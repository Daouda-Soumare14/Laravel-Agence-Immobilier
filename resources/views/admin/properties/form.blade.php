@extends('admin.admin')
@section('title', $property->exists ? 'Editer un bien' : 'Creer un bien')

@section('content')

<h1>@yield('title')</h1>

<form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property)}}" method="POST">

    @csrf
    @method($property->exists ? 'put' : 'post')

{{-- ligne 1 --}}
    <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])
            @include('shared.input', ['class' => 'col', 'label' => 'Surface', 'name' => 'surface', 'value' => $property->surface])
            @include('shared.input', ['class' => 'col', 'label' => 'Prix', 'name' => 'price', 'value' => $property->price])
    </div>

{{-- ligne 2 --}}
        @include('shared.input', ['class' => 'col', 'type' => 'textarea', 'name' => 'description', 'value' => $property->description])

{{-- ligne 3 --}}
    <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
            @include('shared.input', ['class' => 'col', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
            @include('shared.input', ['class' => 'col', 'label' => 'Etage', 'name' => 'floor', 'value' => $property->floor])
    </div>

{{-- ligne 4 --}}
    <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
            @include('shared.input', ['class' => 'col', 'label' => 'Ville', 'name' => 'city', 'value' => $property->city])
            @include('shared.input', ['class' => 'col', 'label' => 'Code postale', 'name' => 'postal_code', 'value' => $property->postal_code])

    </div>

{{-- ligne 5 --}}
    @include('shared.select', ['label' => 'Options', 'name' => 'options', 'value' => $property->options()->pluck('id'), 'multiple' => true])
    @include('shared.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'value' => $property->sold, 'options' => 'options'])


    <div>
        <button class="btn btn-primary">
            @if ($property->exists)
                Modifier
            @else
                Creer
            @endif
        </button>
    </div>
</form>
@endsection
