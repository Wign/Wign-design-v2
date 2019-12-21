<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class UserService
{
    public function getUser(): Authenticatable
    {
        return Auth::user();
    }
}
