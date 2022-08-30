@extends('layout.app')

@section('main_content')
    <h1>Available Comics</h1>    
    
    <br>

    @foreach ($comics as $comic)
        <div>
            Title: {{$comic['title']}}
        </div>
        <div>
            Price: {{$comic['price']}}
        </div>

        <div>
            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}">More details..</a>
        </div>
        <br>
    @endforeach
@endsection