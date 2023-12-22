<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactCtr extends Controller
{
    public function contact()
    {
        return view('contact');
    }
}

?>