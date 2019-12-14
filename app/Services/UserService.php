<?php
namespace App\Services;

use Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class UserService
{
    public function getUser(): Authenticatable
    {
        return Auth::user();
    }
}
