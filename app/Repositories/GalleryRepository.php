<?php

namespace App\Repositories;


use App\Art;
use App\Artist;
use Carbon\Carbon;

class GalleryRepository
{
    public function createArtist(string $name, string $url = null)
    {
        return Artist::create([
            'name' => $name,
            'url' => $url,
        ]);
    }

    public function deleteArtist(string $artistId)
    {
        return Artist::destroy($artistId); //Cascade effect on all its arts
    }

    public function createArt(string $artistId, string $title = null, Carbon $publish = null): Art
    {
        return Art::create([
            'artist_id' => $artistId,
            'title' => $title,
            'publish' => $publish,
        ]);
    }

    public function deleteArt(string $artId)
    {
        return Art::destroy($artId);
    }
}
