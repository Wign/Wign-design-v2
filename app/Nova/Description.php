<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Description extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Description';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'text',
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['words'];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Translation';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Word', function () {
                return $this->words()->orderBy('updated_at')->firstOrFail()->literal;
            })->onlyOnIndex(),
            Textarea::make('Text', 'text')->alwaysShow()->rules('required')->hideFromIndex(),

            Textarea::make('Text', 'text')->alwaysShow()->rules('required')->onlyOnIndex()->displayUsing(function ($text) {
                if (strlen($text) > 100) {
                    return substr($text, 0, 100).'...';
                }

                return $text;
            }),

            BelongsTo::make('Creator', 'creator', '\App\Nova\User')->searchable()->hideFromIndex(),
            BelongsTo::make('Editor', 'editor', '\App\Nova\User')->searchable()->hideFromIndex(),
            DateTime::make('Created at')->readonly()->hideFromIndex(),
            DateTime::make('Updated at')->readonly()->hideFromIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
