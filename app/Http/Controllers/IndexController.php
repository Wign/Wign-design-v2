<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function policy()
    {
        return view('pages.policy');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function cookies()
    {
        return view('pages.cookies');
    }

    public function profile()
    {
        return view('pages.profile');
    }
}
