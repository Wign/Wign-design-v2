<?php

class TranslationEndpoints {

    /**
     * @var \App\Http\Controllers\TranslationController
     */
    private $controller;

    public function __construct(\App\Http\Controllers\TranslationController $controller) {
        $this->controller = $controller;
    }

// QUERIES


// MUTATIONS
    public function createTranslation($rootValue, array $args, \Nuwave\Lighthouse\Support\Contracts\GraphQLContext $context, \GraphQL\Type\Definition\ResolveInfo $resolveInfo) {
        return $this->controller->createTranslation($context->request());
    }

    public function editTranslation($rootValue, array $args, \Nuwave\Lighthouse\Support\Contracts\GraphQLContext $context, \GraphQL\Type\Definition\ResolveInfo $resolveInfo) {
        return $this->controller->editTranslation($context->request());
    }


}
