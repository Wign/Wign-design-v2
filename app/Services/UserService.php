<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UserService
{
    public function getUser(GraphQLContext $context): Authenticatable
    {
        return Auth::user();
    }
}
