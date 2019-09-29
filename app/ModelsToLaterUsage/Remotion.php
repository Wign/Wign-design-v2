<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Remotion.
 *
 * @property int $id
 * @property int $qcv_id
 * @property int $creator_id
 * @property int $promotion
 * @property int $decided
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Remotion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Remotion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Remotion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Remotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Remotion whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Remotion whereDecided($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Remotion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Remotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Remotion wherePromotion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Remotion whereQcvId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Remotion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Remotion extends Model
{
    //
}
