<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Language
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
    // MASS ASSIGNMENT ------------------------------------------
    protected $fillable = [
        'code',
        'text',
    ];

    public $timestamps = false;

    // DEFINING RELATIONSHIPS -----------------------------------

    public function words()
    {
        return $this->hasMany('App\Word', 'language_id');
    }

}
