@extends('layout.app')

@section('main_content')
    <h1>{{ $comic['title'] }}</h1>    
    <img src="{{$comic['thumb']}}" alt="{{ $comic['title'] }}">
    <p>
        {{ $comic['description'] }}
    </p>

    <span>{{ $comic['series'] }}</span>

    <h3>
        {{ $comic['price'] }}
    </h3>
    <br>


    <br>
    <div>
        <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Modifica prodotto</a>
    </div>
@endsection