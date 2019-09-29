<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Role.
 *
 * @property int $id
 * @property string $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereType($value)
 * @mixin \Eloquent
 */
class Role extends Model {
    public $timestamps = false;
    // MASS ASSIGNMENT ------------------------------------------

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function users() {
        return $this->hasMany(User::class, 'role_id');
    }
}
