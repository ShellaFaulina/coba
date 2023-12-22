<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimonialCtr extends Controller
{
    public function testimonial()
    {
        return view('testimonial');
    }
}
