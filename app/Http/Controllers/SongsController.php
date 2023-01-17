<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();
        return view('songs.index',['songs'=>$songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');    // danach view in einer neuen Datei erstellen -> create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Daten-Validierung */
        $validatedData = $request->validate([
            'title'=>'required|min:2',   // nach Absenden leeren|Textfeld mit mind. 2 Buchstaben
            'band'=>'required'
        ]);

        /* validierte Dateb übertragen und in DB eintragen */
        $song = new Song();
        $song->title=$validatedData['title'];    //ohne Validierung: $song->title=$request->input('title');
        $song->band=$validatedData['band'];    //ohne Validierung: $song->band=$request->input('band');
        $song->save();
        return redirect('/songs');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /* Song nach ID aufrufen */
    public function show($id)
    {
        $song=Song::findOrFail($id);
        return view('songs.show',compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Daten zu editieren/bearbeiten auslesen / aus Formular auslesen
        $song=new Song();
        $song=Song::findOrFail($id);

        // neue Datei views/edit einlegen
        /* return view('songs.edit');  */ 
        
        return view('songs.edit', compact('song'));  // um aus Formular auslesen, braucht man compact()
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Song finden
        $song = Song::findOrFail($id);

        // edit.blade.php updaten/validieren
        /* Daten-Validierung */
        $validatedData = $request->validate([
            'title'=>'required|min:2',   // nach Absenden leeren|Textfeld mit mind. 2 Buchstaben
            'band'=>'required'
        ]);

        /* validierte Dateb übertragen und in DB eintragen */
        /* das brauchen wir nicht !!!  $song = new Song(); */
        $song->title=$validatedData['title'];    //ohne Validierung: $song->title=$request->input('title');
        $song->band=$validatedData['band'];    //ohne Validierung: $song->band=$request->input('band');
        $song->save();
        return redirect('/songs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Daten löschen (ID fnden, Methode delete des Song-Objektes aufrufen, redirect auf 'songs')
        $song=Song::findOrFail($id);
        $song->delete();
        return redirect('/songs');
    }
}
