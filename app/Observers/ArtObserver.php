<?php

namespace App\Observers;

use App\Art;

class ArtObserver
{
    /**
     * Handle the art "created" event.
     *
     * @param  \App\Art  $art
     * @return void
     */
    public function created(Art $art)
    {
        //
    }

    /**
     * Handle the art "updated" event.
     *
     * @param  \App\Art  $art
     * @return void
     */
    public function updated(Art $art)
    {
        //
    }

    /**
     * Handle the art "deleted" event.
     *
     * @param  \App\Art  $art
     * @return void
     */
    public function deleted(Art $art)
    {
        //
    }

    /**
     * Handle the art "restored" event.
     *
     * @param  \App\Art  $art
     * @return void
     */
    public function restored(Art $art)
    {
        //
    }

    /**
     * Handle the art "force deleted" event.
     *
     * @param  \App\Art  $art
     * @return void
     */
    public function forceDeleted(Art $art)
    {
        //
    }
}
