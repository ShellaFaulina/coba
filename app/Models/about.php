<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Models;

class about extends Model{
    use HasFactory;

    public function aboutus(){
        $data = about::all(); 
        return view('about', compact('data'));
    }

}

?>