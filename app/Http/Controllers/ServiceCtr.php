<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamCtr extends Controller
{
    public function team()
    {
        return view('team');
    }
}
