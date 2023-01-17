{{-- einzelne Song nach ID aufrufen --}}

@extends('songs.layout')
@section('content')
    <h2>{{$song->title}}</h2>
    <p> von {{$song->band}}</p>         {{-- Bsp. http://localhost:8000/songs/15 aufrufen --}}
@endsection