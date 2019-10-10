<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Translation.
 *
 * @property int $id
 * @property int $word_id
 * @property int $sign_id
 * @property int $description_id
 * @property int $creator_id
 * @property int $editor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $creator
 * @property-read \App\Description $description
 * @property-read \App\User $editor
 * @property-read \App\Sign $sign
 * @property-read \App\Word $word
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Translation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereDescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereEditorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereSignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereWordId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Translation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Translation withoutTrashed()
 * @mixin \Eloquent
 */
class Translation extends Model
{
    // MASS ASSIGNMENT ------------------------------------------
    use SoftDeletes;

    protected $fillable = [
        'word_id',
        'sign_id',
        'description_id',
        'creator_id',
        'editor_id',
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function sign()
    {
        return $this->belongsTo(Sign::class);
    }

    public function description()
    {
        return $this->belongsTo(Description::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function editor()
    {
        return $this->belongsTo(User::class);
    }

    /*
    public function reviewsFrom() {
        return $this->belongsToMany(Review::class, 'ils', 'translation_id', 'old_il_id');
    }

    public function reviewsOnto() {
        return $this->belongsToMany(Review::class, 'ils', 'translation_id', 'new_il_id');
    }

    public function glossaries()
    {
        return $this->belongsToMany(Bucket::class, 'glossaries', 'translation_id', 'bucket_id')->withTimestamps();
    }*/
}
