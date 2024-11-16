@extends('admin.admin')
@section('title', $property->exists ? 'Editer un bien' : 'Creer un bien')

@section('content')

<h1>@yield('title')</h1>

<form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property)}}" method="POST">

    @csrf
    @method($property->exists ? 'put' : 'post')

{{-- ligne 1 --}}
    <div class="row">
        <div class="col md-4">
            @include('shared.input', ['label' => 'Titre', 'name' => 'title', 'value' => $property->title])
        </div>
        <div class="col md-4">
            @include('shared.input', ['label' => 'Surface', 'name' => 'surface', 'value' => $property->surface])
        </div>
        <div class="col md-4">
            @include('shared.input', ['label' => 'Prix', 'name' => 'price', 'value' => $property->price])
        </div>
    </div>

{{-- ligne 2 --}}
    <div class="row">
        @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description])
    </div>

{{-- ligne 3 --}}
    <div class="row">
        <div class="col md-4">
            @include('shared.input', ['label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
        </div>
        <div class="col md-4">
            @include('shared.input', ['label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
        </div>
        <div class="col md-4">
            @include('shared.input', ['label' => 'Etage', 'name' => 'floor', 'value' => $property->floor])
        </div>
    </div>

{{-- ligne 4 --}}
    <div class="row">
        <div class="col md-4">
            @include('shared.input', ['label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
        </div>
        <div class="col md-4">
            @include('shared.input', ['label' => 'Ville', 'name' => 'city', 'value' => $property->city])
        </div>
        <div class="col md-4">
            @include('shared.input', ['label' => 'Code postale', 'name' => 'postal_code', 'value' => $property->postal_code])
        </div>

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
