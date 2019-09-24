<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Review
 *
 * @property int $id
 * @property int $new_il_id
 * @property int|null $old_il_id
 * @property int $creator_id
 * @property int $decided
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereDecided($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereNewIlId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereOldIlId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Review extends Model {
    //
}
