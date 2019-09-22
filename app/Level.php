<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Level
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level signs()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level translations()
 * @mixin \Eloquent
 * @property int $id
 * @property int $rank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Level whereUpdatedAt($value)
 */
class Level extends Model
{
    // MASS ASSIGNMENT ------------------------------------------

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rank'
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function users()
    {
        return $this->belongsToMany('App\User', 'qcvs', 'level_id', 'user_id')->withTimestamps();
    }

    /*
    public function ils()
    {
        return $this->hasMany('App\Il', 'level_id');
    }
    */

    // CREATE SCOPES -----------------------------------------------
    public function scopeTranslations()
    {
        // $this->ils()->type == TRANSLATION
    }

    public function scopeSigns()
    {
        // $this->ils()->type == SIGN
    }
}
