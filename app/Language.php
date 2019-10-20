<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Language.
 *
 * @property int $id
 * @property string $code
 * @property string $text
 * @property string $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sign[] $signs
 * @property-read int|null $signs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Word[] $words
 * @property-read int|null $words_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereType($value)
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
        return $this->hasMany(Word::class);
    }

    public function signs()
    {
        return $this->hasMany(Sign::class);
    }
}
