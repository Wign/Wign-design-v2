<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Text
 *
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Text newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Text newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Text query()
 * @mixin \Eloquent
 */
class Text extends Model
{
    protected $fillable = [
        'code',
        'text',
        'language_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
