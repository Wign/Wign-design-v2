<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    // MASS ASSIGNMENT ------------------------------------------
    protected $fillable = [
        'creator_id',
        'editor_id',
        'language_id',
        'literal'
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function editor()
    {
        return $this->belongsTo('App\User', 'editor_id');
    }

    public function language()
    {
        return $this->belongsTo('App\Language', 'language_id');
    }

    public function alias_parents()
    {
        return $this->belongsToMany('App\Word', 'aliases', 'child_word_id', 'parent_word_id')->withTimestamps();
    }

    public function alias_children()
    {
        return $this->belongsToMany('App\Word', 'aliases', 'parent_word_id', 'child_word_id')->withTimestamps();
    }

    public function translations()
    {
        return $this->hasMany('App\Translation', 'translation_id');
    }

    public function requests()
    {
        return $this->belongsToMany('App\User', 'request_words', 'word_id', 'user_id')->withTimestamps();
    }
}
