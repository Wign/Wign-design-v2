<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Description
 *
 * @property int $id
 * @property string $text
 * @property int $creator_id
 * @property int $editor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $creator
 * @property-read \App\User $editor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Translation[] $translations
 * @property-read int|null $translations_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Description onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereEditorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Description withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Description withoutTrashed()
 * @mixin \Eloquent
 */
class Description extends Model {
    // MASS ASSIGNMENT ------------------------------------------
    use SoftDeletes;

    protected $fillable = [
        'text',
        'creator_id',
        'editor_id'
    ];

    // DEFINING RELATIONSHIPS -----------------------------------

    public function tags() {
        return $this->belongsToMany('App\Tag', 'taggables', 'description_id', 'tag_id')->withTimestamps();
    }

    public function translations() {
        return $this->hasMany('App\Translation', 'description_id');
    }

    public function creator() {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function editor() {
        return $this->belongsTo('App\User', 'editor_id');
    }
}
