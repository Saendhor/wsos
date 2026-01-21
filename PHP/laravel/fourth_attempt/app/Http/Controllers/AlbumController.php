<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

/*
MariaDB [fourth_attempt]> desc albums;
+------------+---------------------+------+-----+---------+----------------+
| Field      | Type                | Null | Key | Default | Extra          |
+------------+---------------------+------+-----+---------+----------------+
| id         | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| name       | varchar(255)        | NO   |     | NULL    |                |
| artist     | varchar(255)        | NO   |     | NULL    |                |
| genre      | varchar(255)        | NO   |     | NULL    |                |
| year       | int(11)             | NO   |     | NULL    |                |
| created_at | timestamp           | YES  |     | NULL    |                |
| updated_at | timestamp           | YES  |     | NULL    |                |
+------------+---------------------+------+-----+---------+----------------+

*/
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()     {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $album = new Album();
        $album->name = $request->name;
        $album->artist = $request->artist;
        $album->genre = $request->genre;
        $album->year = $request->year;
        $album->save();
        return redirect('/albums');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album){
        return view('albums.show', compact('album'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album) {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album) {
        $album->name = $request->name;
        $album->artist = $request->artist;
        $album->genre = $request->genre;
        $album->year = $request->year;
        $album->save();
        return redirect('/albums');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album){
        $album->delete($album->id);
        return redirect('/albums');
    }
}
