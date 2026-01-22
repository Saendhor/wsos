<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

/*
+------------+---------------------+------+-----+---------+----------------+
| Field      | Type                | Null | Key | Default | Extra          |
+------------+---------------------+------+-----+---------+----------------+
| id         | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| title      | varchar(255)        | NO   |     | NULL    |                |
| album_id   | bigint(20) unsigned | NO   | MUL | NULL    |                |
| created_at | timestamp           | YES  |     | NULL    |                |
| updated_at | timestamp           | YES  |     | NULL    |                |
+------------+---------------------+------+-----+---------+----------------+

*/
class TrackController extends Controller
{
    public function index() {
        $tracks = Track::all();
        return view('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $track = new Track();
        $track->title = $request->title;
        $track->album_id = $request->album_id;
        $track->save();
        return redirect('/tracks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        return view('tracks.show', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        $track->title = $request->title;
        $track->album_id = $request->album_id;
        $track->save();
        return redirect('/tracks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        $track->delete($track->id);
        return redirect('/tracks');
    }
}
