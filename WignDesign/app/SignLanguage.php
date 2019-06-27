<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignLanguage extends Model
{
    // MASS ASSIGNMENT ------------------------------------------
    protected $fillable = [
        'code',
        'text'
    ];

    public $timestamps = false;

    // DEFINING RELATIONSHIPS -----------------------------------

    public function words()
    {
        return $this->hasMany('App\Sign', 'sign_language_id');
    }

}
