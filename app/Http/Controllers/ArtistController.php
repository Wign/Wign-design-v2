<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Repositories\GalleryRepository;
use Carbon\Carbon;
use Request;

class ArtistController extends Controller
{
    private $repository;

    public function __construct(GalleryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create()
    {
        //TODO create folder in S3

        $name = Request::input('name');
        $url = Request::input('url');

        return $this->repository->createArtist($name, $url);
    }

    public function delete(string $artistId)
    {
        //TODO remove all arts in S3

        return $this->repository->deleteArtist($artistId);
    }

    public function addArt()
    {
        //TODO store new art in S3

        $artistId = Request::input('artist_id');
        $title = Request::input('title');
        $publish = Carbon::createFromFormat('YYYY-MM-DD', Request::input('publish'));

        return $this->repository->createArt($artistId, $title, $publish);
    }

    public function removeArt(string $artId)
    {
        //TODO remove the art in S3

        return $this->repository->deleteArt($artId);
    }

    public function fetchArt()
    {
        $artist = Artist::inRandomOrder()->first();
        $art = $artist->arts()->inRandomOrder()->first()->with('artist')->get();

        return $art;
    }

}
