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

    public function fetchArt()
    {
        $artist = Artist::inRandomOrder()->first();
        $art = $artist->arts()->inRandomOrder()->first()->with('artist')->get();

        //$exists = Storage::disk('s3')->exists('file.jpg');

        return $art;
    }
}
