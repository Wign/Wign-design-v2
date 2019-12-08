<?php
namespace App\GraphQL;

use App\Http\Controllers\TranslationController;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class TranslationEndpoints {

    /**
     * @var TranslationController
     */
    private $controller;

    public function __construct(TranslationController $controller) {
        $this->controller = $controller;
    }

// QUERIES


// MUTATIONS
    public function createTranslation($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) {
        return $this->controller->createTranslation($context->request());
    }

    public function editTranslation($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) {
        return $this->controller->editTranslation($context->request(), $args['id']);
    }

    public function deleteTranslation($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) {
        return $this->controller->deleteTranslation($context->request());
    }


}
