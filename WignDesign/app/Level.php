<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    // MASS ASSIGNMENT ------------------------------------------

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rank'
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function users()
    {
        return $this->belongsToMany('App\User', 'qcvs', 'level_id', 'user_id')->withTimestamps();
    }

    /*
    public function ils()
    {
        return $this->hasMany('App\Il', 'level_id');
    }
    */

    // CREATE SCOPES -----------------------------------------------
    public function scopeTranslations()
    {
        // $this->ils()->type == TRANSLATION
    }

    public function scopeSigns()
    {
        // $this->ils()->type == SIGN
    }
}
