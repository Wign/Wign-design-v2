<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Art
 *
 * @property-read \App\Artist $artist
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Art newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Art newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Art query()
 * @mixin \Eloquent
 */
class Art extends Model
{
    // MASS ASSIGNMENT ------------------------------------------
    protected $fillable = [
        'artist_id',
        'title',
        'publish',
        'views',
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
