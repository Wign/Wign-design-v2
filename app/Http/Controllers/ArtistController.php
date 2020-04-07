<?php

namespace App\Http\Controllers;

use App\Art;
use App\Artist;

class ArtistController extends Controller
{

    public function fetchRandomArt()
    {
        $artist = Artist::all()->where('is_visible', 'true')->inRandomOrder()->first();
        $art = $artist->arts->where('is_visible')->inRandomOrder()->first()->with('artist')->get();

        return is_null($art) ? $this->defaultArt() : $art;
    }

    public function fetchRandomArtOfThisArtist($id)
    {
        $artist = Artist::find($id);
        $art = $artist->arts->where('is_visible', 'true')->inRandomOrder()->first()->with('artist')->get();

        return is_null($art) ? $this->defaultArt() : $art;
    }

    public function fetchArt($id)
    {
        $art = Art::find($id)->with('artist')->get();

        return is_null($art) ? $this->defaultArt() : $art;
    }

    private function defaultArt()
    {
        return Art::find(1);
    }

}
