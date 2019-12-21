<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UserService
{
    public function getUser(): Authenticatable
    {
        return Auth::user();
    }
}
