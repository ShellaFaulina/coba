<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Models;

class contact extends Model{
    use HasFactory;

    public function contact(){
        $data = contact::all(); 
        return view('contact', compact('data'));
    }

}

?>