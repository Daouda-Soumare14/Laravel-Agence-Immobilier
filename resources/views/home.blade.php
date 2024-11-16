@extends('base')


@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence Lorem ipsum</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, tempore
                facilis! Repellat, temporibus soluta. Quibusdam autem cupiditate temporibus
                ullam, illo dolorum, id inventore fuga repudiandae quis totam aliquam eaque
                vitae?</p>
        </div>
    </div>

    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
