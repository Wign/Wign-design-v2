<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Language.
 *
 * @property int $id
 * @property string $code
 * @property string $text
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Word[] $words
 * @property-read int|null $words_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereText($value)
 * @mixin \Eloquent
 */
class Language extends Model
{
    public $timestamps = false;

    // MASS ASSIGNMENT ------------------------------------------
    protected $fillable = ['code', 'text', 'type']; // It must not be mass assigment, as it is a static list of languages

    // DEFINING RELATIONSHIPS -----------------------------------
    public function words()
    {
        return $this->hasMany('App\Word')->where('type', '=', 'TEXT');
    }

    public function signs()
    {
        return $this->hasMany('App\Sign')->where('type', '=', 'SIGN');
    }
}
