<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SignLanguage
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sign[] $words
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $code
 * @property string $text
 * @property-read int|null $words_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SignLanguage whereText($value)
 */
class SignLanguage extends Model {
    // MASS ASSIGNMENT ------------------------------------------
    protected $fillable = [
        'code',
        'text'
    ];

    public $timestamps = false;

    // DEFINING RELATIONSHIPS -----------------------------------

    public function words() {
        return $this->hasMany('App\Sign', 'sign_language_id');
    }

}
