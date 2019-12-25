<?php

namespace App\Traits;

use App\Http\Requests\SortInput;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder sortInput(SortInput $sortInput)
 */
trait Sortable
{
    /** @noinspection PhpUnused - It's used as Eloquent builder scope */
    public function scopeSortInput(Builder $query, SortInput $sortInput): Builder
    {
        if ($sortInput->input('sortColumn')) {
            $query->orderBy($sortInput->input('sortColumn'), $sortInput->input('sortOrder', 'ASC'));
        }

        if ($sortInput->input('whereColumn')) {
            $query->where(
                $sortInput->input('whereColumn'),
                $sortInput->input('whereOperator', '='),
                $sortInput->input('whereValue')
            );
        }

        return $query;
    }
}
