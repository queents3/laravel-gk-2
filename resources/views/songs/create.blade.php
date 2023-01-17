{{-- kompatibil mit function create und index.blade.php --}}
{{-- auf das Formular reagiert function store --}}

@extends('songs.layout')
@section('content')

    <h3>Neuen Song anlegen</h3>

    <form action="/songs" method="post">
        {{-- crsf-Autorisierung ist für Formulare Absendungen - WICHTIG !!! --}}
        {{-- crsf ist kompatibil mit function store --}}
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">
                Titel
            </label>
            <input type="text" name="title" id="title" class="form-control" 
            value="{{old('title')}}">
        </div>

        <div class="mb-3">
            <label for="band" class="form-label">
                Band
            </label>
            <input type="text" name="band" id="band" class="form-control"
            value="{{old('band')}}">
        </div>

        <button type="submit" class="btn btn-primary">eintragen</button>
    </form>

    {{-- Formular-Meldungen für User beim Eintragen --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <h4>Fehler beim Eintragen!</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>                  
                @endforeach
            </ul>
        </div>
    @endif
@endsection