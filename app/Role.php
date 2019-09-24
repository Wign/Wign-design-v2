<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    // MASS ASSIGNMENT ------------------------------------------

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type'
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function users() {
        return $this->hasMany('App\User', 'role_id');
    }
}
