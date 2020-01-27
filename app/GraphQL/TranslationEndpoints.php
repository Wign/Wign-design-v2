<?php

namespace App\GraphQL;

use App\Http\Controllers\TranslationController;
use App\Http\Requests\DescriptionRequest;
use App\Http\Requests\SignRequest;
use App\Http\Requests\WordRequest;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class TranslationEndpoints
{
    /**
     * @var TranslationController
     */
    private $controller;

    public function __construct(TranslationController $controller)
    {
        $this->controller = $controller;
    }

    // QUERIES
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function previewSigns($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        return $this->controller->previewSigns($args['literal']);
    }

    // MUTATIONS
    public function createTranslation($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $wordRequest = $this->loadWordRequest($args);
        $signRequest = $this->loadSignRequest($args);
        $descriptionRequest = $this->loadDescriptionRequest($args);

        return $this->controller->createTranslation($wordRequest, $signRequest, $descriptionRequest);
    }

    public function editTranslation($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $wordRequest = $this->loadWordRequest($args);
        $signRequest = $this->loadSignRequest($args);
        $descriptionRequest = $this->loadDescriptionRequest($args);
        $translationId = $args['id'];

        return $this->controller->editTranslation($wordRequest, $signRequest, $descriptionRequest, $translationId);
    }

    public function deleteTranslation($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $translationId = $args['id'];

        return $this->controller->deleteTranslation($translationId);
    }

    ///////////////////////
    /// PRIVATE METHODS ///
    ///////////////////////
    private function loadWordRequest($args): WordRequest
    {
        return new WordRequest($args['literal']);
    }

    private function loadSignRequest($args): SignRequest
    {
        return new SignRequest($args['video_uuid'], $args['video_url']);
    }

    private function loadDescriptionRequest($args): DescriptionRequest
    {
        return new DescriptionRequest($args['text']);
    }
}
