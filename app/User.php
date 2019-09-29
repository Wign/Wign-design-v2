<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\User.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $role_id
 * @property \Illuminate\Support\Carbon $last_login
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Description[] $descriptionsCreated
 * @property-read int|null $descriptions_created_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Description[] $descriptionsEdited
 * @property-read int|null $descriptions_edited_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sign[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Word[] $requests
 * @property-read int|null $requests_count
 * @property-read \App\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sign[] $signsCreated
 * @property-read int|null $signs_created_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Translation[] $translationsCreated
 * @property-read int|null $translations_created_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Translation[] $translationsEdited
 * @property-read int|null $translations_edited_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Word[] $wordsCreated
 * @property-read int|null $words_created_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Word[] $wordsEdited
 * @property-read int|null $words_edited_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login'        => 'datetime',
    ];

    // DEFINING RELATIONSHIPS -----------------------------------
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function requests()
    {
        return $this->belongsToMany(Word::class, 'requests')->withTimestamps(true, false);
    }

    public function wordsCreated()
    {
        return $this->hasMany(Word::class, 'creator_id');
    }

    public function wordsEdited()
    {
        return $this->hasMany(Word::class, 'editor_id');
    }

    public function translationsCreated()
    {
        return $this->hasMany(Translation::class, 'creator_id');
    }

    public function translationsEdited()
    {
        return $this->hasMany(Translation::class, 'editor_id');
    }

    public function descriptionsCreated()
    {
        return $this->hasMany(Description::class, 'creator_id');
    }

    public function descriptionsEdited()
    {
        return $this->hasMany(Description::class, 'editor_id');
    }

    public function signsCreated()
    {
        return $this->hasMany(Sign::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Sign::class, 'likes')->withTimestamps(true, false);
    }

    /* Leaving those out for now
     public function ban()
    {
        return $this->hasMany(Ban::class, 'user_id');
    }

    public function reviewCreator()
    {
        return $this->hasMany(Review::class, 'creator_id');
    } */
}
