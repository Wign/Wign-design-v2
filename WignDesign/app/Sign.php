<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sign extends Model
{
    // MASS ASSIGNMENT ------------------------------------------
    use SoftDeletes;

    protected $fillable = [
        'video_uuid',
        /*
        'camera_uuid',
        'video_url',
        'thumbnail_url',
        'small_thumbnail_url',
        */
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
