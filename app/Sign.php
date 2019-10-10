<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Sign.
 *
 * @property int $id
 * @property string $video_uuid
 * @property string $video_url
 * @property string $thumbnail_url
 * @property string $small_thumbnail_url
 * @property int $playings
 * @property int $sign_language_id
 * @property int $creator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Description[] $descriptions
 * @property-read int|null $descriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $likes
 * @property-read int|null $likes_count
 * @property-read \App\SignLanguage $signLanguage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Translation[] $translations
 * @property-read int|null $translations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Word[] $words
 * @property-read int|null $words_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Sign onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign wherePlayings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereSignLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereSmallThumbnailUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereThumbnailUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereVideoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereVideoUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sign withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Sign withoutTrashed()
 * @mixin \Eloquent
 */
class Sign extends Model
{
    // MASS ASSIGNMENT ------------------------------------------
    use SoftDeletes;

    protected $fillable = [
        'video_uuid',
        'video_url',
        'thumbnail_url',
        'small_thumbnail_url',
        'playings',
        'sign_language_id',
        'creator_id',
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function translations()
    {
        return $this->hasMany(Translation::class);
    }

    public function words()
    {
        return $this->belongsToMany(Word::class, 'translations')->withTimestamps();
    }

    public function descriptions()
    {
        return $this->belongsToMany(Description::class, 'translations')->withTimestamps();
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps(true, false);
    }

    public function signLanguage()
    {
        return $this->belongsTo(SignLanguage::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
