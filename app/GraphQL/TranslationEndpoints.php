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
