<?php

namespace App\Nova;

use App\Nova\Metrics\PlayingsPerWeek;
use App\Nova\Metrics\TotalPlayings;
use App\Nova\Metrics\TotalSigns;
use Chaseconey\ExternalImage\ExternalImage;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Wign\Video\Video;

class Sign extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Sign';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'video_uuid';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'video_uuid',
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['signLanguage', 'creator', 'words'];

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
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Word', function () {
                return $this->words()->orderBy('updated_at')->firstOrFail()->literal;
            })->onlyOnIndex(),
            Video::make('Video', 'video_uuid')->rules('required',
                'regex:/v-[0-9a-zA-Z]{8}-[0-9a-zA-Z]{4}-[0-9a-zA-Z]{4}-[0-9a-zA-Z]{4}-[0-9a-zA-Z]{12}/'),
            Number::make('Playings'),
            BelongsTo::make('Language', 'signLanguage')->sortable(),

            BelongsTo::make('Creator', 'creator', '\App\Nova\User')->searchable(),
            DateTime::make('Created at')->readonly()->hideFromIndex(),
            DateTime::make('Updated at')->readonly()->hideFromIndex(),

            HasMany::make('Words'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new TotalSigns,
            new TotalPlayings,
            new PlayingsPerWeek,
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     *
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
     *
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
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
