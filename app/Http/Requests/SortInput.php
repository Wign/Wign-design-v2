<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SortInput extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // All can use SortInput
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sortColumn'    => 'nullable|string',
            'sortOrder'     => 'nullable|alpha|in:asc,desc,ASC,DESC,Asc,Desc',
            'whereColumn'   => 'nullable|string',
            'whereOperator' => 'nullable|string',
            'whereValue'    => 'nullable|string|required_with:whereColumn',
        ];
    }
}
