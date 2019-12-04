<?php

namespace App\Http\Controllers;

use App\Translation;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request) {
        $user = \Auth::user();
        $sign = Translation::find($request->input('id'))->sign;

        return $user->likes()->toggle($sign);
    }
}
