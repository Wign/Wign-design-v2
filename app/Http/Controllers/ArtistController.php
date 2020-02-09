<?php

namespace App\Http\Controllers;

use App\Art;
use App\Artist;
use App\Repositories\GalleryRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
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
        Storage::makeDirectory($directory);

        $name = Request::input('name');
        $url = Request::input('url');

        return $this->repository->createArtist($name, $url);
    }

    public function delete(string $artistId)
    {
        //Storage::deleteDirectory($directory);

        return $this->repository->deleteArtist($artistId);
    }

    public function addArt()
    {
        //$path = $request->file('avatar')->storeAs(
        //    'avatars', $request->user()->id

        $artistId = Request::input('artist_id');
        $title = Request::input('title');
        $publish = Carbon::createFromFormat('YYYY-MM-DD', Request::input('publish'));

        return $this->repository->createArt($artistId, $title, $publish);
    }

    public function removeArt(string $artId)
    {
        $artist = Art::find($artId)->artist;
        Storage::disk('s3')->delete('folder_path/file_name.jpg');

        return $this->repository->deleteArt($artId);
    }

    public function fetchArt()
    {
        $artist = Artist::inRandomOrder()->first();
        $art = $artist->arts()->inRandomOrder()->first()->with('artist')->get();

        //$exists = Storage::disk('s3')->exists('file.jpg');

        return $art;
    }

}
