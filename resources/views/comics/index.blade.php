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

        {{-- detail page --}}
        <div>
            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}">More details..</a>
        </div>


        {{-- edit --}}
        <div>
            <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Modifica prodotto</a>
        </div>

        {{-- delete --}}
        <div>
            <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Cancella" onClick="return confirm('Sei sicuro di voler cancellare?');">
            </form>
        <br>
    @endforeach
@endsection