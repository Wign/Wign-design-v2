<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * App\Artist
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Art[] $arts
 * @property-read int|null $arts_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist query()
 * @mixin \Eloquent
 */
class Artist extends Model
{
    // MASS ASSIGNMENT ------------------------------------------
    protected $fillable = [
        'name',
        'url',
        'is_visible'
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function arts()
    {
        return $this->hasMany(Art::class);
    }

}
