<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Sign
 *
 * @property-read \App\User $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $likes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Translation[] $translations
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Sign onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Sign withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Sign withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $video_uuid
 * @property string $video_url
 * @property string $thumbnail_url
 * @property string $small_thumbnail_url
 * @property int $playings
 * @property int $sign_language_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read int|null $likes_count
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign wherePlayings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereSignLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereSmallThumbnailUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereThumbnailUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereVideoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sign whereVideoUuid($value)
 */
class Sign extends Model
{
    // MASS ASSIGNMENT ------------------------------------------
    use SoftDeletes;

    protected $fillable = [
        'video_uuid',
        'playings',
        'sign_language_id',
        'user_id'
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function creator()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function translations()
    {
        return $this->hasMany('App\Translation', 'sign_id');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes', 'sign_id', 'user_id')->withTimestamps();
    }


    /* UPCOMING
    public function signLanguage()
    {
        return $this->belongsTo('App\SignLanguage', 'sign_language_id');
    }

    public function metaExpressions()
    {
        return $this->hasMany('App\MetaExpression', 'sign_id');
    }

    public function ils()
    {
        return $this->hasMany('App\Il', 'object_id');
    }
     */

}
