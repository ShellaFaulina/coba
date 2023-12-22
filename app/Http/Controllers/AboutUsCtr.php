<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsCtr extends Controller
{
    public function aboutus()
    {
        return view('about');
    }
}
