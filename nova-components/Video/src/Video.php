<?php

namespace Wign\Video;

use Laravel\Nova\Fields\Field;

class Video extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'video';

    /**
     * Set the width of the image
     *
     * @param int $width
     * @return $this
     */
    public function width(int $width)
    {
        return $this->withMeta(['width' => $width]);
    }

    /**
     * Set the height of the image
     *
     * @param int $height
     * @return $this
     */
    public function height(int $height)
    {
        return $this->withMeta(['height' => $height]);
    }
}
