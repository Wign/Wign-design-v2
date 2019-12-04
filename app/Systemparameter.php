<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Systemparameter
 *
 * @property int $id
 * @property string $type
 * @property int $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Systemparameter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Systemparameter newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Systemparameter onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Systemparameter query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Systemparameter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Systemparameter whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Systemparameter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Systemparameter whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Systemparameter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Systemparameter whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Systemparameter withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Systemparameter withoutTrashed()
 * @mixin \Eloquent
 */
class Systemparameter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'value',
    ];
}
