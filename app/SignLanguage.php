<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SignLanguage.
 *
 * @property int $id
 * @property string $code
 * @property string $text
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sign[] $signs
 * @property-read int|null $signs_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage whereText($value)
 * @mixin \Eloquent
 */
class SignLanguage extends Model
{
    public $timestamps = false;

    // MASS ASSIGNMENT ------------------------------------------
    protected $fillable = []; // It must not be mass assigment, as it is a static list of languages

    // DEFINING RELATIONSHIPS -----------------------------------
    public function signs() {
        return $this->hasMany(Sign::class);
    }
}
