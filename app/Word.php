<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Word
 *
 * @property int $id
 * @property string $literal
 * @property int $language_id
 * @property int $creator_id
 * @property int $editor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Word[] $alias_children
 * @property-read int|null $alias_children_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Word[] $alias_parents
 * @property-read int|null $alias_parents_count
 * @property-read \App\User $creator
 * @property-read \App\User $editor
 * @property-read \App\Language $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $requests
 * @property-read int|null $requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Translation[] $translations
 * @property-read int|null $translations_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Word newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Word newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Word onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Word query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Word whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Word whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Word whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Word whereEditorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Word whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Word whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Word whereLiteral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Word whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Word withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Word withoutTrashed()
 * @mixin \Eloquent
 */
class Word extends Model {
    // MASS ASSIGNMENT ------------------------------------------
    use SoftDeletes;

    protected $fillable = [
        'creator_id',
        'editor_id',
        'language_id',
        'literal'
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function creator() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function editor() {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function language() {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function translations() {
        return $this->hasMany(Translation::class, 'translation_id');
    }

    public function alias_parents() {
        return $this->belongsToMany(Word::class, 'aliases', 'child_word_id', 'parent_word_id')->withTimestamps();
    }

    public function alias_children() {
        return $this->belongsToMany(Word::class, 'aliases', 'parent_word_id', 'child_word_id')->withTimestamps();
    }

    public function requests() {
        return $this->belongsToMany(User::class, 'requests', 'word_id', 'user_id')->withTimestamps();
    }


}
