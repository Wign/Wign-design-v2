<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Translation extends Model
{
    // MASS ASSIGNMENT ------------------------------------------
    use SoftDeletes;

    protected $fillable = [
        'word_id',
        'sign_id',
        'description_id',
        'creator_id',
        'editor_id'
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function word()
    {
        return $this->belongsTo('App\Word', 'word_id');
    }

    public function sign()
    {
        return $this->belongsTo('App\Sign', 'sign_id');
    }

    public function description()
    {
        return $this->belongsTo('App\Description', 'description_id');
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function editor()
    {
        return $this->belongsTo('App\User', 'editor_id');
    }

    public function next()
    {
        return $this->belongsToMany('App\Translation', 'edit_histories', 'old_translation_id', 'new_translation_id')->withTimestamps();
    }

    public function previous()
    {
        return $this->belongsToMany('App\Translation', 'edit_histories',  'new_translation_id', 'old_translation_id')->withTimestamps();
    }

    /*
    public function glossaries()
    {
        return $this->belongsToMany('App\Bucket', 'glossaries', 'translation_id', 'bucket_id')->withTimestamps();
    }

    public function ils()
    {
        return $this->hasMany('App\Il', 'object_id');
    }
    */

}
