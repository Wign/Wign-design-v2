<?php

namespace App;

use Couchbase\Bucket;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Translation.
 *
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
 * @method static \Illuminate\Database\Query\Builder|\App\Translation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Translation withoutTrashed()
 * @mixin \Eloquent
 */
class Translation extends Pivot
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
    public function word() {
        return $this->belongsTo(Word::class);
    }

    public function sign() {
        return $this->belongsTo(Sign::class);
    }

    public function description() {
        return $this->belongsTo(Descriptio::class);
    }

    public function creator() {
        return $this->belongsTo(User::class);
    }

    public function editor() {
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
