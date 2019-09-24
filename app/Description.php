<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->hasMany('App\Translations', 'description_id');
    }

    public function creator() {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function editor() {
        return $this->belongsTo('App\User', 'editor_id');
    }
}
