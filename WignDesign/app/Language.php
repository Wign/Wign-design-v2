<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    // MASS ASSIGNMENT ------------------------------------------
    protected $fillable = [
        'code',
        'text',
    ];

    public $timestamps = false;

    // DEFINING RELATIONSHIPS -----------------------------------

    public function words()
    {
        return $this->hasMany('App\Word', 'language_id');
    }

}
