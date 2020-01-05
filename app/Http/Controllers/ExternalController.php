<?php

namespace App\Http\Controllers;

class ExternalController extends Controller
{
    public function facebook()
    {
        return redirect()->away('https://www.facebook.com/wign.dk');
    }

    public function github()
    {
        return redirect()->away('https://github.com/Wign/Wign-design-v2');
    }
}
