<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // MASS ASSIGNMENT ------------------------------------------
    use Notifiable;
    use SoftDeletes;

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ban_reason',
        'type',
        // inactive / passive state to exclude from the votings
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

    // DEFINING RELATIONSHIPS -----------------------------------

    public function creatorWords ()
    {
        return $this->hasMany('App\Word', 'creator_id');
    }

    public function editorWords ()
    {
        return $this->hasMany('App\Word', 'edit_id');
    }

    public function signs ()
    {
        return $this->hasMany('App\Sign', 'user_id');
    }

    public function creatorDescriptions ()
    {
        return $this->hasMany('App\Description', 'creator_id');
    }

    public function editorDescriptions ()
    {
        return $this->hasMany('App\Description', 'editor_id');
    }

    public function translationsCreator ()
    {
        return $this->hasMany('App\Translation', 'creator_id');
    }

    public function translationsEditor ()
    {
        return $this->hasMany('App\Translation', 'editor_id');
    }

    public function likes ()
    {
        return $this->belongsToMany('App\Sign', 'likes', 'user_id', 'sign_id')->withTimestamps();
    }

    public function requestWords ()
    {
        return $this->belongsToMany('App\Word', 'request_words', 'user_id', 'word_id')->withTimestamps();
    }
    /*
    public function remotionAuthor ()    // Creator of this remotion
    {
        return $this->hasMany('App\Remotion', 'user_id');
    }

    public function reviewAuthor ()
    {
        return $this->hasMany('App\Review', 'user_id');
    }

    public function qcvs ()
    {
        return $this->hasMany('App\Qcv', 'user_id');
    }
    */
}
