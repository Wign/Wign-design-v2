<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class Art extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Art';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title',
    ];

    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @var bool
     */
    public static $displayInNavigation = false;

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
            Text::make('Titel', 'title')->sortable()->required(),
            Number::make('År', 'year')->sortable(),
            DateTime::make('Ferniseringsdato', 'publish')->sortable(),
            Image::make('Værk', 'filename')->disableDownload()->prunable()
                ->disk(env('FILESYSTEM_DRIVER'))
                ->path('/arts')
                //->store(new StoreImage)
                //->delete(new DeleteImage)
                //->preview(new PreviewImage)
                //->thumbnail(new PreviewImage)
                ,
            Boolean::make('Synlig', 'is_visible')->withMeta(["value" => 1]),
            Text::make('Sti', 'filename')->hideWhenCreating()->hideWhenUpdating(),
            BelongsTo::make( 'artist')->hideWhenCreating()
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

class StoreImage
{
    public function __invoke(Request $request, $model)
    {
        return sha1($request->attachment->getClientOriginalName());
    }
}

class DeleteImage
{
    public function __invoke(Request $request, $model, $disk, $path)
    {
        if (! $path) {
            return null;
        }

        Storage::disk($disk)->delete($path);

        return [
            $request->attachment => null,
            //'attachment_name' => null,
            //'attachment_size' => null,
        ];
    }
}

class PreviewImage
{
    public function __invoke($value, $disk)
    {
        return $value
            ? Storage::disk(env('FILESYSTEM_DRIVER'))->url($value)
            : null;
    }
}
