<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserService {

    public function getUser(Request $request): User {
       return \Auth::user();
   }

}
