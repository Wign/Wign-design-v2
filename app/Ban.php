<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Ban
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ban newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ban newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ban query()
 * @mixin \Eloquent
 */
class Ban extends Model {

    public function user() {
        return $this->belongsTo(User::class);
    }
}
