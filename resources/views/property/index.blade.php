@extends('base')

@section('title', 'Tous nos biens')

@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <form action="" method="get" class="container d-flex gap-2"><!--on aimerai bien que les informations reste dans l'url -->
        <input type="nomber" placeholder="Surface maximun" class="form-control" name="surface" value="{{ $input['surface'] ?? ''}}">
        <input type="nomber" placeholder="Nombre de pièce min" class="form-control" name="rooms" value="{{ $input['rooms'] ?? ''}}">
        <input type="nomber" placeholder="Budget max" class="form-control" name="price" value="{{ $input['price'] ?? ''}}">
        <input placeholder="Mot clé" class="form-control" name="title" value="{{ $input['title'] ?? ''}}">
        <button class="btn btn-primary btn-sm flex-grow-0">
            Rechercher
        </button>
    </form>
</div>

    <div class="container">
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>
            @empty
                <div class="col">
                    Aucun bien ne correspond à votre recherche
                </div>
            @endforelse
        </div>

        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>

@endsection
