@extends('songs.layout')
@section('content')
    <h2>Meine Song-Liste</h2>
    <h3>Neuen Song anlegen</h3>
    <p><a href="/songs/create">Neuer Song erstellen</a></p>
    <ul>
        @foreach ($songs as $song)
            <li>
                <b>
                    {{-- Relative Links ausgeben: 
                    <a href="/songs/{{$song->id}}">--}}

                    {{-- Absolute Links über die Hilfsfunktion url() --}}
                    <a href="{{url('/songs',['id'=>$song->id])}}">
                        {{$song->title}}
                    </a>
                </b>
                 von <b>{{$song->band}}</b>

                <form action="/songs/{{$song->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary btn-sm">Löschen</button>
                </form>
                <form action="/songs/{{$song->id}}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-info btn-sm">bearbeiten</button>

                {{-- alternative --}}
                <a href="/songs/{{$song->id}}/edit" class="btn btn-warning btn-sm" role="button">Bearbeiten</a>

                </form>
            </li>
        @endforeach
    </ul>
@endsection